<?php

class Member extends YumUser {
	const Level_Visitor 		= "Visitor";
	const Level_FreeMember 		= "FreeMember";
	const Level_Premium 		= "Premium";
	const Level_VIP				= "VIP";
	const Level_STAR			= "STAR";
	
	const PREFIX_VISITOR		= 'guest';
	const PREFIX_FREEMEMBER		= 'm';
	const PREFIX_PREMIUM		= 'p';
	const PREFIX_VIP			= 'vip';
	const PREFIX_STAR			= 'star';
	
	const PREFIX_VIP_URL		= '';
	const PREFIX_STAR_URL		= '';
	
	const LEVELS				= '(guest|m|p)';
	
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
	
	public function attributeLabels() {
		return array (
			'lastname' => 'Last Name',
			'firstname' => 'First Name',
			'alias_name' => 'Alias Url',
		);
	}
	
	public function relations(){
		$relations = array();
// 		$relations['avatar'] = array(self::BELONGS_TO, 'Photo', 'avatar_id');
                $relations['profile_settings'] = array(self::HAS_ONE, 'UsrProfileSettings', 'user_id');
		return CMap::mergeArray(
			$relations,
			parent::relations()
		);
	}
	
	public function rules(){
		
		$user = Member::getUserByUsername($this->username);
		if ($user->alias_name != $this->alias_name)
			$rules[] = array('alias_name', 
				'unique',
				'message' => Yum::t("This alias name already exists."));
		
		$rules[] = array(
				'alias_name',
				'match',
				'pattern' => '/^[A-Za-z0-9\.]+$/u',
				'message' => Yum::t("Incorrect symbol (A-z0-9.)"));
		
		$rules[] = array('lastname, firstname, alias_name', 'safe');
		return $rules;
	}
	
	public static function getUserByUsername($username){
		$criteria = new CDbCriteria;
		$criteria->addCondition('username = :username');
		$criteria->params = array(':username' => $username);
		$tmp = Member::model()->find($criteria);
		return $tmp ? $tmp : new Member();
	}
	
	public function getNoAvatar(){
		return Yii::app()->baseUrl."/public/images/no-user.jpg";
	}
	
    public function getAvatar($html = false, $thumb = false, $size = ""){
        $url = CParams::load()->urlAvatar($this->avatar);		
        if(!empty($url))
		    return $url;
		return $this->getNoAvatar();		
	}
	
	public function createUrl($url, $params = array()) {
		return Yii::app()->createUrl($url, CMap::mergeArray(array('alias' => $this->getAliasName()), $params));
	}
	
	public function createAbsoluteUrl($url, $params = array()) {
		return Yii::app()->createAbsoluteUrl($url, CMap::mergeArray(array('alias' => $this->getAliasName()), $params));
	}
		
	public function getUserUrl($absolute = false){
		return ($absolute) ? $this->createAbsoluteUrl('//my/view', array()) : $this->createUrl('//my/view');
	}
	
	public function getUserLink($htmlOptions = array()){
		return $this->createLink($this->getDisplayName(), '//my/view', array(), $htmlOptions);
	}
	
	public function getDisplayName(){
		$name = '';
		if(!empty($this->profile)){
			$name = sprintf('%s %s', $this->profile->firstname, $this->profile->lastname);
		}
		if(empty($name) || $name == ' '){
			$name = $this->username;
		}
		return $name;	
	}
	
	public function createLink($text, $url, $params, $htmlOptions = array()) {
		return CHtml::link($text, $this->createUrl($url, $params), $htmlOptions);
	}
	
	public function getAliasName(){
		if (!empty($this->alias_name)){
			return $this->alias_name;
		}
		return false;
	}
	
	public function checkRole($action){
		if(Yii::app()->user->checkAccess($action)){
			return true;
		}
		return false;		
	}
	
	public function isMe(){
		if(Yii::app()->user->id == $this->id){
			return true;
		}
		return false;
	}
	
	public function isFollow(){
		$follow = Following::model()->returnFollowing(Yii::app()->user->id, $this->id);
		if($follow){
			return true;
		}
		return false;
	}
	
	public function generateUsername($email){
	    if(!empty($email)){
	        $username = Util::getUsernameFromEmail($email);
	        $username = strtolower($username);
	        $suffix = 0;
	        $unique = $username;
	        while ( $userExist = $this->findByAttributes(array('username'=>$unique)) ) {
	            $suffix += rand ( 1, 999 );
	            $unique = $username . $suffix;
	        }
	        return $unique;
	    }
        return false;
	}
}

?>