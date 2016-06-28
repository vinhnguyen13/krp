$(document).ready(function(){
	
	var loadingImg = $('#loading-img').clone();
	$('#loading-img').remove();
	
	$('#tab-friends .list-tab-friends li a').click(function(){
        var url = $(this).attr('href');
        var index = $(this).parent().index();
        var contentTab = $('.block-friends .tab-friends-common').eq(index);
        contentTab.html(loadingImg);
        $.ajax({
	        url: url,
	        success: function(html){
	        	if(html) {
	        		contentTab.html(html);
	        	}
	        },
	        dataType: 'html'
	    });
        return false;
    });
	$('#tab-friends .list-tab-friends li:eq(0) a').trigger('click');
});
var Friends = {
	init: function () {
		var link = $(".block-friends ul.list-tab-sub li:first a");
		var url = link.attr('data-url');
		$('.'+link.attr('rel')).html('<div style="padding: 40px 0px 0px 15px;">Loading...</div>');
		$.ajax({
	        type: "POST",
	        data: {func: 'true'},
	        url: url,
	        success: function(data){
	        	$('.'+link.attr('rel')).html(data);
	        	if($('.tab-follower-list').is(':visible')){
                }
	        },
	        dataType: 'html'
	    });
	},
	friendsList: function () {		
		$('.block-friends ul.list-tab-sub li a').click(function(){
			var link = $(this);
			var url = link.attr('data-url');
			$('.'+link.attr('rel')).html('<div style="padding: 40px 0px 0px 15px;">Loading...</div>');
			$.ajax({
		        type: "POST",
		        data: {func: 'true'},
		        url: url,
		        success: function(data){
		        	$('.'+link.attr('rel')).html(data);
		        	
                    if($('.tab-invite-friends').is(':visible')){
                    }
                    /*
                    if($('.tab-find-friends').is(':visible')){
                        $('.tab-find-friends').slimscroll({
                            size: '5px',
                            height: '1000px',
                            distance: '5px'
                        });
                    }
                    */
                    if($('.tab-follower-list').is(':visible')){
                    }
                    if($('.tab-following-list').is(':visible')){
                    }
		        },
		        dataType: 'html'
		    });
			return false;
	    });

	    $('.block-accs ul.list-tab-sub li a').click(function(){
	        
	        return false;
	    });
	}
}

