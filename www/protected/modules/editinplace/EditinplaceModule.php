<?php
Yii::setPathOfAlias('EditinplaceModule' , dirname(__FILE__));
Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('EditinplaceModule').'/assets/script.js'), CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('EditinplaceModule').'/assets/ckeditor-standard/ckeditor.js'), CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('EditinplaceModule').'/assets/ckeditor-standard/adapters/jquery.js'), CClientScript::POS_END);

class EditinplaceModule extends CWebModule {

    public $controllerMap = array(
        'set'   => array('class' => 'EditinplaceModule.controllers.SetController'),
        'get'   => array('class' => 'EditinplaceModule.controllers.GetController'),
    );

    //public static function setEditable($pk_id, $modelname, $propname, $value, $dType)
    // новый подход мне не нравится по причине необходимости сохранения объекта
    // колумна в сессии, но позволяет избавиться от других "заморочек".
    public static function setEditable(nableColumnDecorator &$column)
    {
        //echo 'datatype: ' . $column->getDataType();
        //echo '<br/>value: ' . $column->getValue();
        //echo '<pre>',print_r($column),'</pre>'; die();
        $rnd = md5(rand().microtime(true)); 
        $sess = Yii::app()->session;
        $data = array(
            'time' => microtime(true),
            'column' => array(
                'id' => $column->getId(),
                'shortname' => $column->getShortname(),
                'type' => $column->getType(),
                'datatype' => $column->getData_type(),
                'searchable' => $column->getSearchable(),
                'required' => $column->getRequired(),
                'protected' => $column->getProtected(),
                'multilang' => $column->getMulti_lang(),
                'name' => $column->getName(),
            ),
            'entityName' => $column->get_entity_name(),
        );
        $sess->add($rnd, $data);

        if(Yii::app()->user->isGuest) { return $column->getValue(); }
        // авторизованные находятся в режиме просмотра/редактирования.
        //Yii::app()->getModule('eip');
        //setEditable($pk_id, $modelname, $propname, $value)
        //return EditinplaceModule::setEditable($this->column->getId(), $this->column->getModelName(), 'undefined', $this->column->getValue(), $this->column->getDataType());
        /*
        $this->widget('ext.tinymce.TinyMce', array(
            'model' => $model,
            'attribute' => 'tinyMceArea',
            // Optional config
            'compressorRoute' => 'tinyMce/compressor',
            'spellcheckerRoute' => 'tinyMce/spellchecker',
            'fileManager' => array(
                'class' => 'ext.elFinder.TinyMceElFinder',
                'connectorRoute'=>'admin/elfinder/connector',
            ),
            'htmlOptions' => array(
                'rows' => 6,
                'cols' => 60,
            ),
        ));
        */

        //$column->set_view('/_editable'); // авторизованные могут редактировать все, что угодно
        $column->set_tpl_CssId($rnd);    // добавляем id элементу обертке.
        $column->set_tpl_CssClass('editable' . ucfirst($column->getDataType())); // добавляем колумну неоходимые CSS классы к обертке.

        //echo '<pre>',print_r($column),'</pre>';
        //return '<div id="'.$rnd.'" class="editable' .  ucfirst($column->getDataType()) . '">' .  $column->getValue() . '</div>';
        //return EditinplaceModule::setEditable($this->column);
        return true;
    }
}
