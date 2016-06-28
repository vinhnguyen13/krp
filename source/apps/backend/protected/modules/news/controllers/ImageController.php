<?php
class ImageController extends Controller{
	
	
	public function actionDelete(){
		if(Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest){
			$id = intval($_POST['id']);
			$model = $this->loadModel($id);
			if(!empty($model)){
				$folder = Yii::app()->params['upload_path'].DS;
				$thumb = $folder.$model->path.DS.'thumb300x0'.DS.$model->image;
				$detail = $folder.$model->path.DS.'detail960x0'.DS.$model->image;
				$origin = $folder.$model->path.DS.'origin'.DS.$model->image;
				if(file_exists($thumb)){
					@unlink($thumb);		
				}
				if(file_exists($detail)){
					@unlink($detail);		
				}
				if(file_exists($origin)){
					@unlink($origin);		
				}
				if($model->delete()){
					echo true;
				} else {
					echo false;
				} 			
			}
			
			Yii::app()->end();
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
		
	}
	
	public function actionUpdateSort(){
		if(Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest){
			$id = intval($_POST['id']);
			$sort = intval($_POST['sort']);
			$model = $this->loadModel($id);
			$model->sort = $sort;
			if($model->update()){
				echo true;
			} else {
				echo false;
			}
			Yii::app()->end();
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
		
	}
	
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model = ArticleImage::model()->findByAttributes(array('id' => $id));	
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}	