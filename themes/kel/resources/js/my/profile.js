$(function(){
	follow();
});

function follow(){
	$(".profile-follower").on("click", function(event){
		$('body').loading();
		$('.user-social ul li').removeClass('active');
		$(this).closest('li').addClass('active');
		$.post($(this).attr('rel'), { func: true }, function(data) {
			$('.user-follow').html(data);
			$('body').unloading();
		},"html");
		return false;
	});
	
	$('body').loading();
	$.post($(".profile-following").attr('rel'), { func: true }, function(data) {
		$('.user-follow').html(data);
		$('body').unloading();
	},"html");
	
	$(".profile-following").on("click", function(event){
		$('body').loading();
		$('.user-social ul li').removeClass('active');
		$(this).closest('li').addClass('active');
		$.post($(this).attr('rel'), { func: true }, function(data) {
			$('.user-follow').html(data);
			$('body').unloading();
		},"html");
		return false;
	});
	
	$(".btn-unfollow").on("click", function(event){
		var btn = $(this);
		$.post(btn.attr('rel'), { func: btn.find('span').attr('rel') }, function(data) {
			btn.html('<i class="i24 i24-message-white"></i>' + data);
			$('body').unloading();
		},"html");
	});
}