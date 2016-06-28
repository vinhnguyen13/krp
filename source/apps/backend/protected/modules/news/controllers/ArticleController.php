<?php

class ArticleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'article'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->layout='//layouts/column1';
		$model=	new Article();
		$model->public_time = time();
		$model->author_name = Yii::app()->user->data()->username;
		
		if(isset($_POST['Article']))
		{
			$model->attributes = $_POST['Article'];
			$model->tmp_sections = isset($_POST['Article']['sections']) ? $_POST['Article']['sections'] : array();
			$model->tmp_categories = isset($_POST['Article']['categories']) ? $_POST['Article']['categories'] : array();
			$model->created = time();
			$model->last_modify = time();
			$model->creator = Yii::app()->user->getId();
			$model->public_time = strtotime($_POST['Article']['public_time']); 
           	$model->setTags($_POST['tags']);
			$model->validate();
			if($model->save()){
				/**
				 * save traslate default
				 */
				$languageDefault = Language::model()->find("is_default = 1");
				$articleTrans = ArticleTranslation::model()->findByAttributes(array('article_id'=>$model->id, 'language_code'=>$languageDefault->code));
				if(empty($articleTrans)){
					$articleTrans = new ArticleTranslation();
				}
				$articleTrans->article_id = $model->id;
				$articleTrans->language_code = $languageDefault->code;
				$articleTrans->attributes = $model->attributes;
				$articleTrans->validate();
				if(!$articleTrans->hasErrors()){
					$articleTrans->save();
				}
				/**
				 * save traslate
				 */
				if(isset($_POST['ArticleTranslation']))
				{
					foreach ($_POST['ArticleTranslation'] as $lang => $article){
						$articleTrans = ArticleTranslation::model()->findByAttributes(array('article_id'=>$model->id, 'language_code'=>$lang));
						if(empty($articleTrans)){
							$articleTrans = new ArticleTranslation();
						}
						$articleTrans->article_id = $model->id;
						$articleTrans->language_code = $lang;
						$articleTrans->attributes = $article;
						$articleTrans->validate();
						if(!$articleTrans->hasErrors()){
							$articleTrans->save();
						}
					}
						
				}
				$this->redirect(array('admin'));
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->layout='//layouts/column1';
		$model =	$this->loadModel($id);
		
		if(isset($_POST['Article']))
		{
			$model->attributes=	$_POST['Article'];
			$model->featured = $_POST['Article']['featured'];
			$model->tmp_sections = isset($_POST['Article']['sections']) ? $_POST['Article']['sections'] : array();
			$model->tmp_categories = isset($_POST['Article']['categories']) ? $_POST['Article']['categories'] : array();
			$model->last_modify = time();
			//$model->creator = Yii::app()->user->getId();
			$model->public_time = strtotime($_POST['Article']['public_time']); 
			$model->setTags($_POST['tags']);
			
			$model->validate();
			if($model->save()){
				/**
				 * save traslate default
				 */
				$languageDefault = Language::model()->find("is_default = 1");
				$articleTrans = ArticleTranslation::model()->findByAttributes(array('article_id'=>$model->id, 'language_code'=>$languageDefault->code));
				if(empty($articleTrans)){
					$articleTrans = new ArticleTranslation();
				}
				$articleTrans->article_id = $model->id;
				$articleTrans->language_code = $languageDefault->code;
				$articleTrans->attributes = $model->attributes;
				$articleTrans->validate();
				if(!$articleTrans->hasErrors()){
					$articleTrans->save();
				}
				/**
				 * save traslate
				 */
				if(isset($_POST['ArticleTranslation']))
				{
					foreach ($_POST['ArticleTranslation'] as $lang => $article){
						$articleTrans = ArticleTranslation::model()->findByAttributes(array('article_id'=>$model->id, 'language_code'=>$lang));
						if(empty($articleTrans)){
							$articleTrans = new ArticleTranslation();
						}
						$articleTrans->article_id = $model->id;
						$articleTrans->language_code = $lang;
						$articleTrans->attributes = $article;
						$articleTrans->validate();
						if(!$articleTrans->hasErrors()){
							$articleTrans->save();
						}
					}
						
				}
				$this->redirect(array('admin'));
			}
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		
		if(Yii::app()->request->isPostRequest)
		{
			$model = $this->loadModel($id);
			$model->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
				
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Article');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Article('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Article']))
			$model->attributes=$_GET['Article'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Article::model()->loadFullArticle($id);
		
		if(empty($model->public_time))
			$model->public_time = time();
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='article-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionTags(){
        $tags = Article::model()->getAllTags();
        $tmp = array();
        if ($tags){
            foreach ($tags as $t)
            {
                $tmp[] = $t;
            }
        }
        echo implode("\n", $tmp);
        Yii::app()->end();
	}
	
	public function actionGetEvents()
	{
		//{ "date": "1337594400000", "type": "meeting", "title": "Project A meeting", "description": "Lorem Ipsum dolor set", "url": "http://www.event1.com/" },
		$return[] = array(
				'date'=>'1358395228000',
				'type'=>'meeting',
				'title'=>'1 Project A meeting',
				'description'=>'Lorem Ipsum dolor set',
				'url'=>'http://www.event1.com/',
		);
		$return[] = array(
				'date'=>'1358568048000',
				'type'=>'meeting',
				'title'=>'2 Project A meeting',
				'description'=>'Lorem Ipsum dolor set',
				'url'=>'http://www.event1.com/',
		);
		$return[] = array(
				'date'=>'1358740861000',
				'type'=>'meeting',
				'title'=>'3 Project A meeting',
				'description'=>'Lorem Ipsum dolor set',
				'url'=>'http://www.event1.com/',
		);
		echo CJSON::encode($return);
	}
	
	private function getThumbnailPath() {
		return Yii::app()->basePath.'/../../../../'.Yii::app()->params->news['thumbnail_path'];
	}
	
	public function actionLoadFiles($folder) {
		$list = Article::loadFiles(Yii::getPathOfAlias('pathroot'). DS . 'themes' . DS . $folder . DS . 'views/layouts' . DS , array());
		echo CJSON::encode($list);
		exit();
	}
	public function actionLoadCategories($id) {
		$list = Category::model()->getCategories($id);
		$result = array();
		foreach($list as $item) {
			$result[$item->id] = $item->title;
		}
		echo CJSON::encode($result);
		exit();
	}
	
	public function actionProducts() {
		$models = ProProducts::model()->findAll();
		$arr = array();
		foreach($models as $model) {
			$arr[] = array(
					'label'=>$model->title,  // label for dropdown list
					'value'=>$model->title,  // value for input field
					'id'=>$model->id,            // return value from autocomplete
			);
		}
		echo CJSON::encode($arr);
		Yii::app()->end();
	}
	
	public function actionBrands() {
		$lid = Yii::app()->request->getParam('lid');
		$cri = new CDbCriteria();
		$cri->addCondition("company_id IN(SELECT id FROM `pro_companies` WHERE city_id = :city)");
		$cri->params = array(':city'=>$lid);
		$models = ProBrands::model()->findAll($cri);
		$data = CHtml::listData( $models, 'id', 'title');
		$location = ProLocation::model()->findByPk($lid);
		if(!empty($data)){
			echo '<div class="listBrand_'.$lid.'">'.CHtml::dropDownList(null, null, $data, array('id'=>"brand_$lid", 'class'=>'lstBrand', 'data-location'=>$lid, 'empty' => '-- Select Brand --')).'</div>';
		}
		Yii::app()->end();
	}
	
	public function actionShops() {
		$bid = Yii::app()->request->getParam('bid');
		$lid = Yii::app()->request->getParam('lid');
		$cri = new CDbCriteria();
		$cri->addCondition("brand_id = :brand");
		$cri->params = array(':brand'=>$bid);
		$models = ProShops::model()->findAll($cri);
		$data = CHtml::listData( $models, 'id', 'title');
		$location = ProLocation::model()->findByPk($lid);
		if(!empty($data)){
			echo '<div class="location_'.$lid.' brand_'.$bid.'"><h4>'.$location->city_name.'</h4><ul>'.CHtml::checkBoxList('shop_id', array(), $data, array('class'=>'CBShop', 'template' => '<li>{label} {input}</li>', 'separator'=>false, 'container'=>false)).'</ul></div>';
		}
		Yii::app()->end();
	}
	
	public function actionGalleries() {
	    $term = Yii::app()->request->getParam('term');
	    $cri = new CDbCriteria();
	    $cri->addCondition("name LIKE :term");
	    $cri->params = array(':term'=> "%$term%");
	    $cri->limit = 20;
		$models = Gallery::model()->findAll($cri);
		$arr = array();
		foreach($models as $model) {
			$arr[] = array(
					'label'=>$model->name,  // label for dropdown list
					'value'=>$model->name,  // value for input field
					'id'=>$model->id,            // return value from autocomplete
			);
		}
		echo CJSON::encode($arr);
		Yii::app()->end();
	}
	
	public function actionUsers() {
	    $term = Yii::app()->request->getParam('term');
	    $cri = new CDbCriteria();
	    $cri->addCondition("username LIKE :term");
	    $cri->params = array(':term'=> "%$term%");
	    $cri->limit = 10;
		$models = Member::model()->findAll($cri);
		$arr = array();
		foreach($models as $model) {
			$arr[] = array(
					'label'=>$model->username,  // label for dropdown list
					'value'=>$model->username,  // value for input field
					'id'=>$model->id,            // return value from autocomplete
			);
		}
		echo CJSON::encode($arr);
		Yii::app()->end();
	}
	
/**
	 * Upload File Controller
	 * Nam Le
	 */
	public function actionUpload($id = null){ 
		if(Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest){
			
			$id = isset($id) ? $id : 0;
			/*if($id > 0){
				$model = $this->loadModel($id);
				if(count($model->images) == 4){
					$result = array('error' => 'Too many items would be uploaded.  Item limit is 4.')	;	
					$result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
					echo $result;
					Yii::app()->end();
				}
			}*/
			$params 	= CParams::load();
			$thumb300x0 = $params->params->uploads->article->thumb300x0;
			$detail960x0 = $params->params->uploads->article->detail960x0;
			$origin 	= $params->params->uploads->article->origin;
			
			$thumb300x0_folder = $this->setPath ( $thumb300x0->p );
			$detail960x0_folder = $this->setPath ( $detail960x0->p );
			$origin_folder = $this->setPath ( $origin->p );
			$path_folder = $this->setPath ( $params->params->uploads->article->path, false );
			
			
			
			Yii::import("backend.extensions.EFineUploader.qqFileUploader");
			$uploader = new qqFileUploader();
			$uploader->allowedExtensions = array('jpg','jpeg','png');
			$uploader->sizeLimit = $params->params->uploads->article->size;//maximum file size in bytes
			$uploader->chunksFolder = $origin_folder;
			
			$result = $uploader->handleUpload($origin_folder);
			$origin_uploaded_path = $origin_folder . DS . $uploader->getUploadName ();
			$resize_large_img = false;
			list ( $width, $height ) = getimagesize ( $origin_uploaded_path );
			
			
			if ($width < $thumb300x0->w || $height < $thumb300x0->h) {
				$result ['success'] = false;
				$result ['error'] = "Please choose a image file with minimum weight size is {$thumb300x0->w}px and minimum height size is{$thumb300x0->h}px";
			} else {
				
				Yii::import("backend.extensions.image.Image");
				
				if ($width > $height) {
					$resize_type = Image::HEIGHT;
				} else {
					$resize_type = Image::WIDTH;
				}
				
				if (isset ( $result ['success'] )) {
						
					// begin resize and crop for thumbnail
					//Yii::app()->image->load($origin_uploaded_path)->resize($thumb300x0->w, $thumb300x0->h, $resize_type)->crop ( $thumb300x0->w, $thumb300x0->h )->save($thumb300x0_folder.DS.$uploader->getUploadName());
					Yii::app()->image->load($origin_uploaded_path)->resize($thumb300x0->w, $thumb300x0->h)->crop ( $thumb300x0->w, $thumb300x0->h )->save($thumb300x0_folder.DS.$uploader->getUploadName());
					
						
					// resize for detail (width 600)
					Yii::app ()->image->load ( $origin_uploaded_path )->resize ( $detail960x0->w, $detail960x0->w, Image::WIDTH )->save ( $detail960x0_folder . DS . $uploader->getUploadName () );
						
					
					//save to database
					$image = new ArticleImage();
					$image->article_id = $id;
					$image->image = $uploader->getUploadName();
					$image->path = $path_folder;
					$image->save();
					$result['image_id'] = $image->id;
					
				}
			}
			
			
			
			$result['filename'] = $uploader->getUploadName();
			$result['filepath'] = $path_folder;
			header("Content-Type: text/plain");
			$result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
			echo $result;
			Yii::app()->end();
		}
		
	}
	
	private function setPath($path, $full = true) {
		if (isset ( $path )) {
			$path = str_replace ( '{year}', date ( 'Y' ), $path );
			$path = str_replace ( '{month}', date ( 'm' ), $path );
			$path = str_replace ( '{day}', date ( 'd' ), $path );
			
			$folder = ($full) ? Yii::app()->params['upload_path'] . DS . $path : $path;
			if (VHelper::checkDir ( $folder )) {
				return $folder;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
}
