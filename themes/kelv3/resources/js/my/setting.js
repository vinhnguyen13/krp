var Setting = {
	init: function () {
		Setting.privacySetting();
		Setting.saveSetting();
	},
	saveSetting: function(){
		$('#bt-save-settings').click(function(){
			$('body').loading();
			
			if($('#SettingForm_fullname').val() == ''){
				Util.popAlertSuccess(tr("Please input fullname!"), 300);  
    	        $('body').unloading();
    	        return false;				
			}
			
			if($('#SettingForm_current_password').val() == '' && ($('#SettingForm_new_password').val() != $('#SettingForm_retype_new_password').val())){
				Util.popAlertSuccess(tr("Please input current password!"), 300);
    	        $('body').unloading();		
    	        return false
			}
			if($('#SettingForm_current_password').val() != '' && ($('#SettingForm_new_password').val() != $('#SettingForm_retype_new_password').val())){
				Util.popAlertSuccess(tr("Re-type New Password is incorrect!"), 300);
    	        $('body').unloading();		
    	        return false
			}			
			if($('#SettingForm_current_password').val() != '' && ($('#SettingForm_new_password').val() == '' ||  $('#SettingForm_retype_new_password').val() == '')){
				Util.popAlertSuccess(tr("Re-type New Password is incorrect!"), 300);
    	        $('body').unloading();		
    	        return false
			}
  	        setTimeout(function () {
   	         $( ".pop-mess-succ" ).pdialog("close");
   	        }, 2000);
  	        
			var data	=	{
					'SettingForm[current_password]':	$('#SettingForm_current_password').val(),
					'SettingForm[fullname]':	$('#SettingForm_fullname').val(),
					'SettingForm[new_password]':	$('#SettingForm_new_password').val(),
					'SettingForm[retype_new_password]':	$('#SettingForm_retype_new_password').val(),
			};
	        $.ajax({
		        type: "POST",
		        data: data,
		        url: '/setting/index',
		        dataType: 'json',
		        success: function(data){
		        	if(data.status){
		        		Util.popAlertSuccess(tr("Changes successfully saved!"), 300);
		        	}else{
		        		if(data.current_password){
		        			Util.popAlertSuccess(tr("Current password not correct!"), 300);
		        		}
		        	}
	    	        setTimeout(function () {
	    	         $( ".pop-mess-succ" ).pdialog("close");
	    	        }, 2000);  
	    	        
		        	$('body').unloading();
		        },
		    });
			
			
		});
	},
	privacySetting: function () {	
		$('.tab-privacy lable').click(function(){
			$('body').loading();
	        var $this = $(this);
	        var $type = $this.attr('data-type');
	        var $url = $this.attr('data-url');
	        var $val = 0;
	        if($this.hasClass('on-status')){
	            $this.animate({backgroundPosition:'-96px -477px'}, 500, 'easeOutExpo', function(){
	                $this.removeClass('on-status').addClass('off-status');
	            });
	            var $val = 0;
	        }else{
	            $this.animate({
	                'background-position': '-57px -477px'
	            },500,'easeOutExpo', function(){
	                $this.removeClass('off-status').addClass('on-status');
	            });
	            var $val = 1;
	        }
	        $.ajax({
		        type: "POST",
		        data: {type: $type, val: $val},
		        url: $url,
		        dataType: 'html',
		        success: function(data){
		        	$('body').unloading();
		        },
		    });
	        //return false;
	    });
	}
}

