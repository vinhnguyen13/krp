config.php
<?php
return	array(
	'db' => array(
		'connectionString' => 'mysql:host=localhost;dbname=kelreport_main',
		'emulatePrepare' => true,
		'username' => 'root',
		'password' => 'root',
		'charset' => 'utf8',
		'tablePrefix' => '',
	),
	'db_activity' => array(
		'connectionString' => 'mysql:host=localhost;dbname=kelreport_activity',
		'class'            => 'CDbConnection',
		'username' => 'root',
		'password' => 'root',
		'charset' => 'utf8',
		'tablePrefix' => '',
		'emulatePrepare' => true,
	),
	'db_mail' => array(
        'connectionString' => 'mysql:host=localhost;dbname=kelreport_mail',
        'class'            => 'CDbConnection',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
        'tablePrefix' => '',
        'emulatePrepare' => true,
    ),
);

params.php
<?php
return array(
	'webRoot' => dirname(dirname(dirname(__FILE__))),
	'upload_path' => 'D:/Code/xampp/htdocs/www/project/outsource/kelreport',
	'notRequireLogin' => array(
	    'user/user/login',
	    'user/auth',
		'user/auth/login',
	),
	'phpmailer' => array(
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
		'send' => true,
	),
	'uploads'=>array(
		'avatar'=>array(
			'extension'=>array(),
			'size'=>'5000000',
			'p93x93' => array('w'=>120, 'h'=>120, 'p'=>'uploads/avatar/p93x93'),
			'tmp' => array('w'=>120, 'h'=>120, 'p'=>'uploads/avatar/p93x93'),
		),
		'photos'=>array(
			'extension'=>array('jpeg', 'jpg', 'gif', 'png'),
			'positions'=>array('banner'=>'Banner', 'character'=>'Character', 'advertising'=>'Advertising'),
			'resolutions'=>array('1024_768', '1152_864', '1280_800', '1280_1024', '1366_768', '1440_900', '1600_900', '1920_1080'),
		),
		'videos'=>array(
			'extension'=>array('flv')
		),
		'flash'=>array(
			'extension'=>array('swf')
		),
		'article'=>array(
			'extension' => array('jpg','jpeg','png'),
			'size'=> 20 * 1024 * 1024,
			'thumb300x0' => array('w'=>300, 'h'=> 300, 'p'=>'uploads/picks/article/{year}/{month}/{day}/thumb300x0'),
			'detail960x0' => array('w'=>960, 'h'=> null, 'p'=>'uploads/picks/article/{year}/{month}/{day}/detail960x0'),
			'origin' => array('w'=>799, 'h'=> null, 'p'=>'uploads/picks/article/{year}/{month}/{day}/origin'),
			'path' => 'uploads/picks/article/{year}/{month}/{day}',
		),		
	),
	'pagination'=>array(
		'product'=>32,
		'news'=>12,
	),
	'sections'=>array(
		'home'=>1,
		'introduction'=>2,
		'products'=>3,
		'services'=>4,
		'news'=>5,
		'contact'=>6,
	),	
	'media_video_type'=>array(
		'YTB'=>'youtube',
		'NCT'=>'nhaccuatui',
	),
	'news' => array(
        'upload_path'=> 'uploads/articles/',
        'thumbnail_path'=> '/uploads/thumbnails/',
        'event_path'=> 'uploads/events/',
        'widget_path' => 'uploads/widgets/',
        'widget_thumbnail_path' => 'uploads/widgets/thumbnails/',
        'limit_related' => 5,
        'limit_latest' => 5,
        'limit_comment' => 10,
	),
	'ads'=>array(
        'extension'=>array('jpeg', 'jpg', 'gif', 'png', 'swf'),
        'upload_path' => 'uploads/ads/'
    ),
    'facebook' => array(
        'appId'=>'585096438212050', // needed for JS SDK, Social Plugins and PHP SDK
		'secret'=>'16f01366226778b62bffa33c738f22ab', // needed for the PHP SDKz
		'limit'	=>	10,
    ),
    'google' => array(
        'clientId'=>'997676932381-0d3cdar3n7lrqvsv2df6e6d082jgedld.apps.googleusercontent.com', // needed for JS SDK, Social Plugins and PHP SDK
		'clientSecret'=>'93HbNe0t2UHI2sAgWqCrKRly', // needed for the PHP SDKz
		'redirectUri'=>'//site/google', // needed for the PHP SDKz
		'developerKey'=>'AIzaSyDq0ClgzHsSQRROzh-cmy8ZYnvYuP1VoZ4', // needed for the PHP SDKz
    ),
    'googleapi' => array(
			'client_id'=>'246899240170.apps.googleusercontent.com', // needed for JS SDK, Social Plugins and PHP SDK
			'client_secret'=>'xWuPZEFJHRatcRRRJ_tn-xdd', // needed for the PHP SDKz
			'limit'	=>	10,
	),
	'yahooapi' => array(
		'oauth_consumer_key'=>'dj0yJmk9UzQ1SmxrbTNMb01XJmQ9WVdrOVpsbHlSRGsxTmpRbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD03NA--', // needed for JS SDK, Social Plugins and PHP SDK
		'oauth_consumer_secret'=>'9ac17f735bd330c2888ba5a2279a9281f0bec1b8', // needed for the PHP SDKz
		'oauth_domain'=>'http://localhost.kelreport.com',
		'oauth_app_id'=>'fYrD9564',
		'limit'	=> 50,
	),
);


