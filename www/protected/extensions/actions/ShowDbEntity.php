<?php

class ShowDbEntity extends CAction
{
    
    public		$Fields,				// коллекция полей сущности в соответствии с ее структурой и информацией из таблицы сущности.
                $entityName;            // сущность БД для которой вызывано действие. обычно, имя сущности используется для вызова разных представлений.


    public function run($id)
    {
        $controller = $this->getController();

        Yii::app()->getModule('DbEntity');

        $fieldsModule = new DbEntityModule($controller->getId(), $id);
        $fields = $fieldsModule->getFields();

        $tplData = array();

        if(!Yii::app()->user->isGuest)
        { // подключаем модуль редактирования, если пользователь авторизован 
            Yii::app()->getModule('editinplace');
        }

        if(!Yii::app()->user->isGuest)
        {
            foreach($fields as $k => &$v)
            {
                if(Yii::app()->user->isGuest) continue; // не используем виджеты для гостей. передаем информацию as is.
                EditinplaceModule::setEditable($v);  // для авторизованных пользователей все поля редактируемы.
            }
        }

        if(!is_null($fields['title']))
            $controller->setPageTitle($fields['title']);

        $tplData['fields'] = $fields;
        $controller->render('index', $tplData);
    }
}
