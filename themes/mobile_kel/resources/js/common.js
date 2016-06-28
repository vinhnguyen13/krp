var $obj = {
    scrollHeader: function(items){
        $('html,body').animate({
          scrollTop: 0
        }, 700, function(){
            if($(items).hasClass('menu-top') || $(items).hasClass('box-search-show')){
                setTimeout(function(){
                    if($(items).hasClass('show')){
                        $(items).removeClass('show').addClass('hide');
                    }
                    $(items).toggleClass('hide').toggleClass('show');
                },300);
            }
        });
    },
    showPopup: function(id){
        var $id = $(id);
        $id.css({
            visibility: 'visible',
            display: 'none'
        });
        var hPopup;
        if(id == '#popup-gallery'){
            hPopup = $(window).outerHeight();
        }else{
            hPopup = $(id).height();
            var hWindow = $(window).outerHeight();
            if(! (hPopup > hWindow)){
                $id.height(hWindow);
            }
        }
        $('html,body').css({
            'height': hPopup+'px',
            'overflow': 'hidden'
        });
        $id.css({
            height: '100%'
        });
        $obj.scrollHeader();
        $id.fadeIn('fast');
    },
    hidePopup: function(id){
        var $id = $(id);
        $id.css({
            visibility: 'hidden',
            height: 'auto'
        });
        $('html,body').css({
            'overflow': 'auto',
            'height': 'auto'
        });
        $id.hide();
    },
    loadImgGallery: function(){
        var owl = $("#popup-gallery");
        owl.owlCarousel({
                autoPlay: false,
                items : 1,
                pagination:false,
                navigation: true,
                itemsMobile     :[500,1],
                itemsTablet : [800, 1],
                itemsTabletSmall : false,
                itemsMobile : [500, 1]
            });
            htmlEvent = '<span class="icon-common close-popup eventCommon icon-touch">&nbsp;</span>';    
            owl.append(htmlEvent);    
            $('#popup-gallery').css({
                visibility: 'hidden',
                display: 'block'
            });
            var len_img = $('#popup-gallery .owl-item img').length, 
                count_img = 0,
                flagLoadComplete = 0;

            $('#popup-gallery .owl-item img').load(function(){
                count_img += 1;
                if (count_img == len_img) {
                    var countShowPopup = 0;
                    $('#popup-gallery .owl-item img').each(function(){
                        countShowPopup+=1;
                        $obj.centerBox(this);
                        if(countShowPopup == len_img) 
                            $obj.showPopup('#popup-gallery');
                    });

                    return false;
                } else {
                    console.log('loading...');
                }
            }).error(function(){
                console.log('Error load image!');
            }).each(function(){
                if(this.complete){
                    flagLoadComplete = 1;
                }
            });
            if(flagLoadComplete == 1){
                $('#popup-gallery').css({
                    visibility: 'visible',
                    display: 'block'
                });
            }
            
    },
    loadGallery: function(id){
        var $id = $(id);
        $id.before('<span class="loadingIcon">&nbsb;</span>');
        $('.loadingIcon').css({
            position: 'absolute',
            height: '100%',
            width: '100%',
            top: 0,
            left:0,
            background: 'url(../kelreport/css/images/icons/loader.gif) no-repeat center',
            'text-indent': '-9999px'
        });
    },
    changeTab: function(tab, tab_common, box_show){
        var $tab = $(tab),
            $box_show = $(box_show),
            $tab_common = $(tab_common),
            id_tab = $tab.attr('rel');
        $tab_common.removeClass('active');
        $tab.addClass('active');
        $box_show.hide();
        $('#'+id_tab).fadeIn('fast');
    },
    resizePopup: function(){
        var hWindow = $(window).outerHeight();
        $('#popup-gallery .owl-item img').each(function(){
            $obj.centerBox(this);    
        });
        $('html, body').css({
            height: hWindow
        });    
    },
    centerBox: function(item){
        var $item = $(item),
            wWindow = $(window).outerWidth(),
            hWindow = $(window).outerHeight(),
            hItem = $item.height(),
            cItem = hWindow/2 - hItem/2;
        if(cItem > 0) $item.css('margin-top',cItem+'px');
        else $item.css('margin-top','0');
    },
    loadJsonOurTeam: function(idPerson, itemLoad){
        var id = idPerson, topSlide = window.scrollY;
        $obj.loadGallery(itemLoad);

        $.getJSON('js/ourTeam.json', function(data) {
            $.each(data, function(key, val){
                if(id == key){
                    var $wrap = $('#page-next-about'),
                        $wrap_per = $wrap.find('.wrap-per'),
                        $content = $wrap.find('.content-about');

                    $wrap_per.find('h2').text(val.name);
                    $wrap_per.find('span').text(val.position);
                    $wrap_per.find('img').attr('src',val.image);
                    $content.html(val.content.vn_lang);
                    
                    $wrap_per.find('img').load(function(){
                        $('.loadingIcon').remove();
                        var hBlockOurTeam = $('#page-next-about').outerHeight();
                        $('html,body').height(hBlockOurTeam);
                        $wrap.removeClass('hide').addClass('show');
                        $('#wrapper-our-team').removeClass('show').addClass('hide');
                        /*var hBlockOurTeam = $('#page-next-about').outerHeight();
                        $('html,body').height(hBlockOurTeam);*/
                        /*setTimeout(function(){
                            //$obj.scrollHeader();
                            $wrap.show();
                        },900);*/
                        
                        //$wrap.css('top',window.scrollY+'px');
                        
                    }).error(function(){
                        alert("Image not found");
                        $wrap.addClass('show_detail').removeClass('hide_detail');
                    }).each(function(){
                        
                    });
                    
                    return false;
                }else{}
            });
        });
    },
    loadOurTeamList: function(item){
        var $item = $(item);
        $.getJSON('js/ourTeam.json', function(data) {
            $.each(data, function(key, val){
                var $list = $('<li><a rel="'+key+'" href="#"><img src="'+val.image+'"></a></li>');
                $item.append($list);
            });        
            $('.wrap-content-person').fadeIn('fast', function() {
                $(this).css('visibility','visible');
            });
            /*var hBlockOurTeam = $('.wrap-content-person .container-person').outerHeight();
            $('.page-aboutus').height(hBlockOurTeam);*/
        });
    }
}
$(window).resize(function(){
    if($('#popup-gallery').is(':visible')){
        $obj.resizePopup();
        $obj.loadImgGallery();    
    }
});
$(document).ready(function(){
    if($('.wrap-content-person').length > 0){
        $obj.loadOurTeamList('.page-aboutus .list_member ul');
        $('.page-aboutus .list_member ul li a').live('click',function(){
            $obj.loadJsonOurTeam($(this).attr('rel'),this);
            return false;
        });
        $('#page-next-about .btn-back-page').live('click',function(){
            $('#page-next-about').removeClass('show').addClass('hide');
            $('#wrapper-our-team').removeClass('hide').addClass('show');
            var hBlockOurTeam = $('.wrap-content-person .container-person').outerHeight();
            $('html,body').css('height','auto');
            return false;
        });
    }
    $('.social-block ul li.icon-email a').click(function(){
        $obj.showPopup('#popup-email');
    });
    $('header #wap-menu').click(function(){
        setTimeout(function(){
            $('.menu-top').toggleClass('hide').toggleClass('show');
            //$('.menu-top').toggle();
        },200);
        return false;
    });
    $('.menu-top ul li.has-submenu > .show-more-menu').click(function(){
        $('.menu-top ul li.has-submenu > .show-more-menu').removeClass('change-icon');
        if($(this).parent().find('.block-submenu').hasClass('show')){
            $(this).parent().find('.block-submenu').removeClass('show').addClass('hide');
        }else{
            $('.block-submenu').removeClass('show').addClass('hide');
            $(this).addClass('change-icon');
            $(this).parent().find('.block-submenu').addClass('show');
        }

        return false;
    });
    $('.search-header .search-icon').click(function(){
        $('.search-header .box-search-show').addClass('show');
        //return false;
    });
    $('.search-header .box-search-show .close_search').click(function(){
        $('.search-header .box-search-show').removeClass('show');
        return false;
    });
    $('#wap-menu-footer').click(function(){
        $obj.scrollHeader('.menu-top');
    });
    $('.search-footer span').click(function(){
        $obj.scrollHeader('.search-header .box-search-show');
    });
    $('.show-popup-gallery a').live('click',function(){
        var $this = $(this),
            $domImg = $this.parents('article').find('.slider-show'),
            htmlImg = $domImg.clone().html();
        if($('#popup-gallery').html() == ''){
            $('#popup-gallery').html(htmlImg);    
            $obj.loadImgGallery();
        }else{
            $obj.showPopup('#popup-gallery');
        }
        
        return false;
    });

    $('.icon-touch').bind("touchstart", function(ev) {
        $(this).addClass('start-touch-icon');
        
    }).bind('touchend',function(e){
        var $this = $(this);
        setTimeout(function(){
            $this.removeClass('start-touch-icon');    
        },100);
        
    });
    $('#popup-gallery .close-popup').live('click',function(ev){
        ev.preventDefault();
        $obj.hidePopup('#popup-gallery');
    });
    $('#popup-email .close-popup').live('click',function(ev){
        ev.preventDefault();
        $obj.hidePopup('#popup-email');
    });
    
    if (navigator.userAgent.indexOf('MSIE') != -1 || navigator.appVersion.indexOf('Trident/') > 0) {
        $('head').append('<link type="text/css" href="'+urlCommonCSS+'ie.css" rel="stylesheet">');
    }
    $('.block-tab-items .tab-common ul.list-cmt-pro li .detail-acti .cmt-common').click(function(){
        if($(this).parents('li').find('.block-cmt-pro').hasClass('show')){
            $(this).parents('li').find('.block-cmt-pro').removeClass('show').addClass('hide');
        }else{
            $('.block-cmt-pro').removeClass('show').addClass('hide');
            $(this).parents('li').find('.block-cmt-pro').addClass('show');
        }
        return false;
    });
    $('.social-block ul li.icon-map a').click(function(){
        //$(window).scrollTop(0);
        $obj.showPopup('#popup-wheretobuy');
        return false;
    });
    $('.top-wheretobuy .close-popup').click(function(ev){
        ev.preventDefault();
        $obj.hidePopup('#popup-wheretobuy');
    });
    $('#tab-friends .list-tab-friends li a').click(function(){
        $obj.changeTab(this,'#tab-friends .list-tab-friends li a','.tab-friends-common');
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
    $('#tab-find-friends .find-face-friend ul.list-tab-face li a').click(function(){
        $obj.changeTab(this,'#tab-find-friends .find-face-friend ul.list-tab-face li a','.tab-face-connect');
        return false;
    });
});
/*function Person(gender){
    this.gender = gender;
}
Person.prototype.sayGender = function(){
    alert(this.gender);
}
var person1 = new Person('Male');
var person2 = person1.gender;*/