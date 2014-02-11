<?php

class SetController extends CController {

    public function accessRules()
    {
        return array(
            array('deny',
                'actions'=>array('index'),
                'users'=>array('?'),
            ),
        );
    }


    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function actionIndex() {
        // гостям нельзя ничего редактировать.
        if(Yii::app()->user->isGuest) { Yii::app()->end(); }
        $error = false;

        foreach(Yii::app()->request->getPost('dataToSave') as $k => $v)
        {
            $this->saveItem($k, $v) or $error = true;
        }

        /*
        нужно вернуть индикатор успешного сохранения или ошибки.
        поскольку возможна многопользовательская работа необходимо возвращать
        сами данные, т.к. за это время они могли измениться кем-нибудь другим.
        либо использовать на клиенте исключительную блокировку. (на какое
        время?)
        пока ничего не возвращаем.
        ------------------------------------------------------
        ниже предыдущая версия кода без пакетной обработки данных.
        if(Yii::app()->request->isAjaxRequest)
        {
            //echo CJSON::encode(Yii::app()->request->getPost('update_value'));
            echo Yii::app()->request->getPost('update_value');
			// Завершаем приложение
			Yii::app()->end();
		}
		else {
            // если запрос не асинхронный, отдаём ответ полностью
            echo Yii::app()->request->getPost('update_value');
		}
        */
    }

    public function saveItem($rnd, $dataValue) {
        // гостям нельзя ничего редактировать.
        if(Yii::app()->user->isGuest) { return false; }

        $sess = Yii::app()->session;
        $data = $sess->get($rnd);
        if(null === $data)
        {   // устаревшие данные, либо ошибка.
            return false;
        }

        //$output = 'POST data:<pre>'. print_r($data, 1) . '</pre>';

        // сохраняем данные
        // тут осуществляется проверка времени предыдущего сохранения.
        // SELECT * FROM $logtable WHERE filedname='$fieldname' AND savedate >
        // $data['time']; если данные найдены - не обновляем, 
        // поскольку затрем уже внесенные изменения.

        $lang = 'ru_ru';   // с языками пока непонятки.

        $class_name = 'nableColumn_'.(!$data['column']['protected'] ? 'N' : '').'P';
		$column_class_name = 'nable'.ucfirst($data['column']['datatype']).'Column';
		$item = new $column_class_name(new $class_name($data['column'], $lang, $data['entityName']));
        //echo '<pre>',print_r($item),'</pre>';

        if(0 === $item->getId())
        {   // добавление нового элемента. пока не используется.
            /* langid пока 1, поскольку не используем мультиязычность */
            $item->setValue($dataValue);
            $result = $item->save();
        }
        else
        {   /* langid пока 1, поскольку не используем мультиязычность */
            $item->setValue($dataValue);
            //$item->setValue('test content', 'ru_ru');
            //echo CHtml::encode(print_r($item, 1))."<br/>\r\n<br/>\r\n";
            $result = $item->save();
        }
        if($result)
        {   // обновляем данные в сессии - время последнего обновления.
            $data['time'] = microtime(true);
            $sess->add($rnd, $data);
            return true;
        }
        return false;
    }
}
