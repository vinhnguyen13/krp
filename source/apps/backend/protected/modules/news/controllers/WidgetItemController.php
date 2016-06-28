<?php

class WidgetItemController extends Controller
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
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($widget = null)
	{
		$model=new WidgetItem;
		$model->enabled = 1;
		$model->display_order = 1;
		$sucess = true;
		if($widget)
			$model->widget_id = $widget;			
		
		if(isset($_POST['WidgetItem']))
		{
			$model->attributes		= $_POST['WidgetItem'];
			
			if($sucess) {
				$model->created_date	= time();
				$model->updated_date 	= time();
				$model->created_by	 	= Yii::app()->user->id;
				$model->updated_by 		= Yii::app()->user->id;
				//$model->setTags($_POST['tags']);
				$image 					= CUploadedFile::getInstance($model,'image');
				if($image){
					$model->image = time() . "_" . $image->name;
					$image->saveAs($model->getImagePath() . $model->image);
				}
				if($model->save()){
					$this->redirect(array('//news/widget/view','id'=>$model->widget_id));
				}
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
		$sucess = true; 
		$model = $this->loadModel($id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WidgetItem']))
		{
			$old_image				= $model->image;
			$model->attributes		= $_POST['WidgetItem'];
			if($sucess) {
				$model->created_date	= time();
				$model->updated_date 	= time();
				$model->created_by	 	= Yii::app()->user->id;
				$model->updated_by 		= Yii::app()->user->id;
				$image 					= CUploadedFile::getInstance($model,'image');
				//$model->setTags($_POST['tags']);
				if($image){
					$model->image = time() . "_" . $image->name;
					$image->saveAs($model->getImagePath() . $model->image);
					if(!empty($old_image) && file_exists($model->getImagePath() . $old_image)){
						unlink($model->getImagePath() . $old_image);
					}
				}
				else{
					$model->image = $old_image;
				}
				if($sucess && $model->save()){
					$this->redirect(array('//news/widget/view','id'=>$model->widget_id));
				}
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
		$model = $this->loadModel($id);
		if(!empty($model->image)){
			$image = $model->getImagePath() .$model->image;
			if(file_exists($image)){
				unlink($image);
			}
		}
		$model->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('WidgetItem');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new WidgetItem('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['WidgetItem']))
			$model->attributes=$_GET['WidgetItem'];

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
		$model=WidgetItem::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='widget-item-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
