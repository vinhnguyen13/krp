var Profile = {
	init: function () {
		var link = $(".list-tab-pro li:first a");
		var url = link.attr('data-url');
		$('.'+link.attr('rel')).html(Util.uiTextLoading());
		$('.'+link.attr('rel')).show();
		$.post(url, { func: true }, function(data) {
			$('.'+link.attr('rel')).html(data);
		},"html");
	},
	tabFriendsFollowFacebook: function () {
		$(".list-tab-pro a").on("click", function(event){
			$('body').loading();
			var link = $(this);
			var url = link.attr('data-url');
			$.post(url, { func: true }, function(data) {
				if(data != 'disconnect'){
					$('.facebook_html').html(data);
					$('.connectto').hide();
					$('.connect_fb a.disconnect').show();
					
				} else {
					$('.connectto').show();
					$('.connect_fb a.disconnect').hide();
					$('.facebook_html').html('');
				}
				$('body').unloading();
			},"html");
			return false;
		});
    },
    follow: function () {
    	$(".follow").unbind('click').bind('click', function(event){
			$('body').loading();
			var btn = $(this);
			$.post(btn.attr('rel'), { func: btn.find('span').attr('rel') }, function(data) {
				btn.html(data);
				$('body').unloading();
			},"html");
			return false;
		});
    },
    
}