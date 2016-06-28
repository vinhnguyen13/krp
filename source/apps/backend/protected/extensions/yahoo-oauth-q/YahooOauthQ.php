<?php
require_once 'yos-social-php5-master/lib/OAuth/OAuth.php';
require_once 'yos-social-php5-master/lib/Yahoo/YahooOAuthApplication.class.php';

define('OAUTH_SSL_VERIFYPEER', false);

class YahooOauthQ extends YahooOAuthApplication {
	
	/*
	 * function getOpenIDUrl($call_back_url);
	*/
	
	public function setRequestToken($request_token) {
		$request_token = new YahooOAuthRequestToken($request_token, '');
		$this->token = $this->getAccessToken($request_token);
		$_SESSION['yahoo_request_token'] = $this->token->to_string();
	}
	
	public function getYahooContacts($offset, $limit) {
		
		if(is_null($this->token) && isset($_SESSION['yahoo_request_token'])) {
			$this->token = YahooOAuthAccessToken::from_string($_SESSION['yahoo_request_token']);
		}
		
		$profile  = $this->getProfile();
		
		$contacts = parent::getContacts($profile->profile->guid, $offset, $limit);
		
		$contacts = $contacts->contact;
		
		if(!is_array($contacts)) {
			$contacts = array($contacts);
		}
		
		return $this->filterContacts($contacts);
	}
	
	private function filterContacts($contacts) {
		
		$contacts_filter = array();
		
		foreach($contacts as $k=>$contact) {
			$fields = $contact->fields;
			$c_filter = array();
			$c_filter['name'] = '';
			$c_filter['email'] = '';
			if(!is_array($fields))
				$fields = array($fields);
			foreach($fields as $field) {
				if($field->type=='yahooid') {
					if($c_filter['email']=='')
						$c_filter['email'] = $field->value.'@yahoo.com';
					if($c_filter['name']=='')
						$c_filter['name'] = $field->value;
				}
				if($field->type=='email')
					$c_filter['email'] = $field->value;
				if($field->type=='name') {
					$c_filter['name'] = ($field->value->givenName=='') ? $field->value->familyName : $field->value->givenName;
				}
			}
			array_push($contacts_filter, $c_filter);
		}
		
		return $contacts_filter;
	}
}