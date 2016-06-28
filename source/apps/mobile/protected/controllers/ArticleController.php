<?php	
class ArticleController extends Controller
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
		);
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionView($section, $slug, $id, $page = null)
	{
		Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/resources/js/article/view.js', CClientScript::POS_BEGIN);
		$article = new Article();
		$view = $article->loadFullArticle($id);
		
		$this->pageTitle = $view->title . '- Kelreport.com';
		$tags = null;
		if(isset($view->tags)){
			foreach ($view->tags as $tag){
				$tags .= $tag->name . ', ';
			}
			
		}
		$thumbnail = Yii::app()->createAbsoluteUrl($view->thumbnail);
		Yii::app()->clientScript->registerMetaTag($view->description, 'description');
		Yii::app()->clientScript->registerMetaTag($tags, 'keywords');
		Yii::app()->clientScript->registerMetaTag($thumbnail, null, null, array('property' => 'og:image'));
	
	
		$view->views++;
		$view->save();
		
		
		$comment = new Comment();
		$comment = $comment->getArticleComments($page, Comment::TYPE_COMMENT_ARTICLE, $id);
		
		$layout = (empty($view->layout)) ? 1 : $view->layout;
		
		$this->render('view', array('view'=>$view, 'comment' => $comment, 'layout' => $layout));
	}
	
	public function actionMail(){
		$model = new MailForm();
		
		if(isset($_POST['MailForm']))
		{
			$model->attributes=$_POST['MailForm'];
			$model->validate();
			if (!$model->errors) {
				$url = $_POST['MailForm']['url'];
				//$title = $_POST['MailForm']['title'];
				$body = Yii::app()->controller->renderPartial(
						'//layouts/email/'.Yii::app()->language.'/share',
						array(
								'url' => $url, 
								'name' => $model->name,
								'to' => $model->to,
								'message' => $model->message
						), true);
				//$sent = Mailer::send ( $to,  $subject, $body);
				if (Mailer::send ( $model->to,  $model->subject, $body)){
					echo json_encode(array('status' => true));
				} else {
					echo json_encode(array('status' => fasle, 'error' => "Can't send email"));
				}
			} else {
				echo json_encode(array('status' => false, 'error' => $model->errors));
			}
		}
		//$this->render('mail',array('model'=>$model));
		
	}
	
	public function actionSection($section, $page = null, $sort = null)
	{
		$currentPage = (!empty($page) && $page > 0) ? $page - 1 : 0;
		$sort = (isset($sort)) ? $sort : 'current';
		$section = Section::model()->findByAttributes(array('slug' => $section ));
		if(!empty($section)){
			$data = Article::model()->getListArticlesBySection($section->id, $currentPage, $sort);
			$data['section'] = $section;
			$data['sort'] = $sort;
			$this->render('section', $data);
		}
    }
	public function actionCategory($section = null, $category, $page = null, $sort = null)
    {
    	$currentPage = (!empty($page) && $page > 0) ? $page - 1 : 0;
		$sort = (isset($sort)) ? $sort : 'current';
		//$category = Yii::app()->request->getParam("category");
		if(!empty($category) && !empty($section)){
			$category = Category::model()->findByAttributes(array('slug' => $category));
			$section = Section::model()->findByAttributes(array('slug' => $section));
			$data = Article::model()->getListArticlesByCategory($category->id, $currentPage, $sort);
			$data['category'] = $category;
			$data['section'] = $section;
			$data['sort'] = $sort;
			$this->render('category', $data);
		}
		
        
    }
	
	public function actionEditor($page = 0, $sort = null)
    {
    	$currentPage = (!empty($page) && $page > 0) ? $page - 1 : 0;
		$tag = 'editor';
		$sort = (isset($sort)) ? $sort : 'current';
		$data = Article::model()->getListArticlesByTags($tag, $currentPage, $sort);
		$data['tag'] = $tag;
		$data['sort'] = $sort;
		$this->render('tag', $data);
    }
    
    public function actionTag($tag, $page = 0)
    {
        $currentPage = (!empty($page) && $page > 0) ? $page - 1 : 0;
		$category = Category::model()->findByAttributes(array('slug' => $category));
		$data = Article::model()->getListArticlesByTags($tag, $currentPage);
		$data['tag'] = $tag;
		$this->render('tag', $data);
    }
    
    public function actionPickTo(){
    	$user = Yii::app()->user->data();
    	if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest){
    		$artID = Yii::app()->request->getPost('artID');
    		if(!empty($artID) && !empty($user->id)){
    			$pick = Pickto::model()->findByAttributes(array('user_id'=>$user->id, 'article_id'=>$artID));
    			if(empty($pick)){
    				$pick = new Pickto();
    				$pick->status = Pickto::STATUS_PICK;
    				$pick->user_id = $user->id;
    				$pick->article_id = $artID;
    				$pick->created = time();
    			}else{
    				$pick->status = ($pick->status == Pickto::STATUS_PICK ) ? Pickto::STATUS_UNPICK : Pickto::STATUS_PICK;
    			}
    			if($pick->save()){
    				$params = array('{user}' => $user->username, '{article}' => $artID);
    				$log = Activity::model()->findByAttributes(array('params'=>json_encode($params)));
    				if(empty($log)){
			    		$log = Activity::log(Activity::LOG_PICK_TO, $params, $user->id, $user->username, null);
    				}
			    	echo json_encode(array('status'=>$pick->status));
    			}
	    		Yii::app()->end();
    		}
    	}
    	return false;
    }
    
	public function actionComment() {
    	if (isset($_POST['Comment'])) {
    		if(isset(Yii::app()->user->id)){
    			$model = new Comment();
	    		$model->attributes = $_POST['Comment'];
	    		$model->created_date = time();
	    		$model->created_by = Yii::app()->user->id;
	    		$model->approved = 1;
	    		$model->type_id = Comment::TYPE_COMMENT_ARTICLE;
	    		if($model->save()){
	    			$data = array(
	    				'url' => $model->author->getUserUrl(),
	    				'avt' => $model->author->getAvatar(),
	    				'name' => $model->author->getDisplayName(),
	    				'model' => $model,
	    				
	    			);
	    			$this->renderPartial("partial/comment-item", $data);
	    			$fuser = Yii::app()->facebook->getUser();
    			    $upro = UserProduct::model()->findByAttributes(array('user_id'=>Yii::app()->user->id, 'article_id'=>$model->item_id));
    			    $user = Yii::app()->user->data();
    			    if(!empty($user->profile_settings) && !empty($user->profile_settings->share_facebook)){
    	    			if (!empty($fuser) && !empty($upro)){
    	    			    $title = !(empty($upro->article->product->product_name)) ? $upro->article->product->product_name :  $upro->article->title;
    	    			    $link = Yii::app()->createAbsoluteUrl('/article/view', array(
    	    			            'section' => !empty($upro->article->sections['0']->slug) ? $upro->article->sections['0']->slug : '',
    	    			            'slug' => !empty($upro->article->slug) ? $upro->article->slug : '',
    	    			            'id' => $upro->article->id)
    	    			    );
    	    			    $params['{message}'] = $model->content;
    	    			    $attachment = array(
    	    			            'message' => Yum::t('{message}', $params),
    	    			            'name' => 'Kelreport',
    	    			            'caption' => "Fashion for you",
    	    			            'link' => $link,
    	    			            'description' => $title,
    	    			            // 								'picture' => Yii::app()->createAbsoluteUrl('/themes/kel/resources/html/css/images/logo.png'),
    	    			    // 								'actions' => array(array('name' => 'Get Search',     'link' => 'http://www.google.com'))
    	    			    );
    	    			    $result = Yii::app()->facebook->api('/me/feed/','POST',$attachment);
    	    			}
	    			}
	    		}
    		} else {
    			
    		}
    	}		
    	Yii::app()->end();
    }
    
    
	public function actionSearch($keyword = null,$page = 0){
		$currentPage = (!empty($page) && $page > 0) ? $page - 1 : 0;
		if(isset($keyword)){
			$data = Article::model()->getSearchArticles($keyword, $currentPage);
			$this->render('search', $data);
			
		
		}
	}
	
	public function actionMoreComment($id, $page = null){
		if(Yii::app()->request->isAjaxRequest){
			if(isset($id)){
				$comment = new Comment();
				$comment = $comment->getArticleComments($page, Comment::TYPE_COMMENT_ARTICLE, $id);
				if(isset($comment)){
					$this->renderPartial('partial/ajax-comment-item',$comment);
					
				}
				
				
			}
			
			
			/* if(count($hotboxs) > 0 ){
				$this->renderPartial('partial/index_ajax',array(
						'hotboxs' => $hotboxs,
						'pages' => $pages,
						'total_hotboxs' => $total,
						'next_page' => $next_page,
				));
			} else {
				echo 'end';
				Yii::app()->end();
			} */
		}
		
	}
}