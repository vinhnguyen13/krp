<?php

/**
 * This is the model class for table "cms_article".
 *
 * The followings are the available columns in table 'cms_article':
 * @property integer $id
 * @property integer $type
 * @property string $title
 * @property string $description
 * @property string $body
 * @property string $thumbnail
 * @property string $thumbnail2
 * @property integer $created
 * @property integer $creator
 * @property integer $last_modify
 * @property integer $ispublic
 * @property integer $public_time
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $html_title
 * @property integer $featured
 * @property integer $comment
 * @property integer $like
 * @property string $extra_description
 * @property string $res_city
 * @property string $res_district
 * @property string $res_setting
 * @property string $res_rating
 * @property string $res_cuisine
 * @property string $res_open_hour
 * @property string $res_closed_hour
 * @property string $res_dress_code
 * @property string $res_private_room
 * @property string $res_car_park
 * @property string $res_smoking_area
 * @property string $res_price
 */
class Article extends CActiveRecord
{
	public $type = 1;
	public $ispublic = 0;
	public $tmp_categories;
	public $tmp_sections;
	public $tmp_images;
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sections', 'checkSection'),
			array(' type, created, creator, last_modify, ispublic, layout, comment, like', 'numerical', 'integerOnly'=>true),
			//array('res_smoking_area,res_car_park,res_private_room,res_rating,res_price,res_dress_code,res_closed_hour,res_open_hour,res_cuisine,res_setting,res_disctrict,res_city,title, meta_description, meta_keywords, html_title, author_name,', 'length', 'max'=>500),
            array('title, meta_description, meta_keywords, html_title, author_name,', 'length', 'max'=>500),
			array('type, title, description, body, public_time, ispublic, author_name', 'required'),
			array('thumbnail', 'length', 'max'=>255),
			array('description,extra_description, body, slug, related, related_id, views, comment, like, thumbnail_slide', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('res_city,res_district,res_setting,res_cuisine,res_rating,res_open_hour,res_closed_hour,res_dress_code,res_private_room,res_car_park,res_smoking_area,res_price,res_address,res_hotline,res_year,res_website,id, type, title, slug, description,extra_description, body, thumbnail, thumbnail2, created, creator, last_modify, ispublic, public_time, meta_description, meta_keywords, html_title, author_name, views, layout, featured, comment, like, thumbnail_slide', 'safe', 'on'=>'search'),

		);
	}
	
	public function checkSection(){
		if(!empty($_POST['Article']) && empty($_POST['Article']['sections'])){
			$this->addError('sections', 'Please select a sections');
		}
	}
	
	public function beforeSave() {
        //print_r($_POST['Article']); die();
		if(empty($this->html_title))
			$this->html_title = $this->title;
		
		if(empty($this->meta_description))
			$this->meta_description = $this->description;

        if(isset($_POST['Article']['res_setting']) && count($_POST['Article']['res_setting']>0)){
            $this->res_setting= implode(",",$_POST['Article']['res_setting']);
        }

        if(isset($_POST['Article']['res_cuisine']) && count($_POST['Article']['res_cuisine']>0)){
            $this->res_cuisine= implode(",",$_POST['Article']['res_cuisine']);
        }

        if(isset($_POST['Article']['res_city'])){
            $this->res_city= $_POST['Article']['res_city'];
        }

        if(isset($_POST['Article']['res_district'])){
            $this->res_district= $_POST['Article']['res_district'];
        }

        if(isset($_POST['Article']['res_address'])){
            $this->res_address= $_POST['Article']['res_address'];
        }

        if(isset($_POST['Article']['res_hotline'])){
            $this->res_hotline= $_POST['Article']['res_hotline'];
        }

        if(isset($_POST['Article']['res_year'])){
            $this->res_year= $_POST['Article']['res_year'];
        }

        if(isset($_POST['Article']['res_website'])){
            $this->res_website= $_POST['Article']['res_website'];
        }

        if(isset($_POST['Article']['res_open_hour'])){
            $this->res_open_hour= $_POST['Article']['res_open_hour'];
        }

        if(isset($_POST['Article']['res_closed_hour'])){
            $this->res_closed_hour= $_POST['Article']['res_closed_hour'];
        }

        if(isset($_POST['Article']['res_dress_code'])){
            $this->res_dress_code= $_POST['Article']['res_dress_code'];
        }

        if(isset($_POST['Article']['res_private_room'])){
            $this->res_private_room= $_POST['Article']['res_private_room'];
        }

        if(isset($_POST['Article']['res_car_park'])){
            $this->res_car_park= $_POST['Article']['res_car_park'];
        }

        if(isset($_POST['Article']['res_smoking_area'])){
            $this->res_smoking_area= $_POST['Article']['res_smoking_area'];
        }

        if(isset($_POST['Article']['res_price'])){
            $this->res_price= $_POST['Article']['res_price'];
        }

        if(isset($_POST['Article']['res_rating'])){
            $this->res_rating= $_POST['Article']['res_rating'];
        }

		return parent::beforeSave();
	}
	
	public function afterSave() {
		if (!$this->isNewRecord) {
			if(isset($this->tmp_categories) && $this->tmp_categories != $this->categories)
				ArticleCategory::model()->deleteAllByAttributes(array('article_id' => $this->id));
			if(isset($this->tmp_sections) && $this->tmp_sections != $this->sections) 	
				ArticleSection::model()->deleteAllByAttributes(array('article_id' => $this->id));
		}
		if(isset($this->tmp_categories) && count($this->tmp_categories) > 0) {
			foreach ($this->tmp_categories as $category_id)
			{
				if(!empty($category_id)) {
				    $articleCategory = new ArticleCategory();
				    $articleCategory->category_id = $category_id;
				    $articleCategory->article_id = $this->id;
				    $articleCategory->save();
				}
			}
		}
		
		if(isset($this->tmp_sections) && count($this->tmp_sections) > 0)	
			foreach ($this->tmp_sections as $section_id)
			{
				if(!empty($section_id)) {
				    $articleSection = ArticleSection::model()->findByAttributes(array('section_id'=>$section_id, 'article_id'=>$this->id));
				    if(empty($articleSection)){
    				    $articleSection = new ArticleSection();
				    }
				    $articleSection->section_id = $section_id;
				    $articleSection->article_id = $this->id;
				    $articleSection->save();
				}
			}
		/**
		 * Product
		 */
		if(!empty($_POST['product_name'])){
			$articleProduct = ArticleProduct::model()->findByAttributes(array('article_id'=>$this->id));
			if(empty($articleProduct->article_id)){
				$articleProduct = new ArticleProduct();
				$articleProduct->article_id = $this->id;
			}
			$articleProduct->product_name = $_POST['product_name'];
			$articleProduct->product_price = $_POST['product_price'];
			$articleProduct->validate();
			$articleProduct->save();
			
		}
		/**
		 * gallery
		 */
		if(!empty($_POST['gallery_id'])){
			$articleProduct = ArticleGallery::model()->findByAttributes(array('article_id'=>$this->id));
			if(empty($articleProduct->article_id)){
				$articleProduct = new ArticleGallery();
				$articleProduct->article_id = $this->id;
			}
			$articleProduct->gallery_id = $_POST['gallery_id'];
			$articleProduct->validate();
			$articleProduct->save();
			
		}

		/**
		 * Save Shop
		 */
		if(!empty($_POST['shop_id']) && is_array($_POST['shop_id'])){
			foreach ($_POST['shop_id'] as $id){
				$articleShop = ArticleShop::model()->findByAttributes(array('article_id'=>$this->id, 'shop_id'=>$id));
				if(empty($articleShop->article_id)){
					$articleShop = new ArticleShop();
					$articleShop->article_id = $this->id;
					$articleShop->shop_id = $id;
					$articleShop->save();
				}
			}
		}else{
			if(!empty($_POST['Article[title]'])){
				ArticleShop::model()->deleteAllByAttributes(array('article_id'=>$this->id));
			}
		}
		
		if(isset($this->tmp_images) && count($this->tmp_images) > 0 && $this->tmp_images != ""){
			foreach ($this->tmp_images as $image_id)
			{
				if(!empty($image_id)) {
					$model = ArticleImage::model()->findByAttributes(array('id' => $image_id));
					$model->article_id = $this->id;
					$model->update(); 
				}
			}
		}
		
		return parent::afterSave();
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'author' 				=> array(self::BELONGS_TO, 'YumUser', 'creator'),
			'user' 					=> array(self::BELONGS_TO, 'Member', 'creator'),
			'categories' 			=> array(self::MANY_MANY, 'Category', 'cms_article_category(article_id, category_id)'),
			'sections' 				=> array(self::MANY_MANY, 'Section', 'cms_article_section(article_id, section_id)'),
			'tags' 					=> array(self::MANY_MANY, 'Tag', 'cms_article_tag(article_id, tag_id)'),
			'comments' 				=> array(self::HAS_MANY, 'Comment', 'item_id'),
			'comments_count' 		=> array(self::STAT, 'Comment', 'item_id'),
			'galleries' 			=> array(self::MANY_MANY, 'Gallery', 'cms_article_gallery(article_id, gallery_id)'),
			'product' 				=> array(self::BELONGS_TO, 'ArticleProduct', 'id'),
			'shops' 				=> array(self::MANY_MANY, 'ProShops', 'cms_article_shop(article_id, shop_id)'),
			'images' 				=> array(self::HAS_MANY, 'ArticleImage', 'article_id', 'order' => '`sort` asc'),
		);
	}

	public function behaviors(){
		return array(
			'SlugBehavior' => array(
				'class' => 'backend.components.SlugBehavior',
				'slug_col' => 'slug',
				'title_col' => 'title',
				//'max_slug_chars' => 125,
				'overwrite' => true
			),
			'mtags' => array(
	            'class' => 'backend.components.ETaggableBehavior',
	            // Table where tags are stored
	            'tagTable' => 'cms_tag',
	            // Cross-table that stores tag-model connections.
	            // By default it's your_model_tableTag
	            'tagBindingTable' => 'cms_article_tag',
	            // Foreign key in cross-table.
	            // By default it's your_model_tableId
	            'modelTableFk' => 'article_id',
	            // Tag table PK field
	            'tagTablePk' => 'id',
	            // Tag name field
	            'tagTableName' => 'name',
	            // Tag counter field
	            // if null (default) does not write tag counts to DB
	            //'tagTableCount' => 'count',
	            // Tag binding table tag ID
	            'tagBindingTableTagId' => 'tag_id',
	            // Caching component ID. If false don't use cache.
	            // Defaults to false.
	            //'cacheID' => 'cache',
	 
	            // Save nonexisting tags.
	            // When false, throws exception when saving nonexisting tag.
	            'createTagsAutomatically' => true,
	 
	            // Default tag selection criteria
	            'scope' => array(
	                //'condition' => ' t.user_id = :user_id ',
	                //'params' => array( ':user_id' => Yii::app()->user->id ),
	            ),
	 
	            // Values to insert to tag table on adding tag
	            'insertValues' => array(
	              	'user_id' => (Yii::app() instanceof CConsoleApplication) ? '' : Yii::app()->user->id,
	            ),
	        ),
	        'image' => array(
	            'class' => 'backend.extensions.AttachmentBehavior.AttachmentBehavior',
	            # Should be a DB field to store path/filename
	            'attribute' => 'thumbnail',
	            # Default image to return if no image path is found in the DB
	            //'fallback_image' => 'images/sample_image.gif',
	            'path' => "../uploads/:model/:id.:ext",
	            /* 'processors' => array(
	                array(
	                    # Currently GD Image Processor and Imagick Supported
	                    'class' => 'GDProcessor',
	                    'method' => 'resize',
	                    'params' => array(
	                        'width' => 324,
	                        'height' => 242,
	                        'keepratio' => true
	                    )
	                )
	            ), */
	            'styles' => array(
	                # name => size 
	                # use ! if you would like 'keepratio' => false
	                'thumb' => '!324x242',
	            )           
       		 ),
	        'image2' => array(
	            'class' => 'backend.extensions.AttachmentBehavior.AttachmentBehavior',
	            # Should be a DB field to store path/filename
	            'attribute' => 'thumbnail2',
	            # Default image to return if no image path is found in the DB
	            //'fallback_image' => 'images/sample_image.gif',
	            'path' => "../uploads/:model/t2/:id.:ext",
	            /* 'processors' => array(
	                array(
	                    # Currently GD Image Processor and Imagick Supported
	                    'class' => 'GDProcessor',
	                    'method' => 'resize',
	                    'params' => array(
	                        'width' => 400,
	                        'height' => 300,
	                        'keepratio' => true
	                    )
	                )
	            ), */
	            'styles' => array(
	                # name => size 
	                # use ! if you would like 'keepratio' => false
	                'thumb2' => '!400x300',
	            )           
       		 ),
			'image3' => array(
						'class' => 'backend.extensions.AttachmentBehavior.AttachmentBehavior',
						# Should be a DB field to store path/filename
						'attribute' => 'thumbnail_slide',
						# Default image to return if no image path is found in the DB
						//'fallback_image' => 'images/sample_image.gif',
						'path' => "../uploads/:model/t3/:id.:ext",
						/* 'processors' => array(
						 array(
						 		# Currently GD Image Processor and Imagick Supported
						 		'class' => 'GDProcessor',
						 		'method' => 'resize',
						 		'params' => array(
						 				'width' => 400,
						 				'height' => 300,
						 				'keepratio' => true
						 		)
						 )
						), */
						'styles' => array(
								# name => size
								# use ! if you would like 'keepratio' => false
								'thumb3' => '!679x334',
						)
				),				
		);
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'title' => 'Title',
			'slug'	=> 'Slug',
			'description' => 'Description',
			'extra_description' => 'Restaurant Description',
			'body' => 'Body',
			'thumbnail' => 'Thumbnail',
			'thumbnail2' => 'Thumbnail2',
			'thumbnail_slide' => 'Slide Images',
			'created' => 'Created',
			'creator' => 'Creator',
			'last_modify' => 'Last Modify',
			'ispublic' => 'Published',
			'public_time' => 'Publish Time',
			'meta_description' => 'Meta Description',
			'meta_keywords' => 'Meta Keywords',
			'html_title' => 'HTML Tag',
			'slug'	=> 'SEO URL Alias',
			'layout'	=> 'Layout',
			'featured'	=> 'Featured',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('type',$this->type);
		$criteria->compare('views',$this->views);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('extra_description',$this->extra_description,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('thumbnail2',$this->thumbnail2,true);
		$criteria->compare('thumbnail_slide',$this->thumbnail_slide,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('creator',$this->creator);
		$criteria->compare('last_modify',$this->last_modify);
		$criteria->compare('ispublic',$this->ispublic);
		$criteria->compare('public_time',$this->public_time);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('html_title',$this->html_title,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('layout',$this->layout);
		$criteria->compare('featured',$this->featured);

        $criteria->compare('res_city',$this->res_city,true);
        $criteria->compare('res_district',$this->res_district,true);
        $criteria->compare('res_setting',$this->res_setting,true);
        $criteria->compare('res_cuisine',$this->res_cuisine,true);
        $criteria->compare('res_rating',$this->res_rating,true);
        $criteria->compare('res_open_hour',$this->res_open_hour,true);
        $criteria->compare('res_closed_hour',$this->res_closed_hour,true);
        $criteria->compare('res_dress_code',$this->res_dress_code,true);
        $criteria->compare('res_private_room',$this->res_private_room,true);
        $criteria->compare('res_car_park',$this->res_car_park,true);
        $criteria->compare('res_smoking_area',$this->res_smoking_area,true);
        $criteria->compare('res_price',$this->res_price,true);
        $criteria->compare('res_address',$this->res_address,true);
        $criteria->compare('res_hotline',$this->res_hotline,true);
        $criteria->compare('res_year',$this->res_year,true);
        $criteria->compare('res_website',$this->res_website,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    			'defaultOrder'=>'public_time DESC',
  			)
		));
	}
	
	public static function getTitle($id){
		$return = Article::model()->findByPk($id);
		if(isset($return)){
			return $return;
		} else {
			return false;
		}
	}
	
	public function getTitleByLang($lang){
		$modelTransDefault = ArticleTranslation::model()->findByAttributes(array('article_id'=>$this->id, 'language_code'=>$lang));
		if(!empty($modelTransDefault)){
			return $modelTransDefault->title;
		} else {
			return false;
		}
	}
	
	
	public function loadFullArticle($id) {
		$criteria=new CDbCriteria;
		$criteria->compare('t.id',$id);
		$criteria->with = array('categories','sections');
		return $this->find($criteria);
	}
	 
	
	public function getListArticlesByCategoryAndSection($section_id, $category_id = 0, $offset = 0, $limit = 12){
		$criteria=new CDbCriteria;
		$criteria->with = array(
				'sections' => array(
						'alias'		=> 'as',
						'joinType'=>'INNER JOIN',
						'together'=>true,
						'condition' => 'sections_as.section_id = :section_id',
						'params'  => array('section_id' => $section_id)
				),
				'categories' => array(
						'alias'		=> 'c',
						'joinType'=>'LEFT JOIN',
						'together'=>true						
				)
		);
		$criteria->addCondition('public_time <= :time AND ispublic = 1');
		$criteria->params = array('time' => time());
		$criteria->order = 't.public_time DESC';
		if($category_id > 0){
			$criteria->addCondition('categories_c.category_id = (:category_id) OR categories_c.category_id IS NULL');
			$criteria->params = CMap::mergeArray($criteria->params, array('category_id' => $category_id));
		}	
		return $this->getDataPagging($criteria, $offset, $limit);
	}
	
	
	
	
	//Nam Le
	public function getListArticlesBySection($section_id, $current_page, $sort,$limit=9){
		$criteria=new CDbCriteria;
		$criteria->with = array(
				'sections' => array(
						'alias'		=> 'as',
						'joinType'=>'INNER JOIN',
						'together'=>true,
				),
				'categories' => array(
						'alias'		=> 'c',
						'joinType'=>'LEFT JOIN',
				),
				'comments' => array(
					'alias'		=> 'cm',
					'joinType'=>'LEFT JOIN',
				),
		);
		
		$criteria->addCondition('sections_as.section_id = :section_id AND public_time <= :time AND ispublic = 1');
		$criteria->params = array('section_id' => $section_id, 'time' => time());
		
		if(isset($sort)){
			switch ($sort) {
			    case 'view':
			       	$criteria->order = 't.views DESC';
			        break;
			   case 'comment':
			   		$criteria->order =  't.comment DESC';
			        break;
				case 'current':
			   		$criteria->order =  't.id DESC';
			        break;
			}
		} else {
			$criteria->order = 't.public_time DESC';
		}
		
		/**
        * Pagination
        */

		$count = count(Article::model()->findAll($criteria));
        $pages = new CPagination($count);
        $pages->pageSize = $limit;
        $pages->setCurrentPage($current_page);
        $pages->applyLimit($criteria);
        $data['pages'] = $pages;

        //get data
		$news = Article::model()->findAll($criteria);
        $data['news'] = $news;
        return $data;
	}

	//Duc Nguyen
	public function getListNewlyOpenedBySection($section_id, $current_page, $sort){
		$criteria=new CDbCriteria;
		$criteria->with = array(
			'sections' => array(
				'alias'		=> 'as',
				'joinType'=>'INNER JOIN',
				'together'=>true,
			),
			'categories' => array(
				'alias'		=> 'c',
				'joinType'=>'LEFT JOIN',
			),
			'comments' => array(
				'alias'		=> 'cm',
				'joinType'=>'LEFT JOIN',
			),
		);

		$criteria->addCondition('sections_as.section_id = :section_id AND public_time <= :time AND ispublic = 1');
		$criteria->params = array('section_id' => $section_id, 'time' => time());

		if(isset($sort)){
			switch ($sort) {
				case 'view':
					$criteria->order = 't.views DESC';
					break;
				case 'comment':
					$criteria->order =  't.comment DESC';
					break;
				case 'current':
					$criteria->order =  't.id DESC';
					break;
			}
		} else {
			$criteria->order = 't.public_time DESC';
		}

		/**
		 * Pagination
		 */


		$count = count(Article::model()->findAll($criteria));
		$pages = new CPagination($count);
		$pages->pageSize = 1;
		$pages->setCurrentPage($current_page);
		$pages->applyLimit($criteria);
		$data['pages'] = $pages;

		//get data
		$news = Article::model()->findAll($criteria);
		$data['news'] = $news;
		return $data;
	}
	
	public function getListArticlesBySectionHome($section_id, $current_page = 0, $limit = 3){
		$criteria=new CDbCriteria;
		$criteria->with = array(
				'sections' => array(
						'alias'		=> 'as',
						'joinType'=>'INNER JOIN',
						'together'=>true,
				),
				'categories' => array(
						'alias'		=> 'c',
						'joinType'=>'LEFT JOIN',
				)
		);
		$criteria->addCondition('sections_as.section_id = :section_id AND public_time <= :time AND ispublic = 1 AND featured = 1');
		$criteria->params = array('section_id' => $section_id, 'time' => time());		
		$criteria->order = 't.featured, t.public_time DESC';
		/**
        * Pagination
        */
		$count = count(Article::model()->findAll($criteria));
        $pages = new CPagination($count);
        $pages->pageSize = $limit;
        $pages->setCurrentPage($current_page);
        $pages->applyLimit($criteria);
        $data['pages'] = $pages;

        //get data
		$news = Article::model()->findAll($criteria);
        $data['news'] = $news;
        return $data;
	}
	
	public function getSearchArticles($keyword, $current_page){
		$criteria=new CDbCriteria;
		$criteria->with = array(
				'sections' => array(
						'alias'		=> 'as',
						'joinType'=>'INNER JOIN',
						'together'=>true,
				),
				'categories' => array(
						'alias'		=> 'c',
						'joinType'=>'LEFT JOIN',
				)
		);
		$criteria->addCondition("t.title LIKE :keyword OR t.description LIKE :keyword OR t.body LIKE :keyword");
		$criteria->addCondition('public_time <= :time AND ispublic = 1');
		$criteria->params = array(':time' => time(), ':keyword' => "%$keyword%");
		$criteria->order = 't.featured, t.public_time DESC';
		/**
        * Pagination
        */
		$count = count(Article::model()->findAll($criteria));
        $pages = new CPagination($count);
        $pages->pageSize = 9;
        $pages->setCurrentPage($current_page);
        $pages->applyLimit($criteria);
        $data['pages'] = $pages;

        //get data
		$news = Article::model()->findAll($criteria);
        $data['news'] = $news;
        return $data;
	}
	
	
	//Nam Le
	public function getListArticlesByCategory($category_id, $current_page,$sort){
		$criteria=new CDbCriteria;
		$criteria->with = array(
				'categories' => array(
						'alias'		=> 'c',
						'joinType'=>'LEFT JOIN',
						'together'=>true,
				),
				'comments' => array(
					'alias'		=> 'cm',
					'joinType'=>'LEFT JOIN',
				),
		);
		$criteria->addCondition('categories_c.category_id = :category_id AND public_time <= :time AND ispublic = 1' );
		$criteria->params = array('category_id' => $category_id, 'time' => time());
		if(isset($sort)){
			switch ($sort) {
			    case 'view':
			       	$criteria->order = 't.views DESC';
			        break;
				case 'comment':
			   		$criteria->order =  't.comment DESC';
			        break;
				case 'current':
			   		$criteria->order =  't.id DESC';
			        break;
			}
		} else {
			$criteria->order = 't.public_time DESC';
		}
		
		//$criteria->order = 't.public_time DESC';
		/**
        * Pagination
        */
		$count = count(Article::model()->findAll($criteria));
        $pages = new CPagination($count);
        $pages->pageSize = 9;
        $pages->setCurrentPage($current_page);
        $pages->applyLimit($criteria);
        $data['pages'] = $pages;

        //get data
		$news = Article::model()->findAll($criteria);
        $data['news'] = $news;
        return $data;
	}

	public function getListArticlesByTags($tags, $currentPage, $sort = null){
		$criteria=new CDbCriteria;
		$criteria->with = array(
			'tags' => array(
				'alias'		=> 'as',	
				'joinType'=>'INNER JOIN',
				'together'=>true,
				'condition'=>"as.name like '%" .$tags . "%'"
			),
			'comments' => array(
					'alias'		=> 'cm',
					'joinType'=>'LEFT JOIN',
			),
		);
		$criteria->order = 't.public_time DESC';
		$criteria->addCondition('t.public_time <= :time AND t.ispublic = 1');
		$criteria->params = array('time' => time());
		
		if(isset($sort)){
			switch ($sort) {
				case 'view':
					$criteria->order = 't.views DESC';
					break;
				case 'comment':
					$criteria->order =  't.comment DESC';
					break;
				case 'current':
					$criteria->order =  't.id DESC';
					break;
			}
		} else {
			$criteria->order = 't.public_time DESC';
		}
		/**
        * Pagination
        */
		$count = count(Article::model()->findAll($criteria));
        $pages = new CPagination($count);
        $pages->pageSize = 9;
        $pages->setCurrentPage($currentPage);
        $pages->applyLimit($criteria);
        $data['pages'] = $pages;

        //get data
		$news = Article::model()->findAll($criteria);
        $data['news'] = $news;
        return $data;
	}
	
	public function getTopNews($index = 0, $limit = 10) {
		$criteria = new CDbCriteria;
		
		$criteria->order = 'public_time DESC';
		$criteria->condition = 'ispublic = 1 AND public_time <= '. time();
		return $this->getDataPagging($criteria, $index, $limit);
	}
	
	function getDataPagging($criteria, $index, $limit){
		$data = array('data' => null, 'total' => 0, 'index' => $index, 'limit' => $limit, 'ismore' => false);
		$data['total'] = $this->count($criteria);
		
		if ($index > 0)
			$criteria->offset = $index * $limit;
		$criteria->limit = $limit;
		$data['data'] = $this->findAll($criteria);
		if (($index + 1) * $limit < $data['total'] && $data['total'] > 0 )
			$data['ismore'] = true;
		
		return $data;
	}

	public function render()
	{
		$content = $this->body;
		$content = $this->renderLinks($content);
		$content = $this->renderImages($content);
	
		return $content;
	}
	
	protected function renderLinks($content)
	{
		 $matches = array();
		preg_match_all($this->_patterns['link'], $content, $matches);
	
		$links = array();
		foreach ($matches[1] as $index => $target)
		{
			/* // If the target doesn't include 'http' it's treated as an internal link.
			if (strpos($target, 'http') === false)
			{
				$cms = Yii::app()->cms;
	
				$node = $cms->loadNode($target);
				if (!$node instanceof CmsNode)
				{
					$cms->createNode($target);
					$node = $cms->loadNode($target);
				}
	
				$target = $node->getUrl();
			}
	
			$text = $matches[3][$index];
			$links[$index] = CHtml::link($text, $target); */
		}
	
		if (!empty($links))
			$content = strtr($content, array_combine($matches[0], $links));
	
		return $content; 
	}
	
	/**
	 * Renders images within this node.
	 * @param string $content the content being rendered
	 * @return string the content
	 */
	protected function renderImages($content)
	{
		$matches = array();
		preg_match_all($this->_patterns['image'], $content, $matches);
	
		$images = array();
		foreach ($matches[1] as $index => $id)
		{
			/* $attachment = CmsAttachment::model()->findByPk($id);
			if ($attachment instanceof CmsAttachment && strpos($attachment->mimeType, 'image') !== false)
			{
				$url = $attachment->getUrl();
				$name = $attachment->resolveName();
				$images[$index] = CHtml::image($url, $name);
			} */
		}
	
		if (!empty($images))
			$content = strtr($content, array_combine($matches[0], $images));
	
		return $content; 
	}
	
	public function showTags($showlinks = true) {
		$result = array();
		if(count($this->tags) > 0) {
			foreach($this->tags as $tag) {
				$result[] = ($showlinks) ? CHtml::link($tag->name, Yii::app()->createUrl('//news/frontend/tags', array('name' => $tag->name))) : $tag->name;
			}
		}		
		if($showlinks && count($this->tags) > 0)
			return implode(", ", $result);
		return implode(", ", $result);
	}
	
	public function getListTagIds() {
		$result = array();
		if(count($this->tags) > 0) {
			foreach($this->tags as $tag) {
				$result[] = $tag->id;
			}
		}
		return $result;
	}
	
	public function searchLastedImported($maxormin = 'ASC')
	{
		$criteria=new CDbCriteria;
		$criteria->compare('related',self::IGN);
		$criteria->order = 'related_id '. $maxormin;
		return $this->find($criteria);
	}
	
	public function getRelatedArticles($limit = 2) {
		$tags = $this->getListTagIds();
		$_tags = 0;
		if(!empty($tags)){
			$_tags = implode(',', $tags);
		}
		$criteria=new CDbCriteria;
		$criteria->with = array(
			'tags' => array(
				'alias'		=> 'tags',
				'joinType'=>'INNER JOIN',
				'together'=>true,
			),
		);
		$criteria->addCondition('t.public_time <= :public_time AND t.ispublic = 1');
		$criteria->addCondition('tags.id IN (:tags)');
		$criteria->addCondition('t.id != :id');
		$criteria->params = array('public_time' => time(), 'id' => $this->id, 'tags' => $_tags);
		$criteria->order = 't.public_time DESC';
		$criteria->limit = $limit;
		$articles = $this->findAll($criteria); 
		
		return $articles;
	}
	
	public function findArticle($id) {
		$criteria=new CDbCriteria;
		$criteria->with = array(
				'sections' => array(
					'alias'		=> 'as',
					'joinType'=>'INNER JOIN',
					'together'=>true,
				),
				'categories' => array(
					'alias'		=> 'c',
					'joinType'=>'LEFT JOIN',
				)
		);
		$criteria->addCondition('t.public_time <= :public_time and t.ispublic = 1 and t.id = :id');
		$criteria->params = array('public_time' => time(), 'id' => $id);
		return $this->find($criteria);
	}
	
	public function getNextArticle() {
		$criteria=new CDbCriteria;
		$criteria->with = array(
			'sections' => array(
				'alias'		=> 'as',	
				'joinType'=>'INNER JOIN',
				'together'=>true,
			),
		);
		$criteria->addCondition('section_id = :section_id and t.ispublic = 1 and t.public_time <= :time');
		$criteria->addCondition('t.public_time > :public_time');
		$criteria->params = array('section_id' => $this->sections[0]->id, 'public_time' => $this->public_time, 'time' => time());
		$criteria->order = 't.public_time ASC';
		return $this->find($criteria);
	}
	
	public function getPrevArticle() {
		$criteria=new CDbCriteria;
		$criteria->with = array(
			'sections' => array(
				'alias'		=> 'as',	
				'joinType'=>'INNER JOIN',
				'together'=>true,
			),
		);
		$criteria->addCondition('section_id = :section_id');
		$criteria->addCondition('t.public_time < :public_time and t.ispublic = 1 and t.public_time <= :time');
		$criteria->params = array('section_id' => $this->sections[0]->id, 'public_time' => $this->public_time, 'time' => time());
		$criteria->order = 't.public_time DESC';
		return $this->find($criteria);
	}
	
	public function getLinkNextArticle($text) {
		$article = $this->getNextArticle();
		if($article) {
			$title = '<div>'.$article->title.'</div><span></span>';
			return CHtml::link($text . $title, Yii::app()->createUrl('//news/article', array('id' => $article->id, 'slug' => $article->slug)), array('class' => 'next'));
		}
		return '';	
		
	}
	
	
	public function getLinkPreviousArticle($text) {
		$article = $this->getPrevArticle();
		if($article) {
			$title = '<div>'.$article->title.'</div><span></span>';
			return CHtml::link($text . $title, Yii::app()->createUrl('//news/article', array('id' => $article->id, 'slug' => $article->slug)), array('class' => 'prev'));
		}
		return '';
	}
	
	
	public function getImageThumbnail($htmlOptions = array()) {
		$thumbnail = null;
		if(empty($this->thumbnail)){
			$thumbnail = Yii::app()->createUrl(Yii::app()->theme->baseUrl .'/resources/html/css/images/no-article.jpg');
		} else { 
			$root_folder = Yii::getPathOfAlias ( 'pathroot' );
			$get_thum_img = explode('.', $this->thumbnail);
//			if(count($get_thum_img) == 2){
//				$thumbnail = $get_thum_img[0] . '-thumb.' . $get_thum_img[1];
//				if(!file_exists($root_folder . $thumbnail)){
//					$thumbnail = $this->thumbnail;
//				}
//			} else {
//				$thumbnail = $this->thumbnail;
//			}
			$thumbnail = $this->thumbnail;
		} 
		
		return CHtml::image($thumbnail, $this->title, $htmlOptions);
	}
	
	public function getImageThumb() {
		$thumbnail = null;
		if(empty($this->thumbnail)){
			$thumbnail = Yii::app()->createUrl(Yii::app()->theme->baseUrl .'/resources/html/css/images/no-article.jpg');
		} else { 
			$root_folder = Yii::getPathOfAlias ( 'pathroot' );
			$get_thum_img = explode('.', $this->thumbnail);
			if(count($get_thum_img) == 2){
				$thumbnail = $get_thum_img[0] . '-thumb.' . $get_thum_img[1];
				if(!file_exists($root_folder . $thumbnail)){
					$thumbnail = $this->thumbnail;
				}
			} else {
				$thumbnail = $this->thumbnail;
			}
			
		} 
		
		return $thumbnail;
	}
	
	public function getLinkImageThumbnail() {
		return CHtml::link($this->getImageThumbnail(), Yii::app()->createUrl('//news/article', array('id' => $this->id, 'slug' => $this->slug)), array('title' => $this->title));
	}
	
	public function getImageThumbnail2($htmlOptions = array()) {
		$thumbnail = null;
		if(empty($this->thumbnail2)){
			$thumbnail = Yii::app()->createUrl(Yii::app()->theme->baseUrl .'/resources/html/css/images/no-article.jpg');
		} else {
			$root_folder = Yii::getPathOfAlias ( 'pathroot' );
			$get_thum_img = explode('.', $this->thumbnail2);
			if(count($get_thum_img) == 2){
				$thumbnail = $get_thum_img[0] . '-thumb2.' . $get_thum_img[1];
				if(!file_exists($root_folder . $thumbnail)){
					$thumbnail = $this->thumbnail2;
				}
			} else {
				$thumbnail = $this->thumbnail2;
			}
		}
	
		return CHtml::image($thumbnail, $this->title, $htmlOptions);
	}
	public function getImageSlide($htmlOptions = array()) {
		$thumbnail = null;
		if(empty($this->thumbnail_slide)){
			$thumbnail = Yii::app()->createUrl(Yii::app()->theme->baseUrl .'/resources/html/css/images/no-article.jpg');
		} else {
			$root_folder = Yii::getPathOfAlias ( 'pathroot' );
			$get_thum_img = explode('.', $this->thumbnail_slide);
			if(count($get_thum_img) == 2){
				$thumbnail = $get_thum_img[0] . '-thumb2.' . $get_thum_img[1];
				if(!file_exists($root_folder . $thumbnail)){
					$thumbnail = $this->thumbnail_slide;
				}
			} else {
				$thumbnail = $this->thumbnail_slide;
			}
		}
	
		return CHtml::image($thumbnail, $this->title, $htmlOptions);
	}	
	public function getLinkImageThumbnail2() {
		return CHtml::link($this->getImageThumbnail2(), Yii::app()->createUrl('//news/article', array('id' => $this->id, 'slug' => $this->slug)), array('title' => $this->title));
	}
	
	
	public function getAuthorName() {
	    $author_name = 'Kelreport';
		if(!empty($this->author_name)){
	        $user = Member::model()->findByAttributes(array('username'=>$this->author_name));
	        if(!empty($user)){
			    $author_name = $user->getDisplayName();
	        }
		}
		return $author_name;	
	}	
	
	
	
	
	public function getCategory(){
		$items = $this->categories();
		if ($items)
			foreach ($items as $val)
				return $val;
		return null;
	}
	
	public function getByMultiId($str_key, $array_id){
		$news = Yii::app()->cache->get($str_key.implode('-', $array_id));
		if (!$news){
			$criteria=new CDbCriteria;
			$criteria->addCondition('t.ispublic = 1');
			$criteria->addInCondition('t.id', $array_id);
			$criteria->order = 't.public_time DESC';
			$news = $this->findAll($criteria);
			
			Yii::app()->cache->set($str_key.implode('-', $array_id), $news, 7200);
		}
		
		$tmp = array();
		foreach ($array_id as $item)
			foreach ($news as $data)
				if ($item == $data->id)
					$tmp[] = $data;
		
		return $tmp;
	}
	
	
	public function getArticleByTitle($keyword){
		$criteria=new CDbCriteria;
		$criteria->addCondition('title LIKE :keyword and ispublic = 1');
		$criteria->params = array('keyword' => "%$keyword%");
		$criteria->order = 'public_time DESC';
		$criteria->limit = 100;
		return $this->findAll($criteria);
	}
	
	public function getArticleByArrayId($article_ids){
		$criteria=new CDbCriteria;
		$criteria->addInCondition('t.id', $article_ids);
		$criteria->addCondition('ispublic = 1');
		$criteria->order = 'public_time DESC';
		return $this->findAll($criteria);
	}

    public function getListArticle($section_slug, $currentPage){
        $section = Section::model()->find('slug = :slug', array('slug' => $section_slug));
        $data = array('news' => null, 'pages' => null);
        if(!empty($section)){
            $criteria=new CDbCriteria;

            $criteria->join = "INNER JOIN `cms_article_section` `sections_s` ON (`t`.`id`=`sections_s`.`article_id`)";
            $criteria->join .= " INNER JOIN `cms_section` `s` ON (`s`.`id`=`sections_s`.`section_id`)";
            $criteria->join .= " LEFT JOIN `cms_article_category` `categories_c` ON (`t`.`id`=`categories_c`.`article_id`)";
            $criteria->join .= " LEFT JOIN `cms_category` `c` ON (`c`.`id`=`categories_c`.`category_id`) ";
            $criteria->addCondition('sections_s.section_id = :section_id AND public_time <= :time AND ispublic = 1');
            $params = array('section_id' => $section->id, 'time' => time());

            $criteria->params = $params;
            $criteria->order = 't.public_time DESC';

            /**
             * Pagination
             */
            $pages = new CPagination(Article::model()->count($criteria));
            $pages->pageSize = 5;
            $pages->setCurrentPage($currentPage);
            $pages->applyLimit($criteria);
            $data['pages'] = $pages;

            //get data
            $news = Article::model()->findAll($criteria);
            $data['news'] = $news;
        }
        return $data;
    }
    
    
    
    /**
     * Override for multilanguage
     * @see CActiveRecord::findAll()
     */
    public function findAll($condition='',$params=array()){
    	$language = Yii::app()->language;
    	if(!($condition instanceof CDbCriteria)){
    		$condition = new CDbCriteria();
    	}

    	if(!empty($language) && Yii::app()->name != 'Admin'){
    		$languageDefault = Language::model()->find("is_default = 1");
    		if(!empty($languageDefault) ){
	    		if(!empty($languageDefault->code) && empty($language)){
	    			$language = $languageDefault->code;
	    		}
	    		$condition->join = "INNER JOIN `cms_article_translation` tr ON t.id = tr.article_id";
	    		$condition->mergeWith($condition);
	    		$condition->addCondition('tr.language_code = :language');
	    		if(!empty($condition->params)){
	    			$params = array_merge(array(':language'=>$language), $condition->params);
	    		}else{
	    			$params = array(':language'=>$language);
	    		}
	    		$condition->params = $params;
    		}
    	}
   		/** **/
   		if(!empty(Yii::app()->session['_location'])){
   			$_tmp_location = json_decode(Yii::app()->session['_location'], false);
   			$condition->addCondition('t.id IN (SELECT article_id FROM `cms_article_shop` a
			INNER JOIN `pro_shops` b ON a.shop_id = b.id
			WHERE b.location_id = :location)');
   			if(!empty($condition->params)){
   				$params = array_merge($condition->params, array(':location'=>$_tmp_location->id));
   			}else{
   				$params = array(':location'=>$_tmp_location->id);
   			}
	   		$condition->params = $params;
   		}
    	return parent::findAll($condition, $params);
    }
    /**
     * Override for multilanguage
     * @see CActiveRecord::findAll()
     */
    public function afterFind(){
    	$language = Yii::app()->language;
    	if(!empty($language) && Yii::app()->name != 'Admin'){
	    	$languageDefault = Language::model()->find("is_default = 1");
	    	if(empty($languageDefault->code) && empty($language)){
	    		$language = $languageDefault->code;
	    	}
    		$modelTrans = ArticleTranslation::model()->findByAttributes(array('article_id'=>$this->id, 'language_code'=>$language));
	    	if(!empty($modelTrans)){
	    		$this->title =  $modelTrans->title;
	    		$this->slug =  $modelTrans->slug;
	    		$this->description =  $modelTrans->description;
				$this->extra_description =  $modelTrans->extra_description;
	    		$this->body =  $modelTrans->body;
	    	}
    	}
    	return parent::afterFind();
    } 
    public function getArticleByLocation($offset = 5, $limit = 3){
    	$criteria	=	new CDbCriteria;
    	$criteria->select	=	't.*';
    	 	
    	$criteria->join .= "INNER JOIN `cms_article_shop` `article_shop` ON (`article_shop`.`article_id`=`t`.`id`)";
    	$criteria->join .= "INNER JOIN `pro_shops` `s` ON (`s`.`id`=`article_shop`.`shop_id`)";
    	$criteria->join .= "INNER JOIN `cms_article_tag` `at` ON (`at`.`article_id`=`t`.`id`)";
    	$criteria->join .= "INNER JOIN `cms_article_section` `as` ON (`as`.`article_id`=`t`.`id`)";
    	$criteria->join .= "INNER JOIN `cms_tag` `ta` ON (`at`.`tag_id`=`ta`.`id`)";
    	$tags = 'editor';
    	$criteria->addCondition("ta.name like '%{$tags}%'");
    	$criteria->addCondition('t.ispublic = 1');
    	
    	$criteria->offset = $offset;
    	$criteria->limit	=	$limit;
    	$criteria->order = 't.public_time DESC';
    	$criteria->group	=	'`t`.`id`';
    	
    	$news = parent::findAll($criteria);
    	return $news;
    }
    public function getMostLike($limit = 10){
    	$criteria	=	new CDbCriteria;
    	$criteria->select	=	't.*';
    	$criteria->distinct	=	true;
    	$criteria->join .= "INNER JOIN `cms_article_section` `as` ON (`as`.`article_id`=`t`.`id`)";
    	
    	$criteria->addCondition('t.ispublic = 1');
    	 
    	$criteria->limit	=	$limit;
    	$criteria->order = 't.like DESC';
    	$criteria->group	=	'`t`.`id`';
    	
    	$news = parent::findAll($criteria);
    	return $news;    	
    }
}