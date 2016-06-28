<?php

/**
 * @author: Nam Le
 */
class MailForm extends CFormModel
{
	public $from;
	public $name;
	public $to;
	public $subject;
	public $message;
	public $verifyCode;
	
	const TEMPLATE = '<p>{name} chia sẽ cho bạn bài viết <a href="{link}">{title}</a> từ Kelreport.</p>';

	public function rules()
	{
		return array(
			// name, subject and message are required
			array('from, name, to, verifyCode', 'required'),
			// email has to be a valid email address
			array('from, to', 'email'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'from'=> Lang::t('general', 'Your email'),
			'name'=>Lang::t('general', 'Your name'), 
			'to'=>Lang::t('general', 'Your friend\'s email'),
			'subject'=>'Subject',
			'message'=>'Message',
			'verifyCode'=>Lang::t('general', 'Verification Code'), 
		);
	}
}
