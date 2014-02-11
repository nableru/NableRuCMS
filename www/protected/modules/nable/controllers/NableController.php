<?php

class NableController extends CController
{
    /**
    * @var array context left menu items. This property will be assigned to {@link CMenu::items}.
    */
    public $leftMenu=array();
    /**
    * @var array the breadcrumbs of the current page. The value of this property will
    * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
    * for more details on how to specify this property.
    */
    public $breadcrumbs=array();

    /**
    * @var string path to the images of Nable backend module;
    */
    public $backendImagesPath;

    /*
    private $_assetsUrl;
        вызов в шаблоне
        <link rel="stylesheet" type="text/css" href="< ? php echo $this->assetsUrl ? > /css/main.css"
        источник: http://mega-mozg.blogspot.ru/2013/03/yii-assetmanager.html
    public function getAssetsUrl()
    {
       if ($this->_assetsUrl === null) {
           $this->_assetsUrl = Yii::app()->assetManager->
               publish(Yii::getPathOfAlias('application.assets'));
       }
       return $this->_assetsUrl;
    }
    */
    public function render($view,$data=null,$return=false)
	{
        $this->backendImagesPath = Yii::app()->clientScript->getPackageBaseUrl('nableBackend').'/images';
		if($this->beforeRender($view))
		{
			$output=$this->renderPartial($view,$data,true);
			if(($layoutFile=$this->getLayoutFile($this->layout))!==false)
            {
                $data['content'] = $output;
				$output=$this->renderFile($layoutFile,$data,true);
            }

			$this->afterRender($view,$output);

			$output=$this->processOutput($output);

			if($return)
				return $output;
			else
				echo $output;
		}
	}

    public function __construct($id, $module=NULL)
    {
        parent::__construct($id, $module);
        Yii::app()->clientScript->packages['nableBackend'] = array(
            'basePath'=>'nable.assets.backend',
            'css'=>array(
                'css/common.css',
                'css/na_simple_tree.css',
                'css/skins/default/screen.css',
                'css/skins/blue/screen.css',
                'css/skins/green/screen.css',
            ),
            'js' => array(
                'js/script.js',
            ),
            'depends' => array('jquery'),
        );
        YII_DEBUG AND Yii::app()->assetManager->forceCopy = true;
        Yii::app()->clientScript->registerPackage('jquery');
        Yii::app()->clientScript->registerPackage('jquery.ui');
        Yii::app()->clientScript->registerPackage('nableBackend');

        if($id !== $this->module->errorAction && !Yii::app()->user->isAdmin())
            throw new CHttpException(403);
    }
}
