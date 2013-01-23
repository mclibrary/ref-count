<?php
/*
Plugin Name: Clicky-Counter
Description: A simple, one-click counter.
Version: 20130122
Plugin URI: http://library.milliagn.edu/
Author: Jack Weinbender
Author URI: http://library.milligan.edu/
*/

add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );

function toolbar_link_to_mypage( $wp_admin_bar ) {
  global $wp_admin_bar;

	$form  = '<form action="" method="get" id="ref-count-form">';
	$form .= '<label for="ref-count-text-input">Ref+</label>';
	$form .= '<input id="ref-count-text-input" type="text" />';
	$form .= '<input type="submit" />';
	$form .= '</form>';


	$wp_admin_bar->add_menu( array(
		'parent' => 'top-secondary',
		'id'     => 'ref-count',
		'title'  => $form,
		'meta'   => array(
			'class'    => 'ref-count',
			'tabindex' => -2,
		)
	) );

  $wp_admin_bar->add_node($args);
}


function clicky_enque_style(){
	//wp_enqueue_script( 'clicky-counter', plugin_dir_url( __file__ ) . 'clicky-counter.js', array( 'jquery' ), 20130122, true );
	wp_enqueue_style( 'clicky-counter', plugin_dir_url( __file__ ) . 'clicky-counter.css', '20130122' );
	}

add_action('wp_enqueue_scripts', 'clicky_enque_style');
add_action( 'admin_enqueue_scripts', 'clicky_enque_style' );
?>