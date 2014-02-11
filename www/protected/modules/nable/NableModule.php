<?php
/*
Yii::setPathOfAlias('NableModule', dirname(__FILE__).'/');
/Yii::import('NableModule.models.*');
/Yii::import('NableModule.controllers.NableController');
*/

class NableModule extends CWebModule {

//    public $layout = '/views/layouts/index';
    public $defaultController = 'Menu';
    public $layout = 'index',
           $version = '2.0.0 dev';

    public $errorAction = 'error';

    /**
    * Defines all Controllers of the Nable Module and maps them to
    * shorter terms for using in the url
    * @var array
    */
    /*
    public $controllerMap = array(
        'entity' => array( 'class' => 'NableModule.controllers.EntityController'),
    );
    */
    public function __construct($id,$parent,$config=null)
    {
        parent::__construct($id,$parent,$config);
        Yii::app()->errorHandler->errorAction = $this->getId().'/'.$this->errorAction;
    }

    public function init()
    {
        parent::init();
        $this->setImport(array(
            'nable.models.*',
            'nable.controllers.NableController',
        ));
    }
}
