<?php

class MMM_DisableLogins {


	public function __construct() {
	}

	public function disable_logins() {

		global $current_user;

		if ( ! current_user_can( 'manage_network' ) )
			wp_redirect( home_url() );

	}

	public function admin_notice( $wp_admin_bar ) {

		$args = array(
			'id' => 'maintenance_notice',
			'title' => 'This site is in maintenance mode. The admin area is temporarily unavailable. Click for more info.',
			'href' => 'http://agrilife.org/communications',
			'meta' => array( 'class' => 'maintenance-mode' ),
		);

		$wp_admin_bar->add_node( $args );

	}

}