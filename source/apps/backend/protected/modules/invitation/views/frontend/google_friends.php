<?php if(!empty($contacts)):?>
	<div class="list-google-yahoo" style="margin-top: 19px;">
		<div class="tbl-invite">
		    <table cellpadding="0" cellspacing="0" border="0">
		    	<tr>
		            <th class="first-col"><?php echo Yii::t('profile', 'Email Address') ?></th>
		            <th class="col-cbox" style="text-align: center;"><?php echo Yii::t('profile', 'Invite') ?></th>
		        </tr>
		        <?php foreach ($contacts as $contact):?>
		        <tr>
		        	<td><?php echo $contact['name'] ?></td>
		            <td class="cbox-js col-cbox">
		            	<div>
		            		<input name="email[]" value="<?php echo htmlentities(json_encode(array($contact['email'], $contact['name']))) ?>" type="checkbox" />
		            		<span class="icon_common"></span>
		            	</div>
		            </td>
		        </tr>
		        <?php endforeach;?>
		    </table>
		    <div class="see-more" style="margin-bottom: 0px;<?php echo (count($contacts)<$limit) ? 'display: none;' : '' ?>">
				<a href="javascript:void(0);" data-limit="<?php echo $limit ?>" data-url="<?php echo ($type=="yahoo") ? $this->createUrl('/invitation/frontend/GetFriendsYahoo', array('step'=>'getcontact')) : $this->createUrl('/invitation/frontend/GetFriendsGoogle', array('result'=>'success')); ?>"><span><?php echo Yii::t('profile', 'See More') ?></span><i class="icon_common icon-see-more">&nbsp;</i></a>
			</div>
	    </div>
	    <div class="clear"></div>
	    <div class="invite-button"><a href="<?php echo $this->createUrl('InviteYahooGoogleContact');?>"><?php echo Yii::t('profile', 'Invite friends') ?></a></div>
    </div>
<?php endif; ?>
<script>
	$('.list-google-yahoo .see-more a').click(function(){
		$('.tbl-invite table').after('<span id="loading" style="margin-top: 10px; display: block;">Loading...</span>');
		var self = $(this);
		var url = self.data('url');
		var offset = $('.tbl-invite table tr').length - 1;
		var limit = self.data('limit');
		$.ajax({
			url: url,
			data: {offset: offset}
		}).done(function(html){
			var el = $(html).find('.tbl-invite table tr:not(:first)');
			$('.tbl-invite table').append(el);
			if($('.tbl-invite').height() > 772 && $('.list-google-yahoo').find('> .slimScrollDiv').length == 0) {
				$('.tbl-invite').slimscroll({
                    size: '5px',
                    height: '772px',
                    distance: '5px'
                });
			}
			if(el.length < limit)
				self.parent().hide();
			$('#loading').remove();
		});
	});
</script>