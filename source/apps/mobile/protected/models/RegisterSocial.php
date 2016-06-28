<?php

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user Register form data. It is used by the 'Register' action of 'SiteController'.
 */
class RegisterSocial extends CFormModel
{
	public $firstname;
	public $lastname;
	public $email;
	public $password;
	public $gender;
	public $birthday;
	public $location;
	public $type = NULL;
	public $social_id = 0;
	
	private $_identity;
	
	const TYPE_FACEBOOK = 'FACEBOOK';
	const TYPE_GOOGLE = 'GOOGLE';

	/**
	 * Declares the validation rules.
	 * The rules state that email and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// email and password are required
			array('firstname, lastname, email, password', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			array('username', 'validation'),
			array('email', 'validation'),
			array('firstname, lastname, email, password, gender, birthday, location', 'safe'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'firstname'=>'First name',
			'lastname'=>'Last name',
			'email'=>'Email',
			'password'=>'Password',
			'gender'=>'Gender',
			'birthday'=>'Birthday',
			'location'=>'Location',
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
					$profile->email = $this->email;
					$profile->birthday = $this->birthday;
					$profile->location = $this->location;
					$profile->timestamp = time();
					$profile->privacy = 'protected';
					$profile->validate();
					$profile->save();
					/* user social */
					if(!empty($this->type)){
						$us = new UserSocial();
						$us->user_id = $user->id;
						$us->type = $this->type;
						$us->email = $this->email;
						$us->social_id = $this->social_id;
						$us->validate();
						$us->save();
					}
					return true;
				}
			}
		}
		return false;
	}

}
