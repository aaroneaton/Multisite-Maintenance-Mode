<div class="wrap">

	<?php screen_icon( 'options-general' ); ?>
	<?php
	if ( $_POST ) {
		check_admin_referer( 'siteoptions' );

		if ( isset( $_POST['mmm-status'] ) ) {
			$value = stripslashes_deep( $_POST['mmm-status'] );
			update_site_option( 'mmm-status', $value );
		}

		if ( isset( $_POST['mmm-message'] ) ) {
			$value = stripslashes_deep( $_POST['mmm-message'] );
			update_site_option( 'mmm-message', $value );
		}

		if ( isset( $_POST['mmm-link'] ) ) {
			$value = stripslashes_deep( $_POST['mmm-link'] );
			update_site_option( 'mmm-link', $value );
		}


		wp_redirect( add_query_arg( 'updated', 'true', network_admin_url( 'settings.php?page=multisite-maintenance-mode' ) ) );
	}
	?>
	<h2><?php _e( 'Multisite Maintenance Mode', 'multisite-maintenance-mode' ); ?></h2>

	<form method="post" action="settings.php?page=multisite-maintenance-mode">
		<?php wp_nonce_field( 'siteoptions' ); ?>
		<h3><?php _e( 'Toggle Maintenance Mode', 'multisite-maintenance-mode' ); ?></h3>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="mmm-status"><?php _e( 'Set maintenance mode status', 'multisite-maintenance-mode' ); ?></label></th>
				<?php
				if ( ! get_site_option( 'mmm-status' ) )
					update_site_option( 'mmm-status', 'off' );
				$status = get_site_option( 'mmm-status' );
				?>
				<td>
					<label><input name="mmm-status" type="radio" id="mmm-status-off" value="off" <?php checked( $status, 'off' ); ?> /> <?php _e( 'Off', 'multisite-maintenance-mode' ); ?></label><br />
					<label><input name="mmm-status" type="radio" id="mmm-status-on" value="on" <?php checked( $status, 'on' ); ?> /> <?php _e( 'On', 'multisite-maintenance-mode' ); ?></label><br />
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="mmm-message"><?php _e( 'Admin bar message', 'multisite-maintenance-mode' ); ?></label></th>
				<?php
				$message = get_site_option( 'mmm-message' );

				if ( ! $message )
					$message = '';
				?>
				<td>
					<label><input name="mmm-message" type="text" id="mmm-message" value="<?php echo $message; ?>" /></label>
			</tr>
			<tr>
				<th scope="row"><label for="mmm-link"><?php _e( 'URL to your announcement page', 'multisite-maintenance-mode' ); ?></label></th>
				<?php
				$link = get_site_option( 'mmm-link' );

				if ( ! $link )
					$link = '';
				?>
				<td>
					<label><input name="mmm-link" type="text" id="mmm-link" value="<?php echo $link; ?>" /></label>
			</tr>
		</table>
		<?php submit_button(); ?>
	</form>
	
</div><!-- .wrap -->
