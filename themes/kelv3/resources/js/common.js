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