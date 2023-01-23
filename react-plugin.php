<?php

/*
 * Plugin Name:       React Plugin
 * Plugin URI:        https://everaldo.dev/plugins/react-plugin/
 * Description:       WordPress plugin with React.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Everaldo Matias
 * Author URI:        https://everaldo.dev/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://everaldo.dev/plugins/react-plugin/
 * Text Domain:       react-plugin
 * Domain Path:       /languages
 */

function react_plugin_block_init() {
	register_block_type(
		__DIR__ . '/build',
		['render_callback' => 'react_plugin_render_block']
	);
}

function react_plugin_render_block() {
	wp_enqueue_script(
		"react-plugin-frontend",
		plugin_dir_url( __FILE__ ) . "/build/frontend.js",
		["wp-element"],
		"0.1.0",
		true
	);

	return "<div class='react-plugin'></div>";
}

add_action( 'init', 'react_plugin_block_init' );
