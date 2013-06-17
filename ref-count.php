<?php
/*
Plugin Name: Ref-Counter
Description: A simple, one-click counter.
Version: 20130201
Plugin URI: http://library.milliagn.edu/
Author: Jack Weinbender
Author URI: https://github.com/jackweinbender
*/

function ref_counter_menu( $wp_admin_bar ) {
  global $wp_admin_bar;

	$wp_admin_bar->add_menu( array(
		'parent' => 'top-secondary',
		'id'     => 'ref-count',
		'title'  => '<a id="ref-count">Ref +</a>',
	) );

  $wp_admin_bar->add_node($args);
}

add_action( 'admin_bar_menu', 'ref_counter_menu', 999 );

function ref_counter_add_js(){
	if(is_user_logged_in()){?>

<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-4045275-3' ]);
	
	jQuery(document).ready(function(){

		var category = 'reference';
		var action = jQuery( '.display-name' ).html();
		var label = '';
		var count = 0;

		jQuery('#ref-count').mousedown(function(){
			count = count + 1;
			var today = new Date();
			label = 'Hour' + today.getHours();
			_gaq.push(['_trackEvent', category , action, label]);
			jQuery('#wp-admin-bar-ref-count').addClass('sent');
			jQuery('#ref-count').html('Ref + ' + count);
		});
		jQuery('#ref-count').mouseup(function(){
				jQuery('#wp-admin-bar-ref-count').removeClass('sent');
		});
	});
</script><?php 
	}
}

add_action( 'wp_footer', 'ref_counter_add_js');
add_action( 'admin_footer', 'ref_counter_add_js');

function ref_counter_enqueue(){
	wp_enqueue_style( 'ref-count', plugins_url( 'ref-count.css' , __FILE__ ), '20130124' );
}

add_action( 'admin_bar_init', 'ref_counter_enqueue' );