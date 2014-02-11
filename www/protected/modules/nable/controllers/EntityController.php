<?php
class EntityController extends CController
{
    public $defaultAction = 'get',
           $breadcrumbs;
        

    /*
        вывод содержимого сущности без учета наследования.
    */
    public function actionGet($type, $id)
    {
        $id = (int) $id;
        
        if(empty($id)) return false;

        Yii::app()->getModule('DbEntity');

        $fieldsModule = new DbEntityModule($type, $id);
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
            $this->setPageTitle($fields['title']);

        $tplData['fields'] = $fields;
        $this->render('application.views.page.index', $tplData);
    }

    private function _newEntity($entityType, $routePart)
    {
        $error = false;
        $criteria=new CDbCriteria;
        $criteria->select='id';  // выбираем только поле 'id'
        $criteria->condition='name=:name';
        $criteria->params=array(':name'=>$entityType);
        $eType = Entity::model()->find($criteria); // $params не требуется

        if(empty($eType->id)) // не найден тип сущностей в таблице типов.
            return false;          // Добавление невозможно

        $eType = 'E'.ucfirst(strtolower($entityType));
        $entity = new $eType;
        //Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
        $entity->addedby = $entity->updatedby = $entity->user_id = Yii::app()->user->id;
        $entity->role_id = 1; // пока заглушка. возможно, вообще откажемся от этого поля
        $entity->modifydate = new CDbExpression('NOW()');
        if(!$entity->save())
        {   // нужна какая-то внятная обработка ошибок
            echo '<pre>',print_r($entity->getErrors()),'</pre>';
            return false;
        }

        $id = (int) $entity->id;

        $entityI18n = $eType.'I18n';
        $entityI18n = new $entityI18n;
        $entityI18n->id = $id;
        $entityI18n->lang = 'ru_ru';
        if(!$entityI18n->save())
        {
            echo '<pre>',print_r($entityI18n->getErrors()),'</pre>';
            $error = true;
        }

        $route = new Route;
        $route->controller = $entityType;
        $route->route = $routePart;
        $route->entity_id = $id;
        $route->comment = '';
        $route->save() OR $error = true;
        return !$error;
    }

    public function actionNew(/*$entityType = '', $routePart = '', $pid = ''*/)
    {
        if(Yii::app()->user->isGuest)   // по-умолчанию гостям запрещено
            return false;               // что-либо создавать

        //$this->parentEntity = (int) $pid;

        //$tplData['entityTypes'] = Entity::model()->findAll();

        $model = new newEntityForm;

        if(!empty($_POST['newEntityForm']))
        {
            /* необходимо добавить проверку всех входных данных, включая hidden
            поля. для currentRoute необходимо проверить его наличие в базе */
            $model->attributes = $_POST['newEntityForm'];
            $route = $model->currentRoute.'/'.$model->routePart ;
            if($model->validate() && $this->_newEntity($model->entityType, $route))
            {
               $this->redirect('/' . $route . '/'); 
            }
        }
        $form = new CForm('application.views._admin.newEntityForm', $model);
        $tplData['form'] = $form;

        $this->renderPartial('//_admin/newEntity', $tplData);
    }
}
