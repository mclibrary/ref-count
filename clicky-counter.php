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
  $args = array(
    'id' => 'my_page',
    'title' => 'My Page',
    'href' => 'http://mysite.com/my-page/',
    'meta' => array('class' => 'my-toolbar-page')
  );

  $wp_admin_bar->add_node($args);
}

?>