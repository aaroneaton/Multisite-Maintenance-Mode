<?php
/**
 * Uninstall script.
 *
 * @package  Multisite_Maintenance_Mode
 */

// If uninstall.php is not called by WordPress, abort.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	return;
}

delete_site_option( 'mmm-status' );
