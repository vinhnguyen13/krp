$(function(){
	Newsfeed.commentStatus();
	Newsfeed.likeStatus();
	Newsfeed.statusComment();
	Newsfeed.showmore();
	Newsfeed.getCommentsPrevious();
});
var Newsfeed = {
	init: function () {
		
	},
	showmore: function () {
		$(".tab-activity .see-more a").on("click", function(event){
			var __this = $(this);
			var offset  = __this.attr("data-offset");
			var url  = __this.attr("data-url");
			if(offset){
				$.post(url, { offset: offset }, function(data) {
					$('.see-more').replaceWith(data);
				},"html");
			}
			return false;
		});
	},
	commentStatus: function () {
		$(".txt-cmt-status").on("click", ".btn-cmt-status", function(event){
			$('body').loading();
			var txt = $(this).closest(".txt-cmt-status").find(".cmt-post-text");
			if (txt){
				var form = $(this).closest(".comment-form");
				var listcomment = $(this).closest(".box-cmt-status").find(".comment-list");
				var itemNewsfeed = $(this).closest(".right-cmt-status").find(".show-cmt b");
				var string = itemNewsfeed.html();
				newString = string.replace(/\d+/, parseInt(string.match(/\d+/)) + 1);
				$.ajax({
				      type: "POST",
				      url: form.attr( 'action' ),
				      data: form.serialize(),
				      success: function( response ) {
				    	  var data = $(response);
				    	  $(listcomment).append(data);
				    	  itemNewsfeed.html(newString);
				    	  $('body').unloading();
				      }
				});
				txt.val('');
				return false;
			}
			return false;
		});
	},
	likeStatus: function () {
		var time_commentlike;
		$(".item-list .like_comment").live("click",function(event){
			$('body').loading();
			if (time_commentlike)
				clearTimeout(time_commentlike);
			comment_like = $(this);
			time_commentlike = setTimeout(function () {
				$.get(comment_like.attr("rel"), function(data) {
					if (data != false){
						if(data.action == 'Like'){
							var html = '<i class="icon_common icon-like">&nbsp;</i><b>' + data.total + '</b>Like'
						}else{
							var html = '<i class="icon_common icon-unlike">&nbsp;</i><b>' + data.total + '</b>Like'
						}
						comment_like.html(html);
						$('body').unloading();
					}
				},"json");
			}, 300);
			return false;
		});
	},
	statusComment: function () {
		$(".feed-list").on("click", ".btn-comment", function(event){
			$(this).closest(".item").toggleClass("item-active");
			$(this).closest(".item").find(".cmt-post-text").focus();
		});
	},
	getCommentsPrevious: function () {
		$(".cpagging-comment").live("click", function(event){
			var link = $(this);
			$('body').loading();
			$.post($(this).attr('rel'), { func: true }, function(data) {
				if($(data).attr('data-prevLnk') && $(data).attr('data-prevLnk').length > 0){
					$($(data).html()).insertAfter(link.parent());
					link.attr('rel', $(data).attr('data-prevLnk'));
				}else{
					link.remove();
				}
				$('body').unloading();
			},"html");
		});
	},
}

