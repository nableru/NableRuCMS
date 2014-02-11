<?php

class DbRoute extends CBaseUrlRule
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
        //echo '<pre>',print_r($route, true),'</pre>'; // die();
        // главная страница
        if($route === 'indexPage')
        {
            return '';
        }

        $route=Route::model()->find('route=:url', array(':url'=>$route));
        if(NULL === $route)  // this rule does not apply
            return false;

        switch($route->controller)
        {
            case 'page':
                return $route->controller . '/index/id/' . $route->entity_id;
            case 'site':
                return $route->controller . '/' . $route->action;
        }
		return false;  // this rule does not apply
	}

	public function parseUrl($manager,$request,$pathInfo,$rawPathInfo)
	{
        //echo '<pre>',print_r($pathInfo, true),'</pre>'; // die();
        $route=Route::model()->find('route=:url', array(':url'=>$pathInfo));
        if(NULL === $route)
            return false;
        //echo 'controller ' . $route->controller;
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
