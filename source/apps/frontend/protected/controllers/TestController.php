<?php
/**
 * @author vinhnguyen
 * @desc Test Controller
 */
class TestController extends Controller {
    /**
     * profile user
     */
    public function actionMail() {
        $user = Yii::app()->user->data();
        $to = Yii::app()->request->getParam('email');
        if(empty($to)){
            $to  = $user->profile->email;
        }
        $subject  = 'Test mail';
        $body = Yii::app()->controller->renderPartial('//layouts/email/'.Yii::app()->language.'/invite',array(), true);
        $sent = Mailer::send ( $to,  $subject, $body);
        echo '<pre>';
        print_r($sent.$body);
        echo '</pre>';
        exit();
    }
   
}