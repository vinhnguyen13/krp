<?php
$yii=dirname(__FILE__).'/source/framework/yii.php';
$config=dirname(__FILE__).'/config/frontend.php';

defined('YII_DEBUG') or define('YII_DEBUG',false);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
