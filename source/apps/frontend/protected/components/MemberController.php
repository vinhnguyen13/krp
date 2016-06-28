<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class MemberController extends Controller
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public $title ='';
	public $usercurrent;
	public $user;
	public $alias_name;
	public $option_html = array();
	public function init()
	{
// 		if(Yii::app()->user->isGuest)
// 			throw new CHttpException(403, 'You must login !');
		$this->usercurrent = Yii::app()->user->data();
		$params = $this->getActionParams();
		$flag = false;
		if(isset($params['alias'])){
			$this->alias_name = $params['alias'];
			$member = Member::model()->findByAttributes(array('alias_name' => $this->alias_name));
			if(isset($member)) {
				$flag = true;
				$this->user = $member;
			}
		}
		if(!$this->isLogged()){
			if(Yii::app()->request->isAjaxRequest){
				echo Yii::t(null, 'Lost Session!');
				Yii::app()->end();
			}else{
				$this->redirect(Yii::app()->createUrl('//site/login'));
			}
		}
// 		if(!$flag)
// 			throw new CHttpException(403, 'The page you requested was not found.');
	}
	
	public function beforeAction($action){
		parent::beforeAction($action);
	    $this->option_html['containerChild']['attributes'] = array();
		$this->layout = 'main';
	    $this->option_html['containerChild']['attributes']['class'] = 'profile-page';
	    $this->pageTitle = Yii::app()->name;
		if(VHelper::activeMenu(null, 'setting', null)){
		}
		return true;
	}
	
	public function isLogged(){
		if(!Yii::app()->user->isGuest)
			return true;
		return false;
	}
}