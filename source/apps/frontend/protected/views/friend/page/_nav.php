<?php 
$controller = Yii::app()->controller;
$action = $controller->action->id;
?>
<div class="friendNav-wrap">
	<ul class="friendNav">
		<li <?php if($action=='friends'){?>class="active"<?php }?>><a href="<?php echo $this->user->createUrl('/friend/friends');?>">Friends</a></li>
		<li><span class="sep">|</span></li>
		<li <?php if($action=='find'){?>class="active"<?php }?>><a href="<?php echo $this->user->createUrl('/friend/find');?>">Find Friends</a></li>
		<li><span class="sep">|</span></li>
		<li <?php if($action=='invite'){?>class="active"<?php }?>><a href="<?php echo $this->user->createUrl('/friend/invite');?>">Invite Friends</a></li>
	</ul>
</div>