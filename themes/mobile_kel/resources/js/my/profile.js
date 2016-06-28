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
		$("a.face-connect").on("click", function(event){
			$('body').loading();
			var link = $(this);
			var url = link.attr('data-url');
			$.post(url, { func: true }, function(data) {
				if(data != 'disconnect'){
					$('.facebook_html').html(data);
					$('.connectto').hide();
					$('.face-connect.disconnect').show();
					
				} else {
					$('.connectto').show();
					$('.face-connect.disconnect').hide();
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