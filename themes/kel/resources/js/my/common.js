var Friends = {
	listFriends: function () {
		$(".btn-follow").unbind('click').bind('click', function(event){
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

