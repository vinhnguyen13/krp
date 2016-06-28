$(function(){
	ArticleView.likeit();
	ArticleView.pickTo();
});

var ArticleView = {
	likeit: function () {
		$(".product-ulti a").click(function () {
			$(".product-ulti a").removeClass('active');
			$('body').loading();
			var alink = $(this);
			var proID = alink.closest('.product-ulti').attr('tabindex');
			var artID = alink.closest('.product-ulti').attr('tabarticle');
			if(proID && artID){
				$.ajax({
					type: "POST",
					url: alink.attr('rel'),
					data: {'proID': proID, 'artID': artID},
					dataType: 'json',
					success: function( response ) {
						$('body').unloading();
						alink.addClass('active');
					}
				});
			}
			return false;
		});
    },
    pickTo: function () {
    	$(".nav-left .btn-kel").click(function () {
    		$('body').loading();
    		var alink = $(this);
    		var artID = alink.attr('article');
    		if(artID){
    			$.ajax({
    				type: "POST",
    				url: '/article/pickTo',
    				data: {'artID': artID},
    				dataType: 'json',
    				success: function( response ) {
    					$('body').unloading();
    					if(response.status == 1){
    						alink.find('.text').html('UnPick to Kelreport');
    					}else{
    						alink.find('.text').html('Pick to Kelreport');
    					}
    				}
    			});
    		}
    		return false;
    	});
    },
}



