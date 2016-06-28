<?php
$frontend = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'apps/frontend/protected';
Yii::setPathOfAlias('frontend', $frontend);

$backend = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'apps/backend/protected';
Yii::setPathOfAlias('backend', $backend);

return array(
	'basePath'=>$backend,
	'name'=>'My Console Application',	
	'language' => 'en',
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.modules.user.controllers.YumController',
		'application.modules.srbac.controllers.SBaseController',
		'application.modules.category.models.*',
		'application.modules.galleries.extensions.*',
		'application.modules.galleries.controllers.GalleriesController',
		'application.modules.srbac.models.*',
		'backend.modules.member.models.*',
	),
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'user' => array(
			'debug' => false,
			'userTable' => 'user',
			'translationTable' => 'translation',
			'baseLayout' => '//layouts/main',
			'layout' => '//layouts/yum',
			'loginLayout' => '//layouts/login',
			'adminLayout' => '//layouts/yum'
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
		'imgManager' => array(
			'import' => array('imgManager.*','imgManager.components.*'),
			'layout' => 'application.views.layouts.column1',
			'upload_directory' => 'galleries',
			'max_file_number' => '10',                  //max number of files for bulk upload.
			'max_file_size' => '1mb',
		),
		'widget',
		'category',
		'avatar' => array(
			'avatarPath' => 'uploads/avatars' 
		),
		'galleries' => array(
			'upload_directory' => 'uploads/gallery',
			'cache_directory' => 'uploads/cache',
			'maxWidthThumb' => 234,
			'maxHeightThumb' => 250,
			'baseUrl' => '',
			'coverWidth' => 240,
			'coverHeight' => 580,
		),
		'member' =>  array(
		
		),
	),
	'components'=> CMap::mergeArray(
		array(
		
		),
		require(dirname(__FILE__).'/_partials/config.php')
	),	
   	'params'=> CMap::mergeArray(
		array(
			'adminEmail'=>'webmaster@example.com',
		),
		require(dirname(__FILE__).'/_partials/params.php')
	)
);