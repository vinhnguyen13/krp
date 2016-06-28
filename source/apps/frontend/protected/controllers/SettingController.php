<?php	
class SettingController extends MemberController
{
    public function actionIndex(){
    	$model = new SettingForm();
    	if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest){
    	    if(isset($_POST['ajax']) && $_POST['ajax']==='frm-accs')
    	    {
    	        echo CActiveForm::validate($model);
    	        Yii::app()->end();
    	    }
    	    
    		$frmSet = Yii::app()->request->getPost('SettingForm');
    		$model->attributes = $frmSet;
    		$model->validate();
    		$errors	=	$model->getErrors();
    		if((!empty($frmSet['new_password']) || !empty($frmSet['retype_new_password'])) && empty($frmSet['current_password'])){
    			$errors['current_password']	=	array('Please input your current password');
    		}
    		if(!$errors){
    			$model->save();
    			echo json_encode(array('status'=>true));
    		}else{
    			
    			echo json_encode(array_merge($errors, array('status'=>false)));
    		}
    		Yii::app()->end();
    	}
    	if(!empty($this->usercurrent)){
    		$model->fullname = $this->usercurrent->getDisplayName();
    		$model->email = $this->usercurrent->profile->email;
    		if(empty($this->usercurrent->profile_settings)){
    		    $this->usercurrent->profile_settings = new UsrProfileSettings();
    		    $this->usercurrent->profile_settings->user_id = $this->usercurrent->id;
    		    $this->usercurrent->profile_settings->save();
    		}
    	}
    	$this->render('page/index', array(
    		'model'=>$model
    	));
    }
    
    public function actionPrivacy(){
        if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest){
            $profile_settings = $this->usercurrent->profile_settings;
            $type = Yii::app()->request->getPost('type');
            $val = Yii::app()->request->getPost('val');
            if(!empty($profile_settings) && !empty($type)){
                $profile_settings->$type = $val;
    		    $profile_settings->validate();
    		    if(!$profile_settings->hasErrors()){
    		        $profile_settings->save();
    		        echo json_encode(array('status'=>true));
    		    }else{
        			echo json_encode($profile_settings->getErrors());
        		}
        		Yii::app()->end();
            }
        }
    }
    
    public function actionChangeAvatar(){
    	Yii::import('backend.extensions.image.Image');
    	$imageFile = CUploadedFile::getInstanceByName('image');
    	$params = CParams::load();
    	$p93x93 = $params->params->uploads->avatar->p93x93;
    	$tmp = $params->params->uploads->avatar->tmp;
    	
    	$dir = Yii::getPathOfAlias('webroot') . DS . $p93x93->p;
    	if ($imageFile->getSize() > $params->params->uploads->avatar->size) {
    		echo $this->usercurrent->getNoAvatar();
    		Yii::app()->end();
    	}
    	
    	VHelper::checkDir($dir);
    	list($width, $height, $type, $attr) = getimagesize($imageFile->getTempName());
    	if($width > $height){
    		$resize_type	=	Image::HEIGHT;
    	}else{
    		if($width < $height){
    			$resize_type	=	Image::WIDTH;
    		}else{
    			$resize_type	=	Image::WIDTH;
    		}
    	}
    	if(!Yii::app()->request->getParam('f')){
    		$files =  $this->usercurrent->alias_name. '.' . strtolower($imageFile->getExtensionName());
    		if (Yii::app()->image->load($imageFile->getTempName())->resize($p93x93->w, $p93x93->w, $resize_type)->crop($p93x93->w, $p93x93->w)->save($params->pathAvatar($files))) {
    			$this->usercurrent->avatar = $files;
    			$this->usercurrent->save();
    		}
    	}else{
    		$this->usercurrent->avatar = Yii::app()->request->getParam('f'). '.' . strtolower($imageFile->getExtensionName());
    		$this->usercurrent->save();
    		$files =  $this->usercurrent->avatar;
    		$width = ($width > $tmp->w) ? $tmp->w : $width;
    		$height = ($height > $tmp->h) ? $tmp->h : $height;
    		if (Yii::app()->image->load($imageFile->getTempName())->resize($tmp->w, $tmp->h, $resize_type)->crop($tmp->w, $tmp->h)->save($params->pathAvatar($files))) {
    	
    		}
    	}
    	echo CParams::load()->urlAvatar($files). '?t=' . time();
    	Yii::app()->end();
    }
}