<?php
/*
Plugin Name: Ref-Counter
Description: A simple, one-click counter.
Version: 20130122
Plugin URI: http://library.milliagn.edu/
Author: Jack Weinbender
Author URI: http://library.milligan.edu/
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

		var category = 'ref-count';
		var action = 'click';
		var label = jQuery( '.display-name' ).html();

		jQuery('#ref-count').click(function(){
			// _gaq.push(function(){
			// 	jQuery('#wp-admin-bar-ref-count').toggleClass('sent');
			// });
			_gaq.push(['_trackEvent', category , action, label]);
		});
	});
</script><?php 
	}
}

add_action( 'wp_footer', 'ref_counter_add_js');
add_action( 'admin_footer', 'ref_counter_add_js');

function ref_counter_enqueue(){
	wp_enqueue_style( 'ref-count', plugin_dir_url( __file__ ) . 'ref-count.css', '20130124' );
}

add_action( 'admin_bar_init', 'ref_counter_enqueue' );