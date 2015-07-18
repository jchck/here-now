<?php

/*
Plugin Name:        Here & Now
Plugin URI:         https://hereandnow.io/
Description:        A pplugin to host and manage your podcast via WordPress
Version:            0.0.0
Author:             jchck_
Author URI:         https://justinchick.com/
License:            MIT License
License URI:        http://opensource.org/licenses/MIT
*/

namespace jchck\hereNow;

add_action( 'init', 'herenow_pod_rss');
function herenow_pod_rss(){
	add_feed( 'here-now', 'here_now_feed' );
}