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
                    $('.tab-follower-list .follow-scroll').slimscroll({
                        size: '5px',
                        height: '904px',
                        distance: '5px'
                    });
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
                        $('.tbl-invite').slimscroll({
                            size: '5px',
                            height: '1000px',
                            distance: '5px'
                        });
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
                        $('.tab-follower-list .follow-scroll').slimscroll({
                            size: '5px',
                            height: '904px',
                            distance: '5px'
                        });
                    }
                    if($('.tab-following-list').is(':visible')){
                        $('.tab-following-list .follow-scroll').slimscroll({
                            size: '5px',
                            height: '904px',
                            distance: '5px'
                        });
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

