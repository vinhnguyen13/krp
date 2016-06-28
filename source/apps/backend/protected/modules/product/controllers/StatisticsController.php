<?php

class StatisticsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new ProProducts('search');
		$from = Yii::app()->request->getParam('from');
		$to = Yii::app()->request->getParam('to');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProProducts']))
			$model->attributes=$_GET['ProProducts'];

		$this->render('index',array(
			'model'=>$model,
			'from'=>$from,
			'to'=>$to,
		));
	}

}
