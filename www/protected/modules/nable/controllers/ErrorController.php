<?php

class ErrorController extends NableController
{
    public $defaultAction = 'error',
            $layout = '/errors/layout';

    public function actionError()
    {
        $error=Yii::app()->errorHandler->error;
        //echo '<pre>',print_r($error),'</pre>';
        if($error)
        {
            $data['backendImagesPath'] = Yii::app()->clientScript->getPackageBaseUrl('nableBackend').'/images';
            if(403 == $error['code'])
                $data['userAuth'] = new YumUserLogin();
            $this->render('/errors/'.$error['code'], $data);
        }
    }
}