urls.php
<?php
return array(
		'trang-chu' 												=> 'site/index',
		'picks/<section>/<id:\d+>-<slug>'							=> 'article/view',
		'picks/<section>'											=> 'article/section',
		'picks/<section>/<page:\d+>'								=> 'article/section',
		'tags/editor'												=> 'article/editor',
		'tags/editor/<page:\d+>'									=> 'article/editor',
		'picks/<section>/<category>'								=> 'article/category',
		'picks/<section>/<category>/<page:\d+>'						=> 'article/category',
        
		'tags/<tag>' 												=> 'article/tag',
        'tags/<tag>/<page:\d+>'										=> 'article/tag',

		'gioi-thieu'												=> 'content/introduction',
		'san-pham'													=> 'products',
		'san-pham/trang-<page:\d+>'									=> 'products/index',
		'san-pham/danh-muc/<catid:\d+>-<cslug>'						=> 'products/index',
		'san-pham/chi-tiet/<id:\d+>-<slug>/trang-<page:\d+>'		=> 'products/view',
		'san-pham/chi-tiet/<id:\d+>-<slug>'							=> 'products/view',
		'dich-vu'													=> 'services',
		'dich-vu/<id:\d+>-<slug>'									=> 'services/view',
		'tin-tuc'													=> 'news',
		'tin-tuc/trang-<page:\d+>'									=> 'news/index',
		'tin-tuc/<id:\d+>-<slug>'									=> 'news/view',
		'rao'														=> 'ads/news',
		'rao/<id:\d+>-<slug>'										=> 'ads/newsdetail',
		'video'														=> 'media/video',
		'video/<id:\d+>-<slug>'										=> 'media/videodetail',
		'album'														=> 'media/album',
		'album-view'												=> 'media/albumdetail',
		'photo'														=> 'media/photo',
		'photo/<id:\d+>-<slug>'										=> 'media/photodetail',
		'lien-he' 													=> 'site/contact',
		'dat-hang-thanh-toan'										=> 'content/payment',
		'tim-kiem'													=> 'content/search',
		'invite-friend'												=> 'site/invite',
			
		'<controller:\w+>/<id:\d+>'									=>'<controller>/view',
		'<controller:\w+>/<action:\w+>/<id:\d+>'					=>'<controller>/<action>',
		'<controller:\w+>/<action:\w+>'								=>'<controller>/<action>',
);


###############urls_mobile.php######################
<?php
return array(
		'isu/load/<id:\d+>'											=>	'//isu/load',
		'isu/<action:\w+>'											=>	'//isu/<action>',
		'hotbox/<id:\d+>-<slug>'									=>	'//hotbox/load',
		'hotbox-share/<id:\d+>-<slug>'								=>	'//site/hotbox',
		'u/<alias:([\w\.])+>/settings' 								=> 	'//settings/index',
		'u/<alias:([\w\.])+>/settings/<action:\w+>' 				=> 	'//settings/<action>',
		'u/<alias:([\w\.])+>/bookmark' 								=> 	'//bookmark/index',
		'u/<alias:([\w\.])+>/photo' 								=> 	'//photo/index',
		'u/<alias:([\w\.])+>/allphoto' 								=> 	'//photo/viewphoto',
		'u/<alias:([\w\.])+>/viewphotomore' 						=> 	'//photo/viewphotomore',
		'u/<alias:([\w\.])+>/photo/request' 						=> 	'//photo/myrequest',
		'u/<alias:([\w\.])+>/friends' 								=> 	'//friend/index',
		'u/<alias:([\w\.])+>/friends/request' 						=> 	'//friend/request',
		'u/<alias:([\w\.])+>/alerts' 								=> 	'//alerts/index',
		'u/<alias:([\w\.])+>/messages' 								=> 	'//messages/index',
		'u/<alias:([\w\.])+>/messages/view' 						=> 	'//messages/view',
		'u/<alias:([\w\.])+>/messages/compose' 						=> 	'//messages/compose',
		'u/<alias:([\w\.])+>/quicksearch'							=> 	'//my/quicksearch',
		'u/<alias:([\w\.])+>/feed'        							=> 	'//newsFeed/feed',
		'u/<alias:([\w\.])+>/photosSetAvatar'    					=> 	'//my/PhotosSetAvatar',
		'u/<alias:([\w\.])+>' 										=> 	'//my/view',
        
        'invitation/<controller:\w+>/<action:\w+>'                  =>  '//invitation/<controller>/<action>',
		'comingsoon'												=>	'//site/comingsoon',
		'forgotpass'												=>	'//site/forgotpass',
		'login'														=>	'//site/login',
		'about'														=>	'//site/page/view/about',
		'privacy'													=>	'//site/page/view/privacy',
		'community-guidelines'										=>	'//site/page/view/community-guidelines',
		'users-agreement'											=>	'//site/page/view/users-agreement',
        
		'<controller:\w+>/<id:\d+>'									=>	'<controller>/view',
 		'<controller:\w+>/<action:\w+>/<id:\d+>'					=>	'<controller>/<action>',
		'<controller:\w+>/<action:\w+>'								=>	'<controller>/<action>',
		
);
