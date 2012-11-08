<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'backend',
    'charset' => 'utf-8',
    'language' => 'zh_cn',
    'timeZone' => 'Asia/Shanghai',

    'preload'=>array('log'),

    'import'=>array(
        'application.models.*',
        'application.components.*',
        'ext.ActiveForm',
        'ext.ActiveRecord',
        'ext.FormModel',
        'ext.Html5',
    ),

    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'1',
             // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),
        'passport',     //运维模块 系统信息 账号 密码
        'core',         //核心功能模块
        'log',          //日志模块
        'cron',         //计划任务模块
        'tools',        //日常维护模块
    ),

    'defaultController' => 'passport',
    'homeUrl' => array('/passport/role/rolelist'),
    // application components
    'components'=>array(
        'user'=>array(
            // enable cookie-based authentication
            'class'=>'WebUser',
            'allowAutoLogin'=>true,
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager'=>array(
            //'urlFormat'=>'path',
            //'showScriptName'=>false,
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),

        'clientScript' => array(
            'class' => 'CClientScript',
            'corePackages' => require(__DIR__ . '/packages.php'),
            'coreScriptUrl' => '/backend/source',
        ),
        /*
        'cache'=>array(
            'class'=>'CMemCache',
            'servers'=>array(
                array(
                    'host' => '127.0.0.1',
                    'port' => 11211,
                    'weight' => 60,
                ),
            ),
        ),
        */
        'db'=>array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=127.0.0.1;dbname=i',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '221058_qm',
            'charset' => 'utf8',
            'schemaCachingDuration' => 3600,
        ),

        'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning, info, profiler, trace', //
                ),
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        'adminEmail' => 'lemon.listry@gmail.com',
        'imgPath' => '/upload',
        'uploadPath' => '/var/www/shadow/backend/upload',
        'version' => '1.0.0', //版本号
    ),
);
