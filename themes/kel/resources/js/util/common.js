$(function(){
	Util.uiloading();
});

var Util = {
	uiloading: function (options) {
		if($('.loading .cont').length > 0){
			$('.loader').remove();
		}
		$.fn.loading  = function(options) {
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
		$.fn.unloading  = function(options) {
			$('.loader').remove();
		};
    },
}



