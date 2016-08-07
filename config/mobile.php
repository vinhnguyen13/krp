<?php
define('DS', '/');
$pathroot = dirname(dirname(__FILE__));
$mobile = $pathroot . DS . 'source/apps/mobile/protected';
$backend = $pathroot . DS . 'source/apps/backend/protected';
$themes = $pathroot . DS . 'themes';

Yii::setPathOfAlias('pathroot', $pathroot);
Yii::setPathOfAlias('mobile', $mobile);
Yii::setPathOfAlias('backend', $backend);
Yii::setPathOfAlias('themes', $themes);

return array(
	'basePath'=> $mobile,
	'name'=>'KelReport',
	'theme' => 'mobile_kel',
	'runtimePath' => $mobile . DS . 'runtime',
	'modulePath' => $backend.'/modules',
	'preload'=>array('log'),
	'language' => 'vi',
	'import'=>array(
		'backend.helpers.*',
		'backend.vendors.*',
		'backend.components.*',
		'backend.extensions.*',
		'backend.extensions.image.*',
		'backend.extensions.AttachmentBehavior.*',
		'backend.extensions.captchaExtended..*',
		'backend.extensions.ymds.*',
		'backend.extensions.ymds.extra.*',
		'backend.modules.ads.models.*',
		'backend.modules.cms.models.*',
		'backend.modules.media.models.*',
		'backend.modules.news.models.*',
        'backend.modules.rating.models.*',
		'backend.modules.product.models.*',
		'backend.modules.user.models.*',
		'backend.modules.profile.models.*',
		'backend.modules.geo.models.*',
		'backend.modules.gallerymanager.models.*',
		'backend.modules.systems.models.*',
		'application.models.*',
        'application.helpers.*',
		'application.components.*',
		'backend.modules.user.components.*',
	),
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'user' => array(
			'debug' => false,
			'userTable' => 'usr_user',
			'translationTable' => 'usr_translation',
		 	'baseLayout' => '//layouts/main',
			'layout' => '//layouts/yum',
			'loginLayout' => '//layouts/yum',
			'adminLayout' => '//layouts/yum',
			'passwordRequirements' => array(
				'minLen' => 6,
				'maxLen' => 128,
				'minLowerCase' => 0,
				'minUpperCase'=>0,
				'minDigits' => 0,
				'maxRepetition' => 3,
			),
			'usernameRequirements' => array(
				'minLen'=>3,
				'maxLen'=>255,
				'match' => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',
// 				'match' => '/^[A-Za-z0-9_@\.]+$/u',
				'dontMatchMessage' => 'Incorrect symbol\'s. (A-z0-9)',
			),
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
		'profile' => array(
			'privacySettingTable' => 'usr_privacysetting',
			'profileFieldTable' => 'usr_profile_field',
			'profileTable' => 'usr_profile',
			'profileCommentTable' => 'usr_profile_comment',
			'profileVisitTable' => 'usr_profile_visit',
		),
		'friendship' => array(
			'friendshipTable' => 'usr_friendship',
		),
		'message' => array(
			'messageTable' => 'usr_message',
		),
		'news',
	),
	'components'=> CMap::mergeArray(
		array(
			'user'=>array(
				'allowAutoLogin'=>true,
				'class' => 'mobile.components.YumWebUser',
			),
			'urlManager'=>array(
				'showScriptName' => false,
				'urlFormat'=>'path',
				'rules'=>  CMap::mergeArray(
					array(),
					require(dirname(__FILE__).'/_partials/urls_mobile.php')
				),
			),
			'errorHandler'=>array(
				'errorAction'=>'site/error',
			),
			'image' => array(
				'class' => 'backend.extensions.image.CImageComponent',
				'driver' => 'GD',
				'params' => array(
						'width' => '900',
						'height' => false,
				)
			),
			'log'=>array(
				'class'=>'CLogRouter',
				'routes'=>array(
					array(
						'class'=>'CFileLogRoute',
						'levels'=>'error, warning',
					),
				),
			),
			'assetManager'=>array(
	        	'basePath'=> dirname(__FILE__).'/../source/apps/mobile/assets/',
	            'baseUrl'=>'/source/apps/mobile/assets/'
	        ),
	        'themeManager' => array(
				'basePath'=> dirname(__FILE__).'/../themes/',
	        	'baseUrl'=>'/themes/'
			),
			'cache' => array('class' => 'system.caching.CFileCache'),
			'session' => array (
				'class' => 'system.web.CDbHttpSession',
				'connectionID' => 'db',
				'sessionTableName' => 'sessions',
				'sessionName' => 'depot_session',
				'useTransparentSessionID'   =>(!empty($_POST['PHPSESSID'])) ? true : false,
				'autoStart' => 'false',
				'cookieMode' => 'allow',
				'cookieParams' => array(
						'path' => '/',
				),
				'timeout' => 86400
			),
			'curl' =>array(
				'class' => 'backend.extensions.curl.Curl',
				'options'=>array(
					'setOptions'=>array(
			        ),
		        ),
			),
			'swiftMailer' => array(
			    'class' => 'backend.extensions.swiftMailer.SwiftMailer',
			),
			'facebook'=>array(
				'class' => 'backend.extensions.yii-facebook-opengraph.SFacebook',
				'appId'=>'585096438212050', // needed for JS SDK, Social Plugins and PHP SDK
				'secret'=>'16f01366226778b62bffa33c738f22ab', // needed for the PHP SDK
				//'fileUpload'=>false, // needed to support API POST requests which send files
				//'trustForwarded'=>false, // trust HTTP_X_FORWARDED_* headers ?
				//'locale'=>'en_US', // override locale setting (defaults to en_US)
				//'jsSdk'=>true, // don't include JS SDK
				//'async'=>true, // load JS SDK asynchronously
				//'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
				//'status'=>true, // JS SDK - check login status
				//'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
				//'oauth'=>true,  // JS SDK - enable OAuth 2.0
				//'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
				//'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
				//'html5'=>true,  // use html5 Social Plugins instead of XFBML
				'ogTags'=>array(  // set default OG tags
					'og:title'=>'Kelreport',
					'og:description'=>'Kelreport share',
					'og:image'=>'public/images/ico-share.png?t='.time(),
				),
			),
			'config' => array(
				'class' => 'backend.extensions.EConfig',
				'configTableName' => 'sys_config',
				'strictMode' => false,
			),
		),
		require(dirname(__FILE__).'/_partials/config.php')
	),
	'behaviors' => array(
		'onBeginRequest' => array(
	 		'class'=>'application.components.BeginRequestBehavior'
		)
   	),
	'params'=> CMap::mergeArray(
		require(dirname(__FILE__).'/_partials/params.php'),
		array(
			'adminEmail'=>'contact@Kelreport.com',
		)
	)
);