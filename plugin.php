<?php
/*
Plugin Name: Remove Oversized srcset Values
Plugin URI: https://github.com/jeremyfelt/remove-oversized-srcset-values
Description: Filter an image's srcset values to remove those larger than requested.
Version: 0.0.1
Author: jeremyfelt
Author URI: https://jeremyfelt.com
License: GPLv3 or later
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// This plugin, like WordPress, requires PHP 5.6 and higher.
if ( version_compare( PHP_VERSION, '5.6', '<' ) ) {
	add_action( 'admin_notices', 'remove_oversized_srcset_values_admin_notice' );
	/**
	 * Display an admin notice if PHP is not 5.6.
	 */
	function remove_oversized_srcset_values_admin_notice() {
		echo '<div class=\"error\"><p>';
		echo __( 'The Remove Oversized srcset Values WordPress plugin requires PHP 5.6 to function properly. Please upgrade PHP or deactivate the plugin.', 'rosv' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '</p></div>';
	}

	return;
}

require_once __DIR__ . '/includes/remove-oversized-srcset-values.php';
