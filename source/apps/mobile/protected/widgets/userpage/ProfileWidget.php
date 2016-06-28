<?php
class ProfileWidget extends CWidget {
	public function run(){
		$likeCount = UserProduct::model()->countByAttributes(array('like'=>1, 'user_id'=>$this->controller->usercurrent->id));
		$hateCount = UserProduct::model()->countByAttributes(array('hate'=>1, 'user_id'=>$this->controller->usercurrent->id));
		$boughtCount = UserProduct::model()->countByAttributes(array('bought'=>1, 'user_id'=>$this->controller->usercurrent->id));
		$this->render('my-profile', array(
			'likeCount'=>$likeCount,		
			'hateCount'=>$hateCount,		
			'boughtCount'=>$boughtCount,		
		));
	}
	
}
?>