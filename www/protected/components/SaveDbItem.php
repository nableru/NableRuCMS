<?php

class SaveDbItem extends CBaseUrlRule
{
	public $connectionID = 'db';

	public function createUrl($manager,$route,$params,$ampersand)
	{
        /*
		if ($route==='car/index')
		{
			if (isset($params['manufacturer'], $params['model']))
				return $params['manufacturer'] . '/' . $params['model'];
			else if (isset($params['manufacturer']))
				return $params['manufacturer'];
		}
        */
        // главная страница
        if($route === 'indexPage')
        {
            return '';
        }
		return false;  // this rule does not apply
	}

	public function parseUrl($manager,$request,$pathInfo,$rawPathInfo)
	{
        echo 'this!<br/>';
        $route=Route::model()->find('route=:url', array(':url'=>$pathInfo));
        if(NULL === $route)
            return false;
        echo 'controller ' . $route->controller.'<br/>';
        switch($route->controller)
        {
            case 'page':
                return $route->controller . '/index/id/' . $route->entity_id;
            case 'site':
                return $route->controller . '/' . $route->action;
        }
		return false;  // this rule does not apply
	}
}
