$(function(){
	removeGarage();
});



function removeGarage(){
	$(".profile-right .info").on("click", ".btn-remove", function(event){
		$('body').loading();
		var art = $(this).attr('art');
		var stt = $(this).attr('stt');
		var link = $(this);
		if(art){
			$.ajax({
		        type: "POST",
		        url: '/product/garageupdate',
		        data: {art: art, stt: stt},
		        success: function(data){
		        	link.closest("li.item").remove();
		        	$('body').unloading();
		        },
		        dataType: 'html'
		    });
		}
		return false;
	});
}


var garage = {
		show_more: function(){
			$(this).loading();
			var page = $('.block-garage').attr('page');
			if(page != 'end'){
				var url = $('.block-garage').attr('data-url') + '?page=' + page;
				$.ajax({
					type: "GET",
					url: url,
					success: function(data){
						if(data == 'end'){
							$('.see-more').hide();
							//@todo: show popup error
						} else {
							//get next_page
							var next_page =   $(data).filter('#next_page').attr('page');
							if(next_page == 0){
								$('.see-more').hide();
							} else {
								$('.block-garage').attr('page', next_page);
							}
						}
						$('.block-garage').append(data);
						$(this).unloading();
					},
					dataType: 'html'
				});
			} else {
				$('.see-more').hide();
				$(this).unloading();
			}
		},	
		
};
