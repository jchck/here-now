<?php

/*
Plugin Name:        Here & Now
Plugin URI:         https://github.com/jchck/here-now
Description:        Plugin to host/manage Here & Now Podcast
Version:            0.1.0
Author:             jchck_
Author URI:         https://justinchick.com/
License:            MIT License
License URI:        http://opensource.org/licenses/MIT
*/

add_action( 'init', 'herenow_pod_rss');
function herenow_pod_rss(){
	add_feed( 'here-now', 'herenow_feed' );
}

function herenow_feed(){
  require_once( dirname( __FILE__ ) . '/templates/rss.php' );
}

require_once __DIR__ . '/lib/cpt.php';

require_once __DIR__ . '/lib/metaboxes.php';