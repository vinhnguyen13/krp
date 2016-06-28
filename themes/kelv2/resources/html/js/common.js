$(document).ready(function(){
    /*var $li_menu = $('.nav-left > ul > li');
    setTimeout(function(){
        $li_menu.each(function(){
            var $this = $(this),
                wLi = $this.width();
            if($this.find('.submenu').length > 0){
                var wSub = $this.find('.submenu').width(),
                    wCenter = wLi/2 - wSub/2;
                $this.find('.submenu').css({left: wCenter+'px'});
            }
        });
    },3000);*/
	
	
	//About us
	$('.list_member ul li a').click(function(){	
		$(this).addClass('active');
		$('.popup_bio').hide();	
		$(this).parent().find('.popup_bio').show();
		return false;
	});
	
	$('.popup_bio .close_button').click(function(){	
		$(this).parent().hide();
	});
	//End about us

    //START show position sidebar
    var $dropdown = $('#choose-item');
    $dropdown.click(function(e){
        e.stopPropagation();
        if($(this).hasClass('active')){
            $(this).parent().find('.dropdown-select').slideUp('fast');
            $(this).removeClass('active');
        }else{
            $(this).addClass('active');
            $(this).parent().find('.dropdown-select').slideDown('fast');
        }

    });
    
    var $itemShow = $('.dropdown-select ul li span');
    $itemShow.click(function(){
    	var city_id	=	$(this).attr('city_id');
        var txt = $(this).text();
        $('.dropdown-select').hide();
        $('#choose-item').removeClass('active');
        if($('.sym-show').length > 0 && $('.sym-show').is(':hidden')){
            $('.sym-show').show();
        }
        $('#selected-item').text(txt);
        changeLocation(city_id);
    });
    
    //END show position sidebar

    var $showLightBox = $('.show-lightbox');
    $showLightBox.click(function(e){
        e.stopPropagation();
        var $this = $(this);
        if($this.hasClass('active')){
            $('.tab-top .lightbox').hide();
            $showLightBox.removeClass('active');
        }else{
            $showLightBox.removeClass('active');
            $('.tab-top .lightbox').hide();
            $this.addClass('active');
            $this.parent().find('.lightbox').show();
        }
    });

    var $sel_lang = $('.lb-lang ul li span');
    $sel_lang.click(function(){
        var $this = $(this),
            attrItem = $this.attr('data-select'),
            txt = $this.text();
        $('.icon-flag').contents().filter(function() {
                return this.nodeType == Node.TEXT_NODE;
            }).replaceWith(txt);
        //$('.icon-flag').contents()[1] = txt;
        if(attrItem == 'lb-en'){
            $('.icon-flag .selected-icon').css({
                'background-position': '-51px 0px'
            });
        }else{
            $('.icon-flag .selected-icon').css({
                'background-position': '0px -38px'
            });
        }
        $('.lightbox').hide();
        $('.show-lightbox').removeClass('active');
    });

    $('.login-tab').click(function(e){
        e.stopPropagation();
    });
    $(document).click(function(e){
        if($('.dropdown-select').is(':visible')){
            e.stopPropagation();
            $('.dropdown-select').hide();
            $('#choose-item').removeClass('active');
        }
        if($('.lightbox').is(':visible')){
            e.stopPropagation();
            $('.lightbox').hide();
            $('.show-lightbox').removeClass('active');
        }

    });

    $('.fo-content .where-buy').click(function(){
        popup('#popup-wherebuy');
        var hScroll = $('#popup-wherebuy .distric-buy').height();
        if(hScroll > 317){
            $('#popup-wherebuy .block-scroll').addClass('scroll-overflow');
        }
        return false;
    });
    $('.btn-close-pop').click(function(){
        close_popup('#popup-wherebuy');
    });
    $('.btn-close').click(function(){
        close_popup('#popup-email');
    });
    /*$('.popup-block').click(function(e){
        e.preventDefault();
        $('body').css({
            overflow: 'inherit'
        });
        $(this).fadeOut();
    });*/
    /*$('.content-popup').click(function(e){
        e.preventDefault();
    });*/

    $('.list-tab-pro li a').click(function(){
        changeTab($(this),'.list-tab-pro li a','.tab-follow');
        return false;
    });
    /*
    $('.list-tab-right li a').click(function(){
        changeTab($(this),'.list-tab-right li a','.tab-common');
        $('.block-accs').hide();
        return false;
    });
    */
    $('.block-friends ul.list-tab-sub li a').click(function(){
        changeTab($(this),'.block-friends ul.list-tab-sub li a','.tab-sub');
        return false;
    });

    /*$('.block-accs ul.list-tab-sub li a').click(function(){
        changeTab($(this),'.block-accs ul.list-tab-sub li a','.block-accs .tab-sub');
        return false;
    });*/

    var $click_cmt = $('.item-list div a.status-cmt.show-cmt');
    $click_cmt.click(function(){
        var $this = $(this);
        if($this.hasClass('active')){
            $click_cmt.removeClass('active');
            $this.parent().find('.box-cmt-status').hide();
        }else{
            $click_cmt.removeClass('active');
            $('.box-cmt-status').hide();
            $this.addClass('active');
            $this.parent().find('.box-cmt-status').show();
        }
        return false;
    });

    $('.fo-content ul li a.show-frm-email').click(function(){
        popup('#popup-email');
        return false;
    });

    $('.cbox-js span').each(function(){
        if($(this).hasClass('active')){
            $(this).parent().find('input').prop("checked", true);
        }
    });
    $('.cbox-js span').click(function(){
        var $this = $(this);
        if($this.hasClass('active')){
            $this.removeClass('active');
            $this.parent().find('input').prop("checked", false);
        }else{
            $this.addClass('active');
            $this.parent().find('input').prop("checked", true);
        }
    });

    $('.tab-privacy lable').each(function(){
        var $this = $(this);
        if($this.hasClass('active') && $this.hasClass('on-status')){
            $this.css('left','0px');
        }else{
            $this.css('left','0px');
        }
    });
    $('.tab-privacy lable').click(function(){
        var $this = $(this);
        if($this.hasClass('on-status')){
            $this.animate({backgroundPosition:'-96px -477px'}, 500, 'easeOutExpo', function(){
                $this.removeClass('on-status').addClass('off-status');
            });
        }else{
            $this.animate({
                'background-position': '-57px -477px'
            },500,'easeOutExpo', function(){
                $this.removeClass('off-status').addClass('on-status');
            });
        }
        //return false;
    });

    //append label before error form
    $('#frm-signup .errorMessage,#frm-login .errorMessage,#mail-form .errorMessage,#frm-contact .errorMessage,.frm_login_page .errorMessage').each(function(){
        var $divWrapError = $('<div><div class="errorWrapp"><label></label></div></div>');
        var $this = $(this),
            $clone = $this.clone();
        $divWrapError.find('.errorWrapp').append($clone);
        $this.before($divWrapError.html());

        $this.remove();

    });

    $('.pagination .yiiPager').find('a:first-child').remove();
    $('.pagination .yiiPager').find('a:last-child').remove();

    $('.opacity_bg,#mail-form .btn-close,#popup-login .btn-close').live('click',function(){
        close_popup('.popup-block');
    });

    $('#popup-login form .close_popup').click(function(){
        close_popup('#popup-login');
    });
});

