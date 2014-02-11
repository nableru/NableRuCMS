<?php

class GetController extends CController {

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


    public function actionIndex($pk, $fieldname, $tablename, $value) {
        return $value; 
        echo 'Edit-in-place::GetController';
    }
}
