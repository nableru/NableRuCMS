<?php

// change the following paths if necessary

if($_SERVER['HTTP_HOST'] === 'nable20.test.nable.ru')
{
    // remove the following lines when in production mode
    // specify how many levels of call stack should be shown in each log message
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

    defined('YII_DEBUG') or define('YII_DEBUG', true);
    $yii=dirname(__FILE__).'/../framework/yii.php';
    $config=dirname(__FILE__).'/protected/config/dev.php';
}
else
{
    defined('YII_DEBUG') or define('YII_DEBUG', false);
    $yii=dirname(__FILE__).'/../framework/yiilite.php';
    $config=dirname(__FILE__).'/protected/config/production.php';
}

require_once($yii);
Yii::createWebApplication($config)->run();
