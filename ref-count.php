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
		'title'  => 'Ref +',
		'meta'   => array('class' => 'ref-count'),
	) );

  $wp_admin_bar->add_node($args);
}

add_action( 'admin_bar_menu', 'ref_counter_menu', 999 );

function ref_counter_enqueue(){
	wp_enqueue_script( 'ga', plugin_dir_url( __file__ ) . 'ga.js', array('jquery'), '20130124', true );
	wp_enqueue_script( 'ref-count', plugin_dir_url( __file__ ) . 'ref-count.js', array('jquery', 'ga'), '20130124', true );
	wp_enqueue_style( 'ref-count', plugin_dir_url( __file__ ) . 'ref-count.css', '20130124' );
}
add_action( 'admin_bar_init', 'ref_counter_enqueue' );