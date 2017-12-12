function load_data(table,url)
{
	var exist = $('#'+table).length;
	//var lang_url = $('#hd_base_url').val()+'back/translate_label/get_table_label';
	
	if(exist){ 
		var dttable = $('#'+table).dataTable({		
			//"sDom": '<"top"f>rt<"bottom"ipl><"clear">',
			"bProcessing": true,
			"bServerSide": true,
			"bSort": false,
			"sServerMethod": "GET",
			"sPaginationType": "bootstrap",
			"sAjaxSource": url,
			"iDisplayLength": 5,
			"bStateSave": true,
			/*"oLanguage":
				{
      					"sUrl": lang_url
    			},*/
			"aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
		}).fnSetFilteringDelay(500);
	}
}
function load_data_with_filter(table,url,filter,fnDrawCallback)
{
	//var lang_url = $('#hd_base_url').val()+'back/translate_label/get_table_label';
	var exist = $('#'+table).length;
	if(!exist) return;
	var option = {
			"sDom": '<"top"f>rt<"bottom"ipl><"clear">',
			"bProcessing": true,
			"bServerSide": true,
			"bSort": false,
			"sServerMethod": "GET",
			"sPaginationType": "bootstrap",
			"sAjaxSource": url,
			"iDisplayLength": 5,
			"bStateSave": true,
			// "oLanguage":
			// 	{
   //    					"sUrl": lang_url
   //  			},
			"aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
	};
	if(typeof(filter) !='undefined')
	{
		option.fnServerData=filter;
	}
	if(typeof(fnDrawCallback)!='undefined')
	{
		option.fnDrawCallback = fnDrawCallback;
	}
	$('#'+table).dataTable(option).fnSetFilteringDelay(500);

}

function show_notification(message) {
	alertify.set({
		delay : 2500,
		buttonReverse : false,
		buttonFocus   : "ok"
	});
	alertify.log(message);
}

function is_image(img_control){
	var valid = false;
	var full = $('#'+img_control).val();
	var ext = full.substring(full.length-3);
	switch(ext){
		case 'jpg':
		case 'png':
		case 'jpeg':
		case 'gif':
		case 'bmp':
			valid = true;
		break;
		default:
			valid = false;
		break;
	}
	return valid;
}

function translate_label(label_id, lang_id){	
	var str = label_id.split(",");
	var URL = $('#hd_base_url').val()+'back/translate_label/load_translate';
	$.post(URL,{lid : lang_id, labels : label_id},function(res){	
		for(i=0; i<res.length; i++){
			if($('#'+str[i]).length >0){
				$('#'+str[i]).html(res[i].translate_language);
			}
		}
	},'json');
}

function $id(id)
{
	return document.getElementById(id);
}
$(document).ready(function(){
	/*$('.datepicker').datepicker({format: 'dd.mm.yyyy',autoclose: true}).
	on('changeDate', function (ev) {
	$(this).datepicker('hide');*/

});
	//$.validator.setDefaults({ ignore: ":hidden:not(select)" });//change ignor on hidden item to false
	/*$('#cre_form').parsley({
			successClass: "",
		    errorClass: "",
		    classHandler: function (el) {
		    	/*console.log(el.$element.closest('.form-group'));*/
		       /* return el.$element.closest(".form-group");
		    },
		    errorsContainer: function (el) {
		        return el.$element.closest(".form-group");
		    },
		    errorsWrapper: "<span class='help-block'></span>",
		    errorTemplate: "<span></span>"
		});*/
	/**
	'hide show button remove image
	*/
		// var showing = false;
		// $('.btn-remove').live('mouseover',function(){
		// 	$(this).addClass('activated');

		// }).live('mouseout',function(){
		// 		/*$(this).hide();*/
		// 		$(this).removeClass('activated');
		// });
		

		// $('.image-wrapper img').live('mouseover', function(){
		// 	$(this).parent().find('.btn-remove').show();
			
			
		// }).live('mouseout',function(){
		// 	var that = this;
		// 	setTimeout(
		// 	 function()
		// 	 {
			 	
		// 	 	$(that).parent().find('.btn-remove').each(function(){
			 		
		// 	 		if(!$(this).hasClass('activated'))
		// 	 		{
		// 	 			$(this).hide();
		// 	 		}
		// 	 	});

		// 	}, 100);
			
		// 	//
		// });
	
//});
