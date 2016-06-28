<p class="find-face-friend">
	<a href="#">Find Facebook Friends<i class="left icon-common icon-friend-face">&nbsp;</i></a>
</p>
<p>
	Find Friends from Your Contacts<i
		class="left icon-common icon-friend-yahoo">&nbsp;</i>
</p>
<div class="get-friend-btn">
	<a href="#">Yahoo mail<i class="left icon-common btn-yahoo">&nbsp;</i></a>
	<a href="#">Gmail<i class="left icon-common btn-gmail">&nbsp;</i></a>
</div>
<div class="clear"></div>
<script>
	// Facebook - Start
	<?php if(Yii::app()->facebook->getUser()): ?>
	$('.find-face-friend a').click(function(e){
		loadFacebookList();
		e.preventDefault();
	});
	<?php else: ?>
	$('.find-face-friend a').click(function(e){
		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {
				loadFacebookList();
			} else if (response.status === 'not_authorized') {
			
			} else {
				FB.login();
			}
		});
		e.preventDefault();
	});
	FB.Event.subscribe('auth.login', function(response) {
		loadFacebookList();
    });
	<?php endif; ?>

	$('.invite_friend a').click(function(e){
		var tabContent = $('.tab-content > div').eq($(this).parent().index());
		
		$('.invite_friend ul li.active').removeClass('active');
		$(this).parent().addClass('active');
		
		$('.tab-content > div').hide();
		tabContent.show();
		if(tabContent.html() == "") {
			var loading_div = $('<div style="margin-top: 10px;">Loading...</div>');
			tabContent.append(loading_div);
			var url = $(this).attr('href');
			$.ajax({
		        url: url,
		        type: "POST",
		        success: function(data){
		        	if(data) {
		        		loading_div.remove();
		        		tabContent.append(data);
		        		tabContent.slimscroll({
	                        size: '5px',
	                        height: '779px',
	                        distance: '5px'
	                    });
		        	} else {
		        		Util.openWindow('<?php echo $this->user->createUrl('//friend/connectSocial/type/facebook');?>');
			        }
		        },
		        dataType: 'html'
		    });
		}
		e.preventDefault();
	});

	function loadFacebookList() {
		if($('.list-google-yahoo').length > 0)
			$('.list-google-yahoo').remove();
		$('.invite_friend .active a').trigger('click');
		$('.list_friend_fb_wrap').slideToggle();
	}

	$('.list_friend_fb').on('click', '.member .invite-facebook', function(e){
		var self = $(this);
		var url = self.data('uid');
		var parent = self.closest('a');
		parent.append('<div style="background: rgba(0, 0, 0, 0.5); position: absolute; width: 100%; height: 100%; top: 0px; text-align:center; padding-top: 20px; color: #E4DADA; z-index: 9999;">following...</div>');
		$.ajax({
			url: url,
			type: 'json'
		}).done(function(response){
			parent.parent().remove();
		});
		e.preventDefault();
	});

	$('.list_friend_fb').on('click', '.see-more a', function(){
		var self = $(this);
		var ul = self.closest('.list_friend_fb').find('> ul');
		ul.after('<span id="loading" style="clear: left; display: block;">Loading...</span>');
		
		
		var url = self.data('url');
		var offset = ul.find('li').length;
		var limit = self.data('limit');
		
		$.ajax({
			url: url,
			data: {offset: offset},
			type: 'POST'
		}).done(function(html){
			var el = $(html).find('li');
			ul.append(el);
			if(self.closest('.list_friend_fb').height() > 779 && self.closest('.list_friend_fb').find('> .slimScrollDiv').length == 0) {
				self.closest('.list_friend_fb').slimscroll({
		            size: '5px',
		            height: '779px',
		            distance: '5px'
		        });
			}
			if(el.length < limit)
				self.parent().hide();
			
			$('#loading').remove();
		});
	});

	$('.list_friend_fb').on('click', '.not-member .invite-facebook', function(e){
		postToFriend($(this).data('uid'));
		e.preventDefault();
	});
	function postToFriend(uid) {
		FB.ui({
			method: 'send',
			display: 'popup',
			link: 'http://kelreport.com',
			to: uid
		});
	}
	// Facebook - End

	// Yahoo & Gmail - Start
	$('.yahoo_gmail a').click(function(e){
		Util.openWindow($(this).attr('href'));
		e.preventDefault();
	});
	function getFriends(urlRequest){
		if($('.find_friend_fb .slimScrollDiv').length > 0)
			$('.list_friend_fb_wrap').slideUp();
		if($('.find_friend_google_yahoo > .list-google-yahoo').length > 0) {
			$('.find_friend_google_yahoo > .list-google-yahoo').remove();
		}
		var loading_div = $('<div style="margin-top: 10px;">Loading...</div>');
		$('.find_friend_google_yahoo').append(loading_div);
		$.get(urlRequest,
			function(source){
				loading_div.remove();
				$(".find_friend_google_yahoo").append(source);
				if($('.tbl-invite').height() > 772) {
					$('.tbl-invite').slimscroll({
	                    size: '5px',
	                    height: '772px',
	                    distance: '5px'
	                });
				}
			},
			"html"
		);
		
	}
	$('.find_friend_google_yahoo').on('click', '.tbl-invite .cbox-js .icon_common', function(){
		$(this).toggleClass('active');
		$(this).prev().prop('checked', !$(this).prev().prop('checked'));
	});
	$('.find_friend_google_yahoo').on('click', '.invite-button a', function(e){
		$('body').loading();
		var urlRequest = $(this).attr('href');
		var email = $('.cbox-js input').serializeArray();
		$.ajax({
			type: "POST",
			url: urlRequest,
			data: email,
			success: function(response){
				$('body').unloading();
			},
			dataType: "json"
		});
		e.preventDefault();
	});
	// Yahoo & Gmail - End
</script>