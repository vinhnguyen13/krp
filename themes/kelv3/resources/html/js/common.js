$(window).on('load', function () {
    $('.popup-common').appendTo('body');
});
$(document).ready(function () {
    $(document).on('show.bs.modal', '.modal', function () {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });

    $(document).on('hidden.bs.modal', '.modal', function () {
        $('.modal:visible').length && $(document.body).addClass('modal-open');
    });

    menuMobile();

    function menuMobile () {
        $('.toggle-menu').on('click', function (e) {
            e.preventDefault();
            var itemClone = $('.inner-menu').clone();
            itemClone.addClass('clone-menu-left');
            $('body').prepend(itemClone);
            itemClone.show();
            setTimeout(function () {
                $('html').addClass('menu-left');
                setTimeout(function () {
                    $('#container').addClass('menu-left-slide');
                    $('body').append('<div class="outsite-menu"></div>');
                    $('.outsite-menu').velocity("fadeIn", { duration: 500 });
                    $('.outsite-menu').on('click', function () {
                        $('html').removeClass('menu-left');
                        $(this).velocity("fadeOut", {
                            duration: 500,
                            complete: function () {
                                $('.outsite-menu,.clone-menu-left').remove();
                                $('#container').removeClass('menu-left-slide');
                            }
                        });
                    });
                },100);
            },150);
        });
    }

    toggleSub();

    function toggleSub () {
        $(document).on('click', '.clone-menu-left>ul>li:not(.user-auth)>a', function (e) {
            e.preventDefault();

            var _this = $(this),
                rootItem = _this.parent();

            $('.clone-menu-left>ul>li').removeClass('show-sub');
            $('.clone-menu-left .sub-cate').velocity("slideUp", { duration: 100 });
            rootItem.find('.sub-cate').velocity("slideDown", { duration: 300 });
            rootItem.addClass('show-sub');
        });
    }

    function toggleTopHeader (valScroll) {
        var hHeader = $('header').outerHeight(),
            itemToggle = $('.ads-top-header'),
            flag = false;

        if ( valScroll > hHeader ) {
            itemToggle.addClass('active');
        }else {
            itemToggle.removeClass('active');
        }
    }

    function scrollTopBtn (valScroll) {
        var hW = $(window).outerHeight();

        if ( valScroll >= hW ) {
            $('#gotop').removeClass('show-hide');
        }else {
            $('#gotop').addClass('show-hide');
        }
    }

    $('#gotop').on('click', function (e) {
        e.preventDefault();
        var body = $("html, body");
        body.velocity("scroll", { offset: "0px" });
    });

    $(window).on('scroll', function () {
        var valScroll = $(this).scrollTop();
        
        toggleTopHeader(valScroll);
        scrollTopBtn(valScroll);

    });
});
$.fn.dropdown_emu = function (options) {

    return this.each(function() {
        var defaults = {
            
        },
        settings,
        el = $(this);

        if ( el.length == 0 ) return el;

        settings = $.extend({}, defaults, options);

        el.find('.item-click').on('click', toggleView);

        function toggleView (e) {
            e.preventDefault();
            var _this = $(this);

            if ( _this.hasClass('active') ) {
                _this.removeClass('active');
                el.find('.item-drop').hide();
            }else {
                el.find('.item-drop').show();
                _this.addClass('active');
            }
        }
        hideElOutSite(el, function () {
            el.find('.item-drop').hide();
            el.find('.item-click').removeClass('active');
        });
    });
}
function hideElOutSite (el, callBackItem) {
    $(document).on('click', function (e) {
        var container = $(el);
        if ( !container.is(e.target) && container.has(e.target).length === 0 ) {
            callBackItem();
        }
    });
}