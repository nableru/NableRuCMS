<?php
return array(
    'title' => 'Добавление новой сущности БД.',
    'action' => '/nable/entity/new',
    'activeForm' => array(
        'class'                  => 'CActiveForm',
        'id'                     => 'newEntityForm',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true
        ),
    ),
    'elements' => array(
        'currentRoute' => array(
            'type' => 'hidden',
            //'value' => Yii::app()->controller->getRoute(),
            //'value' => Yii::app()->createUrl(Yii::app()->controller->getRoute()),
            'value' => Yii::app()->request->pathInfo,
        ),
        'routePart' => array(
            'type' => 'text',
            'maxlength' => 100,
        ),
        'entityType' => array(
            'type' => 'dropdownlist',
            'items' => Entity::model()->getAllTypes(),
            'prompt' => '--=== Выберите значение ===--',
        ),
    ),
    'buttons' => array(
        'add' => array(
            'type' => 'submit',
            //'type' => CHtml::ajaxSubmitButton('Login',array('_new'),array('replace'=>'#box-message')),
            'label' => 'Создать',
        ),
    ),
);
