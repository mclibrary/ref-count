jQuery(document).ready(function(){
	jQuery('.ref-count').click(function(){
		var category = 'ref-count';
		var action = 'click';
		var label = jQuery( '.display-name' ).html();
		_gaq.push(['_trackEvent', category , action, label]);
	});
});