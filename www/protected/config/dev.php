<?php
return CMap::mergeArray(
    // наследуемся от main.php
    require(dirname(__FILE__).'/main.php'),
    array(
        'name'=>'Nable.Ru CMS v.2.0 dev.',
        'components'=>array(
            // переопределяем компонент db
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
        ),
        'modules' => array(
            // uncomment the following to enable the Gii tool
		    'gii'=>array(
			    'class'=>'system.gii.GiiModule',
			    'password'=> false,
		 	    // If removed, Gii defaults to localhost only. Edit carefully to taste.
			    'ipFilters'=>array('127.0.0.1','::1','192.168.107.111'),
                'ipFilters' => false,
                'generatorPaths'=>array('bootstrap.gii'),
		    ),
        
        ),
    )
);
