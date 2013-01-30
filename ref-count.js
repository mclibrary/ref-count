jQuery(document).ready(function(){

	var account_num = 'UA-4045275-3';
	_gaq.push(['_setAccount', account_num ]);
	
	jQuery('.ref-count').click(function(){
		var category = 'ref-count';
		var action = 'click';
		var label = jQuery( '.display-name' ).html();
		
		_gaq.push(function(){
			jQuery('.ref-count').addClass('sent');
		});
		_gaq.push(['_trackEvent', category , action, label]);
	});
});