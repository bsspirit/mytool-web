<?php
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'网站工具',
	'language'=>'zh_cn',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
		'application.util.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			'allowAutoLogin'=>true,
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=webtool',
			'emulatePrepare' => true,
			'username' => 'webtool',
			'password' => 'webtool',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),
		'curl' =>array(
			'class' => 'application.extensions.curl.Curl',
// 			'options'=>array(
//         		'timeout'=>0,
// 		        'cookie'=>array(
// 					'set'=>'cookie'
// 				),
// 			),
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
//				array(
//					'class'=>'CFileLogRoute',
//					'levels'=>'error, warning',
//				),
// 				array(
// 					'class'=>'CWebLogRoute',
// 				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'adminEmail'=>'bsspirit@gmail.com',
	),
);