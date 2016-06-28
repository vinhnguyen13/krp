var Comment = {
	articleComment: function () {
		$( ".btn-cmt" ).on( "click", function(e) {
			e.preventDefault();
			var item = $("#comment-form");
			var data = item.serialize();
			$('body').loading();
			$.ajax({
				type: 'POST',
				url: item.attr('action'),
			  	data:data,
			  	dataType:'html',
				success:function(response){
					$('.list-cmt').prepend(response);
					$('#Comment_content').val('');
					$('body').unloading();
					
			    },
			 });
		});
		
		
		$(".text-cmt").on("keydown", ".cmt-post-text", function(e){
			if (e.which == 13 && !e.shiftKey){
				e.preventDefault();
				var item = $("#comment-form");
				var data = item.serialize();
				$('body').loading();
				$.ajax({
					type: 'POST',
					url: item.attr('action'),
				  	data:data,
				  	dataType:'html',
					success:function(response){
						$('.comment-list').prepend(response);
						$('#Comment_content').val('');
						$('body').unloading();
						
				    },
				 });
			}
		});
	},
}

