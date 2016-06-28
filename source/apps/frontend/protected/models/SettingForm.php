<?php
class SettingForm extends CFormModel
{
	public $fullname;
	public $email;
	public $current_password;
	public $new_password;
	public $retype_new_password;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('fullname', 'required'),
			array('email', 'email'),
			array('current_password', 'validation'),
			array('retype_new_password', 'compare',
	                'compareAttribute'=>'new_password',
	                'message' => Lang::t('yii', "Re-type New Password is incorrect.")),
			array('fullname, email, current_password, new_password, retype_new_password', 'safe'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'fullname'=>Lang::t('settings', 'Full name'),
			'email'=>	Lang::t('settings', 'Email'),
			'current_password'=>Lang::t('settings', 'Current Password'),
			'new_password'=>Lang::t('settings', 'New password'),
			'retype_new_password'=>	Lang::t('settings', 'Re-type New Password'),
		);
	}
	/**
	 * @param $attribute
	 * @param $params
	 */
	public function validation($value){
		$user = Yii::app()->user->data();
		$chk = false;
		switch ($value){
			case 'current_password':
				if(!empty($this->current_password)){
					if(!YumEncrypt::validate_password($this->current_password, $user->password, $user->salt)){
						$chk = true;
					}
					$msg = "Current password not correct!";
				}
				break;
		}
		if(!empty($chk))
			$this->addError($value, $msg);
	}
	/**
	 * 
	 */
	public function save()
	{
		$user = Yii::app()->user->data();
		if(!$this->hasErrors() && !empty($user->id)){
			$tmp = explode(' ', $this->fullname);
			if(!empty($tmp) && is_array($tmp)){
				$user->profile->firstname = trim($tmp[0]);
				$user->profile->lastname = trim(str_replace($user->profile->firstname, '', $this->fullname));
				$user->profile->validate();
				if(!$user->profile->hasErrors() && $user->profile->save()){
				}
			}
			
			if(YumEncrypt::validate_password($this->current_password, $user->password, $user->salt)){
				$user->salt = YumEncrypt::generateSalt();
				$user->password = YumEncrypt::encrypt($this->new_password, $user->salt);
				$user->validate();
				if (!$user->hasErrors()) {
					$user->save();
				}
			}
		}
		return false;
	}

}
