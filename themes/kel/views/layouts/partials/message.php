<?php if(!Yii::app()->user->isGuest): ?>
<div class="note-area">
	<ul>
		<?php $this->widget('backend.modules.member.components.widgets.MessageWidget', array()); ?>
		<!-- Message -->
		<?php $this->widget('backend.modules.member.components.widgets.NotificationsWidget', array()); ?>			
		<!-- Notification Popup -->
	</ul>
</div>
<?php endif; ?>