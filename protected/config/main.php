<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'freelancerjob-test',
    
        //language default
        'sourceLanguage'=>'en',
        'language' => 'it',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.user.models.*',
                'application.modules.user.components.*',
                'application.modules.rights.*',
                'application.modules.rights.components.*',
	),
    
        'behaviors'=>array(
            'onBeginRequest' => array(
                'class' => 'application.components.behaviors.BeginRequest'
            ),
        ),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'user'=>array(
                        'tableUsers' => 'users',
                        'tableProfiles' => 'profiles',
                        'tableProfileFields' => 'profiles_fields',
                ),
                'rights'=>array(
                        'install'=>false,
                ),
	),

	// application components
	'components'=>array(
		'user'=>array(
                        'class'=>'RWebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        'loginUrl' => array('/user/login'),
		),
                    'cache'=>array(
                    'class'=>'system.caching.CFileCache',
                ),
                'request'=>array(
                    'enableCookieValidation'=>true,
                    'enableCsrfValidation'=>true,
                ),
                'session' => array (
                    'autoStart' => true,
                ),
                'authManager'=>array(
                        'class'=>'RDbAuthManager',
                        'connectionID'=>'db',
                        'defaultRoles'=>array('Guest'),
                        'rightsTable' => 'rights',
                ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=freelancerjob',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8'
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'test@test.it',
                'languages'=>array('it'=>'Italiano', 'en'=>'English'),
	),
);