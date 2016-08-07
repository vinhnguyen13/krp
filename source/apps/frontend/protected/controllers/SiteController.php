<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
                'class'=>'backend.extensions.captchaExtended.CaptchaExtendedAction',
                'mode'=> CaptchaExtendedAction::MODE_NUM,
                'offset'=>'4',
                'density'=>'0',
                'lines'=>'0',
                'fillSections'=>'0',
                'foreColor'=>'0x000000',
                'minLength'=>'6',
                'maxLength'=>'6',
                'fontSize'=>'24',
                'angle'=>false,
		    ),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
				'basePath'=>'pages/'.Yii::app()->language,
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
	    $this->pageTitle = Yii::app()->name . ' - ' . Lang::t('general', 'Daily Recommendations on Shopping & Lifestyle');
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$data['news_and_promos'] = Article::model()->getListArticlesBySection(7, 0, 4);
		$data['features'] = Article::model()->getListArticlesBySection(12, 0, 4);
		$data['restaurants'] = Article::model()->getListArticlesBySection(8, 0, 4);
		$data['videos'] = Article::model()->getListArticlesBySection(11, 0, 4);
		$data['peoples'] = Article::model()->getListArticlesBySection(10, 0, 4);
		$data['populars'] = Article::model()->getMostLike(5);

		$this->render('index',array('data'=>$data));
	}

	public function actionLang()
	{
		$referrer =  Yii::app()->request->getUrlReferrer();
		if(!empty($referrer)){
			Yii::app()->user->returnUrl = $referrer;
		}
		$_lang = Yii::app()->request->getParam('_lang');
		if(!empty($_lang) && !empty(Yii::app()->user->returnUrl)){
			$this->redirect(Yii::app()->user->returnUrl);
		}
	}
	public function actionEveryWhere(){
		$city_id = Yii::app()->request->getPost('city_id', false);
				
		$articles	=	Article::model()->getArticleByLocation($city_id);
		$this->renderPartial('partial/everywhere', array(
				'articles'	=>	$articles
		));
				
	}
	public function actionLocation()
	{
		$referrer =  Yii::app()->request->getUrlReferrer();
		if(!empty($referrer)){
			Yii::app()->user->returnUrl = $referrer;
		}
		$_location = Yii::app()->request->getParam('_location');
		if(!empty($_location) && !empty(Yii::app()->user->returnUrl)){
			$location = ProLocation::model()->findByPk($_location);
			Yii::app()->session['_location'] = json_encode($location->attributes);
		}else{
			unset(Yii::app()->session['_location']);
		}
		$this->redirect(Yii::app()->user->returnUrl);
	}
	
	public function actionSetLocation(){
		$_location = Yii::app()->request->getParam('_location');

		if(!empty($_location)){
			$location = ProLocation::model()->findByPk($_location);
			Yii::app()->session['_location'] = json_encode($location->attributes);
		}else{
			unset(Yii::app()->session['_location']);
		}
		exit;		
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    $this->layout = 'error';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm();
		
		$subjectOptions = $model->getSubjectOptions();
		
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$subject = $model->subject;
				
				if($subject=='1')
					$mail_to = Yii::app()->params['salesEmail'];
				elseif($subject=='2' || $subject=='4')
					$mail_to = Yii::app()->params['editorEmail'];
				else
					$mail_to = Yii::app()->params['infoEmail'];
				
				$model->subject = $subjectOptions[$model->subject];
				
				$mail_subject  = "Contact info from Kelreport";
				$mail_body  = Yii::app()->controller->renderPartial('//layouts/email/'.Yii::app()->language.'/contact',array(
					'name'=>$model->name,
					'email'=>$model->email,
					'phone_number'=>$model->phone_number,
					'subject'=>$model->subject,
					'body'=>$model->body,
				), true);
				
				$sent = Mailer::send ( $mail_to,  $mail_subject, $mail_body);
				
				$model->save(false);
				Yii::app()->user->setFlash('contact',Yii::t('settings', 'Contact Success Message'));
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model, 'subjectOptions'=>$subjectOptions));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
	    if(!Yii::app()->user->isGuest){
	        $this->redirect('/');
	    }
	    if(Yii::app()->user->returnUrl == '/' && !empty(Yii::app()->user->returnUrl)){
	        Yii::app()->user->returnUrl = Yii::app()->request->getUrlReferrer();
	    }
	    if($redirect_url = Yii::app()->request->getParam('redirect_url')){
	        Yii::app()->user->returnUrl = $redirect_url;
	    }
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='frm-login')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$user = Yii::app()->user->data();
				$user->lastvisit = time();
				$user->save();
				
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	public function actionAjaxLogin()
	{
//		error_reporting(E_ALL);
//		ini_set('display_errors', 1);
		$model=new LoginForm;
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			$model->rememberMe=true;
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				echo json_encode(array('status'=>true, 'message' => 'Login is successful'));
				Yii::app()->end();
			}
		}
		return false;
	}

	public function actionAjaxRegister()
	{
		$model = new RegisterForm();
		if(Yii::app()->request->isPostRequest){
			$model->attributes = Yii::app()->request->getPost('RegisterForm');
			$model->validate();
			if(!$model->hasErrors()){
				if($model->save()) {
					$frlogin=new LoginForm();
					$frlogin->loginByUsernamePass($model->email, $model->password, false);
					//$this->redirect('/');
					echo json_encode(array('status'=>true, 'message' => 'Register is successful'));
					Yii::app()->end();
				}
			}
		}
		return false;
	}
	/**
	 * Register
	 */
	public function actionRegister()
	{
		$model = new RegisterForm();
		if(Yii::app()->request->isPostRequest){
			$model->attributes = Yii::app()->request->getPost('RegisterForm');
			$model->validate();
			if(!$model->hasErrors()){
				if($model->save()) {
					$frlogin=new LoginForm();
					$frlogin->loginByUsernamePass($model->email, $model->password, false);
					if(isset($_POST['ajax'])){
						echo json_encode(array('status'=>true, 'message' => 'Register is successful'));
						Yii::app()->end();
					}else{
						$this->redirect('/');
					}
				}
			}
		}
		$this->render('register/index',array('model'=>$model));
	}
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$user = Yii::app()->facebook->getUser();
		if (!empty($user)){
		    Yii::app()->facebook->destroySession();
		}
		$this->redirect(Yii::app()->homeUrl);
	}
	/**
	 * Facebook
	 */
	public function actionFacebook()
	{
	    if($redirect_url = Yii::app()->request->getParam('redirect_url')){
	        Yii::app()->user->returnUrl = $redirect_url;
	    }
		$user = Yii::app()->facebook->getUser();
		if (!empty($user)){
			$accessToken = Yii::app()->facebook->getAccessToken();
			Yii::app()->facebook->setAccessToken($accessToken);
			$facebookUser = Yii::app()->facebook->getUser();
			$fuser = Yii::app()->facebook->api('/me');
			if(!empty($fuser) && !empty($fuser['email'])){
			    $profile = YumProfile::model()->findByAttributes(array('email'=>$fuser['email'])); 
			    if(!empty($profile) && !empty($profile->user)){
			        $frlogin=new LoginForm();
			        $frlogin->loginWithoutPassword($profile->user->username);
			    }else{
    				$model = new RegisterSocial();
    				$model->firstname = $fuser['first_name'];
    				$model->lastname = $fuser['last_name'];
    				$model->email = $fuser['email'];
    				$model->location = (!empty($fuser['location']['name'])) ? $fuser['location']['name'] : '';
    				$model->password = '123456';
    				$model->type = RegisterSocial::TYPE_FACEBOOK;
    				$model->social_id = $fuser['id'];
    				$model->validate();
    				if(!$model->hasErrors()){
    					$model->save();
    				}
    				$frlogin=new LoginForm();
    				$frlogin->loginByUsernamePass($fuser['email'], $model->password, false);
			    }
				$this->redirect(Yii::app()->user->returnUrl);
			}
		} else {
			$loginUrl = Yii::app()->facebook->getLoginUrl(array('scope' => 'email,read_stream,publish_stream'));
			$this->redirect($loginUrl);
		}
		$this->redirect('/');
	}
	/**
	 * Google OpenID
	 */
	public function actionGoogle()
	{
	    if($redirect_url = Yii::app()->request->getParam('redirect_url')){
	        Yii::app()->user->returnUrl = $redirect_url;
	    }
		Yii::import('backend.extensions.google-api-php-client.src.Google_Client');
		Yii::import('backend.extensions.google-api-php-client.src.contrib.Google_PlusService');
		Yii::import('backend.extensions.google-api-php-client.src.contrib.Google_Oauth2Service');
	
		// Set your cached access token. Remember to replace $_SESSION with a
		// real database or memcached.
		$client = new Google_Client();
		$client->setApplicationName('Plun.Asia');
		// Visit https://code.google.com/apis/console?api=plus to generate your
		// client id, client secret, and to register your redirect uri.
		$client->setClientId(Yii::app()->params->google['clientId']);
		$client->setClientSecret(Yii::app()->params->google['clientSecret']);
		$client->setRedirectUri(Yii::app()->createAbsoluteUrl(Yii::app()->params->google['redirectUri']));
		$client->setDeveloperKey(Yii::app()->params->google['developerKey']);
		$plus = new Google_PlusService($client);
		$oauth2 = new Google_Oauth2Service($client);
	
		if (isset($_GET['code'])) {
			$client->authenticate();
			$_SESSION['token'] = $client->getAccessToken();
			$redirect = Yii::app()->createAbsoluteUrl('//site/google');
			header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
		}
	
		if (isset($_SESSION['token'])) {
			$client->setAccessToken($_SESSION['token']);
		}
	
		if ($client->getAccessToken()) {
			$guser = $oauth2->userinfo->get();
			if(!empty($guser) && !empty($guser['email'])){
			    $profile = YumProfile::model()->findByAttributes(array('email'=>$guser['email']));
			    if(!empty($profile) && !empty($profile->user)){
			        $frlogin=new LoginForm();
			        $frlogin->loginWithoutPassword($profile->user->username);
			    }else{
    				$model = new RegisterSocial();
    				$model->firstname = $guser['family_name'];
    				$model->lastname = $guser['given_name'];
    				$model->email = $guser['email'];
    				$model->location = (!empty($guser['locale'])) ? $guser['locale'] : '';
    				$model->password = '123456';
    				$model->type = RegisterSocial::TYPE_GOOGLE;
    				$model->social_id = $guser['id'];
    				$model->validate();
    				if(!$model->hasErrors()){
    					$model->save();
    				}
    				$frlogin=new LoginForm();
    				$frlogin->loginByUsernamePass($guser['email'], $model->password, false);
			    }
			    
				$this->redirect(Yii::app()->user->returnUrl);
			}
			$this->redirect('/');
			$activities = $plus->activities->listActivities('me', 'public');
			print 'Your Activities: <pre>' . print_r($activities, true) . '</pre>';
	
			// We're not done yet. Remember to update the cached access token.
			// Remember to replace $_SESSION with a real database or memcached.
			$_SESSION['token'] = $client->getAccessToken();
		} else {
			$authUrl = $client->createAuthUrl();
			$this->redirect($authUrl);
		}
	}
	
	public function actionSubscribe(){
		if (Yii::app()->request->isAjaxRequest){
			$post = Yii::app()->request->getPost('Subscribe');
			$model = new Subscribe();
			$model->attributes = $post;
			if(!$model->exists('email = :email', array(':email' => $model->email))){
			
				$model->status = 1;
				$model->created = time();
				$model->validate();
				if(!$model->errors){
					if($model->save()){
						echo json_encode(array('status'=>true, 'message' => 'Your email has been successfully subscribed'));
						Yii::app()->end();
					} else {
						echo json_encode($model->errors);
						Yii::app()->end();
					}
				}
			} else {
				echo json_encode(array('status'=>true, 'message' => 'This email address already exists in our subscription list!'));
				Yii::app()->end();
			}
			
		}
	}

	public function actionSubscribe2(){
		if (Yii::app()->request->isAjaxRequest){
			$post = Yii::app()->request->getPost('Subscribe2');
			$model = new Subscribe();
			$model->attributes = $post;
			if(!$model->exists('email = :email', array(':email' => $model->email))){

				$model->status = 1;
				$model->created = time();
				$model->validate();
				if(!$model->errors){
					if($model->save()){
						echo json_encode(array('status'=>true, 'message' => 'Your email has been successfully subscribed'));
						Yii::app()->end();
					} else {
						echo json_encode($model->errors);
						Yii::app()->end();
					}
				}
			} else {
				echo json_encode(array('status'=>true, 'message' => 'This email address already exists in our subscription list!'));
				Yii::app()->end();
			}

		}
	}

    public function actionRating(){
        if (Yii::app()->request->isAjaxRequest){
            $total_points = Yii::app()->request->getPost('total_points');
            $id = Yii::app()->request->getPost('id');
            $model = Article::model()->findByPk($id);

            if($model){
                //print_r($model);
                $model->rating_number=$model->rating_number+1;
                $model->total_points=$model->total_points+$total_points;
                $model->validate();
                if(!$model->errors){
                    if($model->save()){
                        echo json_encode(array('status'=>'ok', 'message' => 'This rating has been saved'));
                        Yii::app()->end();
                    } else {
                        echo json_encode($model->errors);
                        Yii::app()->end();
                    }
                }else{
                    print_r($model->errors);
                }
            } else {
                echo json_encode(array('status'=>true, 'message' => 'This rating has not been saved!'));
                Yii::app()->end();
            }
        }
    }

    public function actionFaq(){
        $this->render('faq');
    }
	
}