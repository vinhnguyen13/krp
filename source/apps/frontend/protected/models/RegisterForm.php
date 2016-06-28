<?php

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user Register form data. It is used by the 'Register' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $firstname;
	public $lastname;
	public $email;
	public $password;
	public $confirm_password;
	public $gender;
	public $birthday;
	public $location;
	public $verifyCode;
	public $day;
	public $month;
	public $year;
	
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that email and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// email and password are required
			array('firstname, lastname, email, password, confirm_password, gender', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			array('email', 'validation'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('firstname, lastname, email, password, confirm_password, gender, birthday, location', 'safe'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'firstname'=> Lang::t('settings', 'First name'),
			'lastname'=> Lang::t('settings', 'Last name'),
			'email'=> Lang::t('settings', 'Email'),
			'password'=> Lang::t('settings', 'Password'),
			'confirm_password'=> Lang::t('settings', 'Confirm Password'),
			'gender'=> Lang::t('settings', 'Gender'),
			'birthday'=> Lang::t('settings', 'Birthday'),
			'location'=>Lang::t('settings', 'Location'),
			'verifyCode'=>Lang::t('settings','Verification Code'),
		);
	}
	/**
	 * @param $attribute
	 * @param $params
	 */
	public function validation($value){
		switch ($value){
			case 'email':
				$chk = YumProfile::model()->findByAttributes(array('email'=>$this->email));
				$msg = "Email exist !";
				break;
		}
		if(!empty($chk))
			$this->addError($value, $msg);
	}
	
	public function save()
	{
		if(!$this->hasErrors()){
			$user = new Member();
			$user->username = Member::model()->generateUsername($this->email);
			$user->alias_name = $user->username;
			$user->salt = YumEncrypt::generateSalt();
			$user->password = YumEncrypt::encrypt($this->password, $user->salt);
			$user->createtime = time();
			$user->status = 1;
			$user->validate();
			if($user->save()) {
				if(Yum::hasModule('profile')) {
					$profile = new YumProfile();
					$profile->user_id = $user->id;
					$profile->firstname = $this->firstname;
					$profile->lastname = $this->lastname;
					$profile->birthday = mktime(0, 0, 0, $this->month, $this->day, $this->year);
					$profile->timestamp = time();
					$profile->privacy = 'protected';
					$profile->email = $this->email;
					$profile->validate();
					$profile->save();
					return true;
				}
			}
		}
		return false;
	}
	
	

}
