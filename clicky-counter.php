<?php
/*
Plugin Name: Clicky-Counter
Description: A simple, one-click counter.
Version: 20130122
Plugin URI: http://library.milliagn.edu/
Author: Jack Weinbender
Author URI: http://library.milligan.edu/
*/

function toolbar_link_to_mypage( $wp_admin_bar ) {
  global $wp_admin_bar;

	$wp_admin_bar->add_menu( array(
		'parent' => 'top-secondary',
		'id'     => 'ref-count',
		'title'  => '<a href="#" class="ref-count">Ref +</a>',
	) );

  $wp_admin_bar->add_node($args);
}

add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );



/* Add AJAXURL variable to the js codebase **/

function add_ajaxurl() {
	$script  = '<script type="text/javascript">';
	$script .= 'var ajaxurl = "' . admin_url('admin-ajax.php') .'";';
	$script .= '</script>';

	echo $script;
}

add_action('wp_head','add_ajaxurl');

/** Add AJAX function for success/failure **/

function ref_count_callback(){

$working_dir = 'wp-content/uploads/counter-assets/';
    if(!is_dir($working_dir)) {
        wp_mkdir_p($working_dir);
    }

$filename = $working_dir . 'db_' . date('MY') . '.txt';
$somecontent = date('M-d-Y h:i:s A') . ', ' . "Jack\n";

// Let's make sure the file exists and is writable first.
    $local_file_path = $working_dir . '/' . date('YM') . '.txt';
        $local_image_file = fopen($local_file_path, 'a');
        chmod($local_file_path ,0777);
        fwrite($local_image_file, $somecontent);
        fclose($local_image_file);
    }
add_action('wp_ajax_ref_count_callback', 'ref_count_callback');
add_action('wp_ajax_nopriv_ref_count_callback', 'ref_count_callback');


// **************************************************** //


function clicky_enque(){
	wp_enqueue_script( 'clicky-counter', plugin_dir_url( __file__ ) . 'clicky-counter.js', array( 'jquery' ), 20130122, true );
	wp_enqueue_style( 'clicky-counter', plugin_dir_url( __file__ ) . 'clicky-counter.css', '20130122' );
	}

// Add style/script to pages
add_action('wp_enqueue_scripts', 'clicky_enque');

// Add style/script to admin area
add_action('admin_enqueue_scripts', 'clicky_enque');






// CREATE TABLE  `wp_ref_counter` (
//  `id` INT( 255 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
//  `staff_member` VARCHAR( 255 ) NOT NULL ,
//  `timestamp` TIMESTAMP( 255 ) NOT NULL
// ) ENGINE = INNODB;

?>