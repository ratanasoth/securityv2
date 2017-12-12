/* ---- Ajax Request ---- */

function ajax_load_content(URL, param, element_replace){
	var AJAX_URL = $('#hd_base_url').val()+URL;
	$.post(AJAX_URL, {param : param}, function(result){
		$('#'+element_replace).html(result);
	});
}

function ajax_load_data(URL, params, element_replace){
	var AJAX_URL = $('#hd_base_url').val()+URL;
	$.post(AJAX_URL, params, function(result){		
		$('#'+element_replace).html(result);
	});
}

function ajax_chosen(URL, params,element_replace){
	var AJAX_URL = $('#hd_base_url').val()+URL;
	console.log(element_replace);

	$.post(AJAX_URL, params,function(result){
		$('#'+element_replace).children().remove();		
		$('#'+element_replace).html(result);
        $("#"+element_replace).trigger("chosen:updated");
	});
}
