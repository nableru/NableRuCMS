<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('NableModule', dirname(__FILE__).'/../modules/nable/');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    //'theme' => 'nable',
    //'language' => 'ru',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log', /*'bootstrap', 'editablegridview'*/),

	// autoloading model and component classes
	'import'=>array(
        'application.modules.user.models.*',
        'application.modules.srbac.controllers.SBaseController',
		'application.models.*',
		'application.components.*',
        'ext.columns.*',
	),

	'modules'=>array(
        'nable',
        'DbEntity',
        'editinplace',
		'user' => array(
            'debug' => false,
            'userTable' => 'user',
            'translationTable' => 'translation',
        ),
        'usergroup' => array(
            'usergroupTable' => 'user_group',
            'usergroupMessagesTable' => 'user_group_message',
        ),
        'membership' => array(
            'membershipTable' => 'membership',
            'paymentTable' => 'payment',
        ),
        'friendship' => array(
            'friendshipTable' => 'friendship',
        ),
        'profile' => array(
            'privacySettingTable' => 'privacysetting',
            'profileFieldTable' => 'profile_field',
            'profileTable' => 'profile',
            'profileCommentTable' => 'profile_comment',
            'profileVisitTable' => 'profile_visit',
        ),
        'role' => array(
            'roleTable' => 'role',
            'userRoleTable' => 'user_role',
            'actionTable' => 'action',
            'permissionTable' => 'permission',
        ),
        'message' => array(
            'messageTable' => 'message',
        ),
        'srbac' => array(
            'userclass'=>'User', //default: User
            'userid'=>'id', //default: userid
            'username'=>'username', //default:username
            'delimeter'=>'@', //default:-
            'debug'=>true, //default :false
            'pageSize'=>10, // default : 15
            'superUser' =>'Authority', //default: Authorizer
            'css'=>'srbac.css', //default: srbac.css
            'layout'=> 'application.views.layouts.main', //default: application.views.layouts.main,
                                                         //must be an existing alias
            'notAuthorizedView'=> 'srbac.views.authitem.unauthorized', // default:
                                                        //srbac.views.authitem.unauthorized, must be an existing alias
            'alwaysAllowed'=>array( //default: array()
                'SiteLogin','SiteLogout','SiteIndex','SiteAdmin',
                'SiteError', 'SiteContact'
            ),
            'userActions'=>array('Show','View','List'), //default: array()
            'listBoxNumberOfLines' => 15, //default : 10
            'imagesPath' => 'srbac.images', // default: srbac.images
            'imagesPack'=>'noia', //default: noia
            'iconText'=>true, // default : false
            'header'=>'srbac.views.authitem.header', //default : srbac.views.authitem.header,
                                                     //must be an existing alias
            'footer'=>'srbac.views.authitem.footer', //default: srbac.views.authitem.footer,
                                                     //must be an existing alias
            'showHeader'=>true, // default: false
            'showFooter'=>true, // default: false
            'alwaysAllowedPath'=>'srbac.components', // default: srbac.components
                                                     // must be an existing alias
        ),
    ),

	// application components
	'components'=>array(
/*        'bootstrap'=>array(
            'class'=>'ext.bootstrap.components.Bootstrap',
        ),*/
        'cache' => array('class' => 'system.caching.CDummyCache'),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            'class' => 'application.modules.user.components.YumWebUser',
            'loginUrl' => array('//user/user/login'),
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'      => 'path',
            'showScriptName' => false,
            'rules' => array(
                // a custom rule to handle '/Manufacturer/Model'
//                '_saveItem' => array(
//                    'class' => 'application.components.SaveDbItem',
//                    'connectionID' => 'db',
//                ),
                '<url:\w+>' => array(
                    'class' => 'application.components.DbRoute',
                	'connectionID' => 'db',
                ),
                // главная страница, чтобы избавиться от index в урле.
                //'' => 'site/index',
                // по-умолчанию, все урлы перенаправляются в контроллер site
                // чтобы избавиться от имени контроллера в урле.
                // отображение статических страниц page?view=$page_name
                //'page/<view:\w+>' => 'site/page',    
                // default rule
                //'page/<id:\d+>'=>'page/index',
                //'<action:\w+>'=>'site/<action>',

                //'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				//'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                'nable/entity/<type:\w+>/<id:\d+>'=>'nable/entity/get',
                'nable/entity/new' => 'nable/entity/new',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
/*			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),*/
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
            'class'            => 'CDbConnection',
			'connectionString' => 'mysql:host=localhost;dbname=nable20',
			'emulatePrepare'   => true,
			'username'         => 'nable20',
			'password'         => 'VcXEcmxZWcnC6VnZ',
			'charset'          => 'utf8',
            'tablePrefix'      => 'nable_',
            // включаем профайлер
            'enableProfiling'  => true,
            // показываем значения параметров
            'enableParamLogging' => true,
		),
        'authManager'=>array(
            // Path to SDbAuthManager in srbac module if you want to use case insensitive
            //access checking (or CDbAuthManager for case sensitive access checking)
            'class'=>'application.modules.srbac.components.SDbAuthManager',
            // The database component used
            'connectionID'=>'db',
            // The itemTable name (default:authitem)
            'itemTable'=>'items',
            // The assignmentTable name (default:authassignment)
            'assignmentTable'=>'assignments',
            // The itemChildTable name (default:authitemchild)
            'itemChildTable'=>'itemchildren',
        ),

/*        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
            'defaultRoles'=>array('authenticated', 'guest'),
        ),*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CWebLogRoute',
                    'categories' => 'application',
                    'levels'=>'error, warning, trace, profile, info',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
    'clientScript' => array(
        'packages' => array(
            'jquery' => array(
                'baseUrl'=>'//ajax.googleapis.com/ajax/libs/jquery/2.0.3/',
                'js' => array(YII_DEBUG ? 'jquery.js' : 'jquery.min.js'),
            ),
            'jquery.ui' => array(
                'baseUrl'=>'//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/',
                'js' => array(YII_DEBUG ? 'jquery-ui.js' : 'jquery-ui.min.js'),
                'depends' => array('jquery'),
            ),
        ),
    ),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'info@nable.ru',
	),
);
