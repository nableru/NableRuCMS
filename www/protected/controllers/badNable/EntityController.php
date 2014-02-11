<?php
//die('Entity Controller');
class Entity extends Controller
{
    /*
    public function actions()
    {
        return array(
            'index' => 'application.controllers.nable.actions.IndexAction',
            'new'   => 'application.controllers.nable.actions.IndexAction',
        );
    }
    */
    public function actionText()
    {
        die('this');
    }
    public function actionIndex()
    {
        echo 'this';
        $this->render('index');
    }
/*
    public function actionIndex()
    {
        // вывод списка сущностей определенного типа для редактирования одного
        // из них.
        die('this');
    }

    public function actionSave($type, $id)
    {
        $id = (int) $id;
    }

    public function actionLoad($type, $id)
    {
        $id = (int) $id;
    }
    */
}
