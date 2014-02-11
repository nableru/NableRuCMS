<?php
die('production режим ');

return CMap::mergeArray(
    // наследуемся от main.php
    require(dirname(__FILE__).'/main.php'),
    array(
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
    )
);
