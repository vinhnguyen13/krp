<?php
/**
 * Begin Request Behavior 
 *
 */
class BeginRequestBehavior extends CBehavior{
    public function attach($owner)
    {
        $owner->attachEventHandler('onBeginRequest',array($this,'handleLoadLanguage'));
    }
    
    public function handleLoadLanguage($event){    
        $app = Yii::app();
//         $ln = explode(";",$_SERVER["HTTP_ACCEPT_LANGUAGE"]);
        $lang = $app->language;
//         if(!empty($ln) && !empty($ln[0])){
//             $lnn = explode(",",$ln[0]);
//             if(!empty($lnn) && !empty($lnn[1])){
//                 $lang = $lnn[1];
//             } 
//         }
        
        if (isset($_GET['_lang']))
        {
            $app->language = $_GET['_lang'];
            $app->session['_lang'] = $app->language;
        }
        else if (isset($app->session['_lang']))
        {
            $app->language = $app->session['_lang'];
        }else{
            $app->language = $lang;
        }
    }
   
}