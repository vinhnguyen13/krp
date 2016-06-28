$(function(){
	Util.init();
});

var Util = {
	init: function (){
		$(".ui-widget-overlay").live("click", function (){
			$("div:ui-dialog:visible").pdialog("close");
		});
		Util.uiDialog();
        Util.uiloading();
        $('.ui-dialog-content .btn-close-dialog').live("click", function (){
            $("div:ui-dialog:visible").pdialog("close");
        });
	},
	uiDialog: function (){
		jQuery.fn.pdialog = function (options) {
			switch (options) {
				case 'close':
					this.dialog('close');
					break;
				default:
					var settings = jQuery.extend({
						autoResize: false,
//						show: "clip",
//						hide: "clip",
						minHeight: false,
						minWidth: 250,
						width: false,
						position: "absolute",
						autoOpen: false,
						modal: true,
						draggable: false,
						resizable: false,
                        overlay: { backgroundColor: "#000000", opacity: 0.5 },
					}, options);
					this.dialog(settings);
					this.dialog('open');
					break;
			}
		}
	},
	uiloading: function () {
		if($('.loading .cont').length > 0){
			$('.loader').remove();
		}
		jQuery.fn.loading  = function(options) {
			html = '<div class="loader">';
			html += '<div id="loading2" class="loading">';
			html += '<span id="outerCircle"></span>';
			html += '<span class="bg">Loading...</span>';
			html += '</div></div>';
			if($('.loading .cont').length > 0){
				$('.loading').show();
			}else{
				$('body').append(html);
			}
		};
		jQuery.fn.unloading  = function(options) {
			$('.loader').remove();
		};
    },
    uiTextLoading: function () {
    	return '<span class="txtLoading">Loading...</span>';
    },
    openWindow: function(oauthUrl){
		window.open(oauthUrl,  'newwindow', 'height=600, width=940, top=' +(screen.height)/2+ ', left=' +(screen.width-700)/2+ ', toolbar=no, menubar=no, scrollbars=no, resizable=no,location=yes, status=no');
	},
	popAlertSuccess: function(content, _wd){
		$( ".pop-mess-succ .popcont p" ).html(content);
		$( ".pop-mess-succ" ).pdialog({
			width: _wd
		});
        $('.ui-dialog-content').append('<span class="btn-close-dialog icon_common">&nbsp;</span>');
		$(".ui-dialog-titlebar").hide();
	},
	popAlertFail: function(content, _wd){
		$( ".pop-mess-fail .popcont p" ).html(content);
		$( ".pop-mess-fail" ).pdialog({
			width: _wd
		});
        $('.ui-dialog-content').append('<span class="btn-close-dialog icon_common">&nbsp;</span>');
		$(".ui-dialog-titlebar").hide();
	},
    popupLoginForm: function(id){
    	if(id){
    		popup('#' + id);
    	}
    }
}