function popup(id){
    var $id = $(id),
        wD = $(document).width(),
        hD = $(document).height(),
        hW = $(window).height(),
        topScroll = $(window).scrollTop();
    var $div = $('<div class="opacity_bg">&nbsp;</div>');
    $div.css({
        position: 'absolute',
        top: '0px',
        left: '0px',
        width: '100%',
        height: hD+'px',
        background: 'url('+UrlCommon+'/resources/html/css/images/opacity-2.png)',
        'z-index': '9999'
    });
    /*$id.css({height: hD+'px'});*/
    /*$('.popup-block').css({
        'margin-top': topScroll+'px'
    });*/
    $id.after($div);
    $id.css('visibility','hidden');
    var wItem = $id.width(),
        cWItem = wD/2 - wItem/2,
        hItem = $id.height(),
        cHItem = hW/2 - hItem/2 + topScroll;
    $id.css({
        left: cWItem,
        top: cHItem
    });
    $id.css({visibility: 'visible',display: 'block'});
    $('body').css('overflow','hidden');
}
function close_popup(id){
    var $id = $(id);
    $('body').css('overflow','auto');
    $id.fadeOut('fast',function(){
        $(this).css('visibility','hidden');
    });
    $('.opacity_bg').remove();
}
window.scrollBarWidth = function() {
    document.body.style.overflow = 'hidden';
    var width = document.body.clientWidth;
    document.body.style.overflow = 'scroll';
    width -= document.body.clientWidth;
    if(!width) width = document.body.offsetWidth - document.body.clientWidth;
    document.body.style.overflow = '';
    return width;
}
function changeTab(tab, tab_common, box_show){
    var $tab = $(tab),
        $box_show = $(box_show),
        $tab_common = $(tab_common),
        id_tab = $tab.attr('rel');
    $tab_common.removeClass('active');
    $tab.addClass('active');
    $box_show.hide();
    $('.'+id_tab).fadeIn('fast');
}

function changeLocation(city_id){
	var data	=	{_location: city_id};
    $.ajax({
    	data: data,
        type: "POST",
        url: '/site/SetLocation',
        success: function(data) {
        	/*
        	if(data != ''){
	        	$('.bar-location .listarticle_bylocation').fadeOut(900, function(){
	            	$('.bar-location .listarticle_bylocation').html(data);
	            	$('.bar-location .listarticle_bylocation').fadeIn();        		
	        	});
        	}
			*/
        	location.reload();
        },
        dataType: 'html'
    });	
}


































