$(function(){
	commentStatus();
	likeStatus();
	statusComment();
});

function show_more_newsfeed(alias){
    var data = {
        offset: parseInt($('#newsfeed_offset').val())
    };
    if($('#newsfeed_offset_after').attr('id')){
        var limit   =   parseInt($('#newsfeed_offset_after').val());
    }else{
        var limit   =   $('#newsfeed_offset_first').val();
    }
    $.ajax({
        type: "POST",
        data: data,
        url: '/NewsFeed/ViewMore/?alias=' + alias,
        success: function(data){
            //$('.show-more').remove();
            $('.feed-list-item').append(data);
            
            //process with scrollbar
            $(".news-feed .cont .feed-list-item").mCustomScrollbar("destroy");
            sprScroll('.news-feed .cont .feed-list-item');
            
            $('.item_showmore').fadeIn(500);
            $('.news-feed .cont .feed-list-item').mCustomScrollbar("scrollTo","bottom");
            
            var showmore_offset = parseInt($('#newsfeed_offset').val());
            if(showmore_offset > 0){
                $('#newsfeed_offset').val(showmore_offset + parseInt(limit));
            }            
           
        },
        dataType: 'html'
    });     
}

function hide_showmore_bt(){
    $('.show-more-newsfeed').remove();
}


function commentStatus(){
	$(".comment").on("click", ".btn-default", function(event){
		var txt = $(this).closest(".comment").find(".cmt-post-text");
		if (txt){
			var form = $(this).closest(".comment-form");
			var listcomment = $(this).closest(".comment").find(".comment-list")
			postcomment(form, listcomment);
			event.preventDefault();
			txt.val('');
			return false;
		}
		return false;
	});
}

function postcomment(form, listcomment){
	$.ajax({
	      type: "POST",
	      url: form.attr( 'action' ),
	      data: form.serialize(),
	      success: function( response ) {
	    	  //removeLoading($('.cmt-text', form), '#cmt-submit');
	    	  var data = $(response);
	    	  $(listcomment).append(data);
	      }
	});
}

function likeStatus(){
	var time_commentlike;
	$(".item-list").on("click", ".like_comment", function(event){
		if (time_commentlike)
			clearTimeout(time_commentlike);
		comment_like = $(this);
		time_commentlike = setTimeout('commentlike()', 300);
		return false;
	});
}

function commentlike(){
	$.get(comment_like.attr("rel"), function(data) {
		if (data != false){
			var html = data.action + ' (' + data.total + ')'
			comment_like.html(html);
		}
	},"json");
}

function statusComment(){
	$(".feed-list").on("click", ".btn-comment", function(event){
		$(this).closest(".item").toggleClass("item-active");
		$(this).closest(".item").find(".cmt-post-text").focus();
	});
}