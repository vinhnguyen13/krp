<?php
class Mailer {
	static public function send($to, $subject = null, $body = null, $header = null){
	    if(Yii::app()->params->phpmailer['send']){
            try {
        	    Yii::import('backend.extensions.yii-mail.YiiMailMessage');
        		$message = new YiiMailMessage();
                $message->setBody($body, 'text/html');
                $message->setSubject($subject);
                $message->setTo(array($to=>'You'));
                $message->setFrom(array(Yii::app()->params['noreplyEmail']=>'Kelreport'));
                return Yii::app()->mail->send($message);
            } catch (Exception $e) {
                return false;
            }
	    }
        	
	}
	
	static public function sendByTemplate($to, $template_name, $template_vars = array()){
	    $template = SimpleMailerTemplate::model()->findByAttributes(array(
	            'name' => $template_name,
	    ));
	    if (is_array($template_vars) && !empty($template_vars))
	        $body = strtr($template->body, $template_vars);
	    else
	        $body = $template->body;
	    if(!empty($template->id)){
	        return Mailer::send($to, $template->subject, $body);
	    }
	    return false;
	}
}
