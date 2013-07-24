<div class="wrap">

	<?php screen_icon( 'options-general' ); ?>
	<?php
	if ( $_POST ) {
		check_admin_referer( 'siteoptions' );

		if ( isset( $_POST['mmm-status'] ) ) {
			$value = stripslashes_deep( $_POST['mmm-status'] );
			update_site_option( 'mmm-status', $value );
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
		<h3>Toggle Maintenance Mode</h3>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="mmm-status">Set maintenance mode status</label></th>
				<?php
				if ( ! get_site_option( 'mmm-status' ) )
					update_site_option( 'mmm-status', 'off' );
				$status = get_site_option( 'mmm-status' );
				?>
				<td>
					<label><input name="mmm-status" type="radio" id="mmm-status-off" value="off" <?php checked( $status, 'off' ); ?> /> Off</label><br />
					<label><input name="mmm-status" type="radio" id="mmm-status-on" value="on" <?php checked( $status, 'on' ); ?> /> On</label><br />
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="mmm-link">URL to your announcement page</label></th>
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
