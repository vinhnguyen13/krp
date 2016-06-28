<?php
class DefaultController extends Controller
{
	public $layout = '//layouts/column2';
	public function actionIndex()
	{
		
		$model=new Gallery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gallery']))
			$model->attributes=$_GET['Gallery'];
		
// 		$galleries = new CActiveDataProvider('Gallery', array(
// 				'criteria'=>array(
// 					'order'=>'id ASC',
// 				),
// 				'pagination'=>array(
// 					'pageSize'=>20,
// 				),
// 		));
		$this->render('index', array(
			'galleries' => $model,
		));
	}
	
	public function actionView()
	{
		$id = Yii::app()->request->getParam('id');
		if(!$id)
			return false;
		$gallery = Gallery::model()->findByPk($id);
		$this->render('view', array(
			'gallery' => $gallery,
		));
	}
	
	public function actionCreate()
	{
		$model = new Gallery();
		
		if(Yii::app()->request->isPostRequest){
			$type = isset($_POST['type']) ? $_POST['type'] : 'horizontal';
			$model->attributes = Yii::app()->request->getPost('Gallery');
			$model->validate();
			if(!$model->hasErrors()){
				$model->versions = array(
						'small' => array(
								'resize' => array(200, null),
						),
						'medium' => array(
								'resize' => array(800, null),
						),
						'type' => $type
				);
				$model->save();
			}
			$this->redirect(Yii::app()->createUrl('//gallerymanager/default/index'));
		}
		$this->render('create', array(
				'model' => $model,
		));
	}
	
	public function actionDelete()
	{
		$id = Yii::app()->request->getParam('id');
		if(!$id)
			return false;
		$gallery = Gallery::model()->findByPk($id);
		if($gallery){
			$gallery->delete();
		}
		
	}
	
	
	public function actionUpdate()
	{
		$id = Yii::app()->request->getParam('id');
		if(!$id)
			return false;
		$model = Gallery::model()->findByPk($id);
		if(Yii::app()->request->isPostRequest){
			$model->attributes = Yii::app()->request->getPost('Gallery');
			$type = isset($_POST['type']) ? $_POST['type'] : $model->versions['type'] ;
			$model->validate();
			if(!$model->hasErrors()){
				$model->versions = array(
						'small' => array(
								'resize' => array(200, null),
						),
						'medium' => array(
								'resize' => array(800, null),
						),
						'type' => $type
				);
				$model->save();
			}
			$this->redirect(Yii::app()->createUrl('//gallerymanager/default/index'));
		}
		$this->render('create', array(
				'model' => $model,
		));
	}
}