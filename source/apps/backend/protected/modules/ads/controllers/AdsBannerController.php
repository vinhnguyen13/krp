<?php

class AdsBannerController extends Controller
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
	public function actionCreate()
	{
		$model=new AdsBanner;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AdsBanner']))
		{
			$model->attributes=$_POST['AdsBanner'];
            $model->start = Util::stringToDate($_POST['AdsBanner']['start']);
            $model->end   = Util::stringToDate($_POST['AdsBanner']['end']);

            $upload = CUploadedFile::getInstance($model,'upload');

            if ($upload){
                $model->upload = str_replace(".", "", microtime(true)) . '.'. $upload->extensionName;
                if($this->MakeDir() != false){
                    $upload->saveAs($this->MakeDir() . $model->upload);
                }
            }

			if($model->save())
				$this->redirect(array('admin'));
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AdsBanner']))
		{
			$model->attributes=$_POST['AdsBanner'];
            $model->start = Util::stringToDate($_POST['AdsBanner']['start']);
            $model->end   = Util::stringToDate($_POST['AdsBanner']['end']);

            $upload = CUploadedFile::getInstance($model,'upload');
            if($upload){

                if($this->MakeDir() != false){
                    if(file_exists($this->MakeDir().$model->upload)){
                        try {
                            @unlink($this->MakeDir().$model->upload);
                        } catch(ErrorException $ex) {
                            echo "Error: " . $ex->getMessage();
                        }
                    }
                    $model->upload = str_replace(".", "", microtime(true)) . '.'. $upload->extensionName;
                    $upload->saveAs($this->MakeDir() . $model->upload);
                }
            }

			if($model->save())
				$this->redirect(array('admin'));
		}else{
            $model->start = date('d-m-Y', $model->start);
            $model->end = date('d-m-Y', $model->end);
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AdsBanner');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AdsBanner('search');
		$model->unsetAttributes();  // clear any default values
        if (isset($_REQUEST['zone_id']))
            $model->zone_id = $_REQUEST['zone_id'];
		if(isset($_GET['AdsBanner']))
			$model->attributes=$_GET['AdsBanner'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AdsBanner the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AdsBanner::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AdsBanner $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ads-banner-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    private function MakeDir(){
        $folder = Yii::app()->params->webRoot.'/' . Yii::app()->params['ads']['upload_path'];
        if(!is_dir($folder)){
            try {

                $return = mkdir( $folder);
                if($return){
                    return $folder;
                } else {
                    return false;
                }
            } catch(ErrorException $ex) {
                echo "Error: " . $ex->getMessage();
            }
        } else {
            return $folder;
        }
    }
}
