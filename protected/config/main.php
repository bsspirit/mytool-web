<?php
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'网站工具',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
		'application.extensions.yii-debug-toolbar.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
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
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
//				array(
//					'class'=>'CFileLogRoute',
//					'levels'=>'error, warning',
//				),
//				array(
//					'class'=>'CWebLogRoute',
//				),
//				array(
//	                'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
//	                //If true, then after reloading the page will open the current panel
//	                'openLastPanel'=>true,
//	                // Access is restricted by default to the localhost
//	                //'ipFilters'=>array('127.0.0.1','192.168.1.*', 88.23.23.0/24),
//					//This is a list of paths to extra panels.
////					'additionalPanels'=>array(
////						'YiiDebugToolbarPanelExample', // add as last
////						'prepend:YiiDebugToolbarPanelExample', // add as first
////					),
//	            ),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'adminEmail'=>'bsspirit@gmail.com',
	),
);