<?php	
class ProductController extends MemberController
{
	public $limit = 2;
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionExcute($type)
	{
		$artID = Yii::app()->request->getPost('artID');
		$user = Yii::app()->user->data();
		if(!empty($type) && !empty($artID) && !Yii::app()->user->isGuest){
			$user_id = $user->id;
			$upro = UserProduct::model()->findByAttributes(array('user_id'=>$user_id, 'article_id'=>$artID));
			$article = Article::model()->findByPk($artID);
			if(empty($upro)){
				$upro = new UserProduct();
				$upro->article_id = $artID;
				$upro->user_id = $user_id;
			}
			$upro->created = time();
			switch (trim(strtolower($type))) {
				case 'like':
					if($upro->like == 1){
						$article->like --;
						$upro->like = 0;
					} else {
						$article->like ++;
						$upro->like = 1;
					}
					$upro->hate = 0;
					$upro->bought = 0;
					$upro->save();
					$msg = array('msg'=> (!empty($upro->like)) ? 'UnLike it' : 'Like it', 'like' => $article->like, 'active' => (!empty($upro->like)) ? 'active' : 'unactive');
					break;
				case 'hate':
					$upro->hate = ($upro->hate == 1) ? 0 : 1;
					$upro->like = 0;
					$upro->bought = 0;
					$upro->save();
					$msg = array('msg'=> (!empty($upro->hate)) ? 'UnHate it' : 'Hate it', 'like' => $article->like, 'active' => (!empty($upro->hate)) ? 'active' : 'unactive');
					break;
				case 'bought':
					/* if($upro->like == 1){
						if($article->like > 0){
							$article->like --;
						}
					} */
					$upro->bought = ($upro->bought == 1) ? 0 : 1;
					$upro->hate = 0;
					$upro->like = 0;
					$upro->save();
					$msg = array('msg'=> (!empty($upro->bought)) ? 'UnBought it' : 'Bought it', 'like' => $article->like, 'active' => (!empty($upro->bought)) ? 'active' : 'unactive');
					break;
			}
			//$upro->validate();
			if($upro->save()){
				$article->save();
				$params = array('{user}' => $user->username, '{product}' => $artID);
				$activity = Activity::model()->findByAttributes(array('params'=>json_encode($params)));
				if(empty($activity->id)){
					$log = Activity::log(Activity::LOG_LIKE_DISLIKE_BOUGHT, $params, $user->id, $user->username, null);
				}
					$fuser = Yii::app()->facebook->getUser();
					if (!empty($fuser)){
						try {
    							$params = array();
    							$title = !(empty($upro->article->product->product_name)) ? $upro->article->product->product_name :  $upro->article->title;
    							$link = Yii::app()->createAbsoluteUrl('/article/view', array(
    									'section' => !empty($upro->article->sections['0']->slug) ? $upro->article->sections['0']->slug : '',
    									'slug' => !empty($upro->article->slug) ? $upro->article->slug : '',
    									'id' => $upro->article->id)
    							);
    							$articleTrans = ArticleTranslation::model()->findByAttributes(array('article_id'=>$upro->article->id, 'language_code'=>VLang::LANG_EN));
    							if(!empty($articleTrans)){
        							$params['{you}'] = Lang::t('' ,'I');//$user->getDisplayName();
        							$params['{product}'] = $articleTrans->title;
        							$params['{status}'] = Lang::t('' ,'liked');
        							if($upro->like == 1){
        								$params['{status}'] = Lang::t('' ,'liked');
        							}elseif($upro->hate == 1){
        								$params['{status}'] = Lang::t('' ,'disliked');
        							}elseif($upro->bought == 1){
        								$params['{status}'] = Lang::t('' ,'bought');
        							}
        							$attachment = array(
        								'message' => Lang::t('product' ,'{you} {status} {product}', $params),
        								'name' => Yii::app()->name,
        								'link' => $link,
        								'description' => Util::partString(Util::stripOutHTML($articleTrans->description), 0, 200),
        								'picture' => Yii::app()->createAbsoluteUrl($upro->article->getImageThumb()),
//     								    'caption' => Util::partString($upro->article->description, 0, 200),
//     								    'actions' => array(array('name' => 'Get Search',     'link' => 'http://www.google.com'))
        							);
        							$result = Yii::app()->facebook->api('/me/feed/','POST',$attachment);
    							}
						} catch(FacebookApiException $e) {
					
						}
					}
			}
			echo json_encode($msg);
		}
		return false;
	}
	
	public function actionGarage()
	{
		$bought_section_reject = array("6");
		$bought_category_reject = array("5", "6", "15");
		
		$cs = Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/resources/js/product/garage.js', CClientScript::POS_BEGIN);
		$cri = new CDbCriteria();
		$cri->alias = "sys_user_product";
		$cri->join = "LEFT JOIN cms_article_section ON cms_article_section.article_id = sys_user_product.article_id
					  LEFT JOIN cms_article_category ON cms_article_category.article_id = sys_user_product.article_id";
		$cri->condition = "`bought` = :bought AND user_id = :user_id";
		$cri->params = array(':user_id'=>$this->user->id , ':bought'=>1);
		$cri->addNotInCondition("cms_article_section.section_id", $bought_section_reject);
		$cri->addNotInCondition("cms_article_category.category_id", $bought_category_reject);
		$cri->order = "created DESC";
		
		/**
		 * Pagination
		 */
		$current_page = Yii::app()->request->getParam('page', 1);
		$total = UserProduct::model()->count($cri);
		$pages = new CPagination($total);
		$pages->pageSize = 16;
		$pages->setCurrentPage($current_page - 1);
		$pages->applyLimit($cri);
		
		$products = UserProduct::model()->findAll($cri);
		$next_page = ($total > $pages->pageSize * $current_page) ? $current_page + 1 : 0 ;
		
		if(Yii::app()->request->isAjaxRequest){
			if(count($products) > 0 ){
				$this->renderPartial('partial/garage', array(
							'products'=>$products, 
							'pages' => $pages,
							'next_page' => $next_page,
				));
			}
			Yii::app()->end();
		}else{
			$this->render('page/garage', array(
						'products'=>$products, 
						'pages' => $pages,
						'next_page' => $next_page,
			));
		}
	}
	
	public function actionGarageupdate(){
		$user = Yii::app()->user->data();
		if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest){
			$art = Yii::app()->request->getPost('art');
			$pro = Yii::app()->request->getPost('pro');
			$stt = Yii::app()->request->getPost('stt');
			if($stt=='del'){
				$product = UserProduct::model()->findByAttributes(array('user_id'=>$user->id, 'article_id'=>$art));
				if($product){
					$product->like = 0;
					$product->save();
				}
				
			}
		}
	}
	
}