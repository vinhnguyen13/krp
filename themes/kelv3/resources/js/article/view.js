$(function(){
	ArticleView.likeit();
	ArticleView.pickTo();
});

var ArticleView = {
	likeit: function () {
		$("#social_button a").click(function () {
			if(typeof isGuest !== "undefined" && isGuest == 1){
				Util.popupLoginForm('popup-login');
				return false;
			}
			$('body').loading();
			var alink = $(this);
			var type = alink.attr('data-type');
			if(alink.attr('data-enable') == 'disable'){
				$('body').unloading();
				return;
			}
			$("#social_button a").removeClass('like-icon-active');
			$("#social_button a").removeClass('dislike-icon-active');
			$("#social_button a").removeClass('bou-icon-active');
			var proID = alink.closest('#social_button').attr('tabindex');
			var artID = alink.closest('#social_button').attr('tabarticle');
			var url = alink.attr('rel');
			if(proID && artID && url){
				$.ajax({
					type: "POST",
					url: url,
					data: {'proID': proID, 'artID': artID},
					dataType: 'json',
					success: function( response ) {
						if(response.active == 'active'){
							$('ul#social_button li').each(function(index, value){
								$(this).find('.icon_common').attr('data-enable', 'disable');
							});
							alink.addClass(type + '-icon-active');
						} else {
							$('ul#social_button li').each(function(index, value){
								$(this).find('.icon_common').attr('data-enable', 'enable');
							});

							alink.removeClass(type + '-icon-active');
						}
						alink.attr('data-enable', 'false');
						$('.num-like').html(response.like);
						$('body').unloading();
					}
				});
			}
			return false;
		});
    },
    pickTo: function () {
    	$(".btn-kel").click(function () {
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
    print: function(){
    	//window.print();
        var srcImg = $('.slidesjs-control').find('a:first img').attr('src');
        //var strArticle = '<div><span>'+$('.content-fs-1 h1').text()+'</span> - Kelreport.com</div>';
        var strArticle = '<div class="logo_print">'+$('.logo a').html()+'</div>';
        strArticle += '<h4 class="category">'+$('.breakcum ul li a:first').text()+'</h4>';
        strArticle += '<h1>'+$('.content-fs-1 h1').text()+'</h1>';
        strArticle += '<div class="wrap-img">'+$('.slidesjs-control').find('a:first').html()+'</div>';
        strArticle += '<p>'+$('.content-fs-1 > p').not('p.date-post-fs').text()+'</p>';
        strArticle += '<div class="footer_print">&copy; 2014 Dream-Weavers Media. All rights reserved.</div>';

        var strFrameName = "print_frame_" + $('.content-fs-1 h1').text().replace(/ /g,"_");
        var objFrame = window.frames[ strFrameName ];
        if (objFrame == null) {
            var jFrame = $("<iframe name='" + strFrameName + "'>");
            jFrame.css( "width", "672px").css("position", "absolute").css("left", "-4000px").appendTo($("body:first"));
        }
        var objFrame = window.frames[strFrameName];
        var objDoc = objFrame.document;

        document.title = ""+$('.content-fs-1 h1').text()+" - Kelreport.com";

        objDoc.open();
        objDoc.write("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">" );
        objDoc.write("<html>");
        objDoc.write("<head>");
        objDoc.write("<title>");
        //objDoc.write(document.title);
        objDoc.write("</title>");
        objDoc.write("<style type=\"text/css\">");
        objDoc.write(".logo_print{text-align:center;border-bottom:3px solid #231f20;margin-bottom:20px;padding-bottom:10px;}");
        objDoc.write(".category{text-transform:uppercase;font:700 17px/100% arial;margin-bottom:0px;text-align:center;}");
        objDoc.write("h1{font:700 35px/100% arial; text-align:center;margin-bottom:20px;margin-top:0px;}");
        objDoc.write(".wrap-img img{width:100%;}.wrap-img{margin-bottom:15px;}");
        objDoc.write("p{font:500 15px/25px arial;}");
        objDoc.write(".footer_print{border-top:2px solid #000;padding-left:10px;font:500 15px/100% arial;margin-top:30px;padding-top:5px;}");
        objDoc.write("</style>");
        objDoc.write("</head>");
        objDoc.write("<body>");
        objDoc.write(strArticle);
        objDoc.write("</body>");
        objDoc.write("</html>");
        objDoc.close();
        setTimeout(function(){objFrame.focus();objFrame.print();}, 200);
    },
    show_more_comment: function(item_id){
    	$('body').loading();
    	var page_html = $('.see-more span');
    	var page = ($('.see-more span').attr('data-nextpage')) ? $('.see-more span').attr('data-nextpage') : 1;
    	var data = {id: item_id, page: page };
    	if (page != 'end') {
	    	$.ajax({
	    		url: '/article/moreComment',
	    	  	data: data,
	    		success:function(response){
	    			$('.comment-list').append(response);
	    			var next_page = $(response).filter('.data-next-page').attr('data-nextpage');
	    			if(next_page == 'end'){
	    				$('.see-more').remove();
	    			} else {
	    				page_html.attr('data-nextpage', next_page);
	    				$('.data-next-page').remove();
	    				
	    			}
	    			$('body').unloading();
	    			
	    	    },
	    	 	dataType:'html'
	    	});
    	}
    	
    }
}



