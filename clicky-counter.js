jQuery(document).ready(function(){

	jQuery('.ref-count').click(function(){
		jQuery( this ).addClass('ref-sent');
		send_ajax_request();
	});


function send_ajax_request(){
	//var ajaxurl = 'http://localhost:9637/wp-admin/admin-ajax.php'; 
	var data = {
		action: 'ref_count_callback',
	};

	// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	jQuery.post(ajaxurl, data, function(response) {
			if (!response){
				console.log('FALSE');
			} else {
				console.log(response);
			}
	});
}

});

