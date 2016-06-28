<?php

define('DS', '/');
$pathroot = dirname(dirname(__FILE__));
$backend = $pathroot . DIRECTORY_SEPARATOR . 'source/apps/backend/protected';
$frontend = $pathroot . DIRECTORY_SEPARATOR . 'source/apps/frontend/protected';

Yii::setPathOfAlias('pathroot', $pathroot);
Yii::setPathOfAlias('backend', $backend);
Yii::setPathOfAlias('frontend', $frontend);

return array(
	'basePath'=> $backend,
	'name'=>'Admin KelReport',
	'theme' => 'cms',
	'runtimePath' => $backend . DIRECTORY_SEPARATOR . 'runtime',
	'preload'=>array('log'),
	'language' => 'en',
	'import'=>array(
		'application.helpers.*',
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
		'application.modules.ads.models.*',
		'application.modules.cms.models.*',
		'application.modules.media.models.*',
		'application.modules.news.models.*',
		'application.modules.product.models.*',
		'application.modules.user.models.*',
		'application.modules.systems.models.*',
		'application.modules.gallerymanager.models.*',
		'application.modules.srbac.controllers.*',
		'application.modules.srbac.controllers.SBaseController', 
	),
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'user' => array(
			'debug' => false,
			'userTable' => 'usr_user',
			'translationTable' => 'usr_translation',
			'baseLayout' => '//layouts/main',
			'layout' => '//layouts/yum',
			'loginlayout' => '//layouts/login',
			'adminlayout' => '//layouts/yum',
			'mailer'=>'PHPMailer',
			'phpmailer'=>array(
				'transport'=>'smtp',
				'html'=>true,
				'properties'=>array(
					'CharSet' => 'UTF-8',
					'SMTPDebug' => false,
					'SMTPAuth' => true,
					'SMTPSecure' => 'ssl',
					'Host' => 'Kelreport.com',
					'Port' => 465,
					'Username' => 'noreply',
					'Password' => 'HI9U),1oL&hFMVJ*$BBr',
				),
				'msgOptions'=>array(
					'fromName' => 'Kelreport',
					'toName'   => 'Kelreport',
				),
			),
		),
		'usergroup' => array(
			'usergroupTable' => 'usr_usergroup',
			'usergroupMessageTable' => 'usr_user_group_message',
		),
// 		'membership' => array(
// 			'membershipTable' => 'usr_membership',
// 			'paymentTable' => 'usr_payment',
// 		),
		'friendship' => array(
			'friendshipTable' => 'usr_friendship',
		),
		'profile' => array(
			'privacySettingTable' => 'usr_privacysetting',
			'profileFieldTable' => 'usr_profile_field',
			'profileTable' => 'usr_profile',
			'profileCommentTable' => 'usr_profile_comment',
			'profileVisitTable' => 'usr_profile_visit',
		),
// 		'role' => array(
// 			'roleTable' => 'usr_role',
// 			'userRoleTable' => 'usr_user_role',
// 			'actionTable' => 'usr_action',
// 			'permissionTable' => 'usr_permission',
// 		),
		'message' => array(
			'messageTable' => 'usr_message',
		),
		'TranslatePhpMessage',
		'srbac' => array(
			'userclass'=>'YumUser', //default: User
			'userid'=>'id', //default: userid
			'username'=>'username', //default:username
			'delimeter'=>'@', //default:-
			'debug'=>true, //default :false
			'pageSize'=>10, // default : 15
			'superUser' =>'Administrator', //default: Authorizer
			'css'=>'srbac.css', //default: srbac.css
			'layout'=>
			'application.views.layouts.main', //default: application.views.layouts.main,
			//must be an existing alias
			'notAuthorizedView'=> 'srbac.views.authitem.unauthorized', // default:
			//srbac.views.authitem.unauthorized, must be an existing alias
			'alwaysAllowed'=>array( //default: array()
					'SiteLogin','SiteLogout','SiteIndex','SiteAdmin',
					'SiteError', 'SiteContact'),
			'userActions'=>array('Show','View','List'), //default: array()
			'listBoxNumberOfLines' => 15, //default : 10 'imagesPath' => 'srbac.images', // default: srbac.images 'imagesPack'=>'noia', //default: noia 'iconText'=>true, // default : false 'header'=>'srbac.views.authitem.header', //default : srbac.views.authitem.header,
			//must be an existing alias 'footer'=>'srbac.views.authitem.footer', //default: srbac.views.authitem.footer,
			//must be an existing alias 'showHeader'=>true, // default: false 'showFooter'=>true, // default: false
			'alwaysAllowedPath'=>'srbac.components', // default: srbac.components
			'layout' => '//layouts/column1'
		),
		'ads',
		'cms',
		'media',
		'news',
		'product',
		'gallerymanager',
		'TranslatePhpMessage',
		'systems',
        'ads',
		'ReportingTool',
	),
	'components'=> CMap::mergeArray(
		array(
			'user'=>array(
				'class' => 'application.modules.user.components.YumWebUser',
		      	'allowAutoLogin'=>true,
		      	'loginUrl' => array('//user/user/login'),
			),
			// uncomment the following to enable URLs in path-format
			'urlManager'=>array(
				'urlFormat'=>'path',
				'showScriptName' => false,
				'rules'=>array(
					'<controller:\w+>/<id:\d+>'=>'<controller>/view',
					'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
					'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				),
			),
			'image'=>array(     
				'class'=>'application.extensions.image.CImageComponent',            
				'driver'=>'GD', 
				'params'=>array(
						'width' => '900',
						'height' => false,
					)
			), 
			'db'=>array(
				'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
			),
			// uncomment the following to use a MySQL database
			'errorHandler'=>array(
				// use 'site/error' action to display errors
				'errorAction'=>'site/error',
			),
			'cache' => array('class' => 'system.caching.CFileCache'),
			'authManager'=>array(
				'class'=>'application.modules.srbac.components.SDbAuthManager',
				'connectionID'=>'db',
				'itemTable' => 'auth_item',
				'itemChildTable' => 'auth_item_child',
				'assignmentTable' => 'auth_assignment',
			),
			'themeManager' => array(
				'basePath'=> dirname(__FILE__).'/../themes/',
	        	'baseUrl'=>'/themes/'
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
			'curl' =>array(
				'class' => 'application.extensions.curl.Curl',
				'options'=>array(
					'setOptions'=>array(
			        ),
		        ),
			),			
			'ganon' =>array(
				'class' => 'application.extensions.ganon.ganon',
			),			
		),
		require(dirname(__FILE__).'/_partials/config.php')
	),
	'behaviors' => array(
		  'onBeginRequest' => array(
		    'class' => 'application.components.RequireLogin'
		  )
	 ),
	'params'=> CMap::mergeArray(
		array(
			'adminEmail'=>'webmaster@example.com',
			'notRequireLogin' => array(
				'user/user/login', 
				'user/auth', 
				'user/auth/login', 
				'api/activeServers',
				'api/rankingList'
			),
		),
		
		
		require(dirname(__FILE__).'/_partials/params.php')
	)
);