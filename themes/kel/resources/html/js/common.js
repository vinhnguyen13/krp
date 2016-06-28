$(document).ready(function(){
	sprSub();
	sprSlide();
	sprInview('.sections');
	sprCloseReg();
	$(".btn-comment").click(function(){
		$(this).closest(".conversation").find(".comment").toggleClass("active");
	});
	sprPrint();
	// sprLangG();
	sprPop();
	sprReplaceBox();
	 sprUserLogin();
});
// function hover username
function sprUserLogin(){
	$(".logged-user").hover(function(){
			var boardClass = $(this).closest(".item").find(".reg-board");
			$(boardClass).removeClass("slideup").addClass("active");
		},function(){
			var boardClass = $(this).closest(".item").find(".reg-board");
			setTimeout( function(){$(boardClass).removeClass("active");}, 600);
	});
}
// function replace checkbox, radiobox
function sprReplaceBox(){
	$('.register input').iCheck({
		checkboxClass: 'sprcheck',
		radioClass: 'sprradio',
		increaseArea: '20%' // optional
	});
}
// function Call Store Detail
function sprPop(){
	$(".store .more").click(function(){
		$(".pop-wrapper").addClass("active");
	});
	$(".pop-wrapper .pop-bg").click(function(){
		$(".pop-wrapper").removeClass("active");
	});
	$(".pop-wrapper .btn-close").click(function(){
		$(".pop-wrapper").removeClass("active");
	});
}
// function Pick Language
function sprLangG(){
	$(".lang-list a").click(function(){
		var pickedLang = $(this).attr('rel');
		$.cookie("sprLang", pickedLang, { path: '/', expires: 1 });
	});
	var sprLangCookie = $.cookie("sprLang");
	if (sprLangCookie == null)
	{
		$.cookie("sprLang", "en", { path: '/', expires: 1 });
		var LangText = $("#lang-en").html();
		$(".btn-language .itext").text(LangText);
	} else {
		var sprLangPicked = "#lang-" + sprLangCookie;
		var LangPicked = $(sprLangPicked).html();
		$(".btn-language .itext").html(LangPicked);
	}
}
// function Navigation sub
function sprPrint(){
	$(".btn-print").click(function(){
		window.print();
	});
	$(".btn-email").click(function(){
		$(".form-email").addClass("active");
	});
	$(".form-email .btn-close").click(function(){
		$(".form-email").removeClass("active");
	});
}
function sprSub(){
	$(".navigation .sub").each(function(){
		x = $(this).width()/2 * (-1);
		$(this).css("marginLeft",x);
	});
}
function sprSlide(){
	 $('.slide-list').bxSlider({
		pager: false
	 });
	 if ($("#featured-image .gallery-images li").length > 1)
	 {
		 $('#featured-image .gallery-images').bxSlider({
			pager: true,
			adaptiveHeight: true,
			pagerCustom: '.gallery-pager',
			controls: false,
			auto: false,
			pause: 3000,
			onSliderLoad: function(){
				$(".gallery-images a").colorbox({
					transition: "fade",
					rel:"gal",
					maxWidth: "100%",
					maxHeight: "100%",
					fixed: true,
					returnFocus: false
				});
			}
		 });
		 if ($("#featured-image .gallery-pager li").length > 5)
		 {
			$('#featured-image .gallery-pager').bxSlider({
				pager: false,
				minSlides: 5,
				maxSlides: 5,
				moveSlides: 1,
				slideWidth: 85,
				slideMargin: 0,
				nextSelector: ".gallery-pager-wrap .btn-next",
				prevSelector: ".gallery-pager-wrap .btn-prev",
				infiniteLoop: false,
				hideControlOnEnd: true
			});
		 }
	 }
}
function sprInview(cls){
	var wHeight = $(window).height();
	var sprImg = cls + ' img';
	$(sprImg).each(function(){
		var imgPosition = $(this).offset();
		if (imgPosition.top > wHeight) {
			$(this).addClass("noview");
		}
		$(this).bind('inview', function (event, visible, topOrBottomOrBoth) {
		  if (visible == true) {
			   $(this).addClass("inview");
			if (topOrBottomOrBoth == 'top') {
			  // top part of element is visible
			} else if (topOrBottomOrBoth == 'bottom') {
			  // bottom part of element is visible
			} else {
			  // whole part of element is visible
			}
		  } else {
			// element has gone out of viewport
			$(this).removeClass("inview").addClass("noview");
		  }
		});
	});
}
function sprReg(item){
	$(".reg-board.board-login").removeClass("active");
	if (!$(this).closest(".reg-board.board-reg").hasClass("active")) {
		$(".reg-board.board-reg").removeClass("slideup").removeClass("active");
		$(item).closest(".item").find(".reg-board.board-reg").removeClass("slideup").addClass("active");
	} else {
		$(item).closest(".item").find(".reg-board.board-reg").addClass("slideup");
		setTimeout( function(){$(item).closest(".item").find(".reg-board.board-reg").removeClass("slideup").removeClass("active");}, 600);
	}
}
function sprLogin(item){
	$(".reg-board.board-reg").removeClass("active");
	if (!$(this).closest(".reg-board.board-login").hasClass("active")) {
		$(".reg-board.board-login").removeClass("slideup").removeClass("active");
		$(item).closest(".item").find(".reg-board.board-login").removeClass("slideup").addClass("active");
	} else {
		$(item).closest(".item").find(".reg-board.board-login").addClass("slideup");
		setTimeout( function(){$(item).closest(".item").find(".reg-board.board-login").removeClass("slideup").removeClass("active");}, 600);
	}
}
function sprCloseReg(){
	$(".reg-board .btn-close").click(function(){
		var boardClass = $(this).closest(".reg-board");
			$(boardClass).addClass("slideup");
		setTimeout( function(){$(boardClass).removeClass("active");}, 600);
	});
}