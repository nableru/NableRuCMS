<?php

class PageController extends Controller
{
    /*
	public function actionIndex($id)
	{
        echo 'id: ' . $id;
		$this->render('index');
	}
    */

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
    */

    public function filters() {
        return array(
//            'ajaxOnly + newEntity',
        );
    }


	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'index'     => array(
                'class'  => 'application.extensions.actions.ShowDbEntity',
                'entityName' => 'page',
            ),
			'newEntity'=>array(
				'class'=>'application.extensions.actions.newEntity',
				//'propertyName'=>'propertyValue',
			),
		);
	}
    /*
    public function actionDefault()
    {
        $route=Route::model()->find("route=''");
    }
    */
}
