<?php

class CatchAllController extends Controller
{
    /**
	 * @var string the ID of CDbConnection application component.
	 * Defaults to 'db' which refers to the primary database application component.
	 * @since 1.0
	 */
	public $connectionID = 'db';
	/**
	 * @var CDbConnection the DB connection instance.
	 * @since 1.0
	 */
	private $_db;

	/**
	 * @return CDbConnection the DB connection instance
	 * @throws CException if {@link connectionID} does not point to a valid application component.
	 * @since 1.0
	 */
	public function getDbConnection() {
		if ($this->_db !== null)
			return $this->_db;
		else if (($id = $this->connectionID) !== null) {
			if (($this->_db = Yii::app()->getComponent($id)) instanceof CDbConnection)
				return $this->_db;
		}
		throw new CException(Yii::t('DbUrlManager', 'EDbUrlManager.connectionID "{id}" does not point to a valid CDbConnection application component.',
				array('{id}' => $id)));
	}

    public function actionIndex()
    {
        $_app = Yii::app();
        $route = $_app->getUrlManager()->parseUrl($_app->getRequest());
        //$route = $route;
        
        $route=Route::model()->find('route=:url', array(':url'=>$route));
        echo '<pre>page: ',print_r($page),'</pre>'; die('see CatchAllController.php');
        if(is_object($route))
        {
            $route = 'site/' . $route->entity_type . '/id/'. $route->entity_id;
            echo $route;
            $_app->runController($route);
        }
        else
            $_app->runController($route);
    }
}
