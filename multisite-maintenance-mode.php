<?php
/**
Plugin Name: Multisite Maintenance Mode
Plugin URI: https://github.com/channeleaton/Multisite-Maintenance-Mode
Description: Disables logins for all WordPress users except network administrators
Version: 0.1
Author: J. Aaron Eaton
Author URI: http://channeleaton.com
Author Email: aaron@channeleaton.com
License:

  Copyright 2013 J. Aaron Eaton (aaron@channeleaton.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

/**
 * @todo Rename this class to a proper name for your plugin. Give a proper description of
 * the plugin, it's purpose, and any dependencies it has.
 *
 * Use PHPDoc directives if you wish to be able to document the code using a documentation
 * generator.
 *
 * @version	0.1
 */

// Autoload the vendor classes
spl_autoload_register( 'MultisiteMaintenanceMode::vendor_autoload' );

// Autoload the plugin classes
spl_autoload_register( 'MultisiteMaintenanceMode::plugin_autoload' );

class MultisiteMaintenanceMode {

	/*--------------------------------------------*
	 * Attributes
	 *--------------------------------------------*/
	 
	/** Refers to a single instance of this class. */
	private static $instance = null;

	/** The plugin version number */
	private $version = '0.1';
	
	/** Refers to the slug of the plugin screen. */
	private $plugin_screen_slug = null;

	/** Save the plugin path for easier retrieval */
	private $path = null;

	/** The Settings Framework object */
	private $wpsf = null;

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/
	 
	/**
	 * Creates or returns an instance of this class.
	 *
	 * @return	MultisiteMaintenanceMode	A single instance of this class.
	 */
	public function get_instance() {
		return null == self::$instance ? new self : self::$instance;
	} // end get_instance;

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	private function __construct() {

		// Save the plugin path
		$this->path = plugin_dir_path( __FILE__ );

		$this->status = get_site_option( 'mmm-status' );

		// Load plugin text domain
		add_action( 'init', array( $this, 'plugin_textdomain' ) );

    /*
     * Add the options page and menu item.
     * Uncomment the following line to enable the Settings Page for the plugin:
     */
	  add_action( 'network_admin_menu', array( $this, 'plugin_admin_menu' ) );

    /**
     * If maintenance mode is on, block the admin area and notify users.
     */
		if ( $this->status == 'on' ) {
			add_action( 'admin_bar_menu', array( 'MMM_DisableLogins', 'admin_notice' ) );
			add_action( 'admin_init', array( 'MMM_DisableLogins', 'disable_logins'), 1, 2 );
		}

	} // end constructor

	/**
	 * Loads the plugin text domain for translation
	 *
	 */
	public function plugin_textdomain() {

		$domain = 'multisite-maintenance-mode';
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
		
      load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
      load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

	} // end plugin_textdomain

	/**
	 * Registers the administration menu for this plugin into the WordPress Dashboard menu.
	 */
	public function plugin_admin_menu() {
	
		add_submenu_page(
			'settings.php',
			'Multisite Maintenance Mode',
			'Multisite Maintenance Mode',
			'update_core',
			'multisite-maintenance-mode',
			array( $this, 'plugin_admin_page' )
		);
    	
	} // end plugin_admin_menu
	
	/**
	 * Renders the options page for this plugin.
	 */
	public function plugin_admin_page() {

		ob_start();

		$fields = $this->wpsf;
		include_once( 'views/admin.php' );

		$settings_page = ob_get_contents();
		ob_clean();

		echo $settings_page;

	} // end plugin_admin_page

	/**
	 * Autoloads classes in the 'vendor' directory
	 * 
	 * @param  string $classname The class name being autoloaded
	 */
	public static function vendor_autoload( $classname ) {

		$filename = dirname( __FILE__ ) .
      DIRECTORY_SEPARATOR .
      'vendor' . 
      DIRECTORY_SEPARATOR .
      str_replace( '_', DIRECTORY_SEPARATOR, $classname ) .
      '.php';
    if ( file_exists( $filename ) )
      require $filename;

	}

	/**
	 * Autoloads classes in the 'lib' directory
	 * 
	 * @param  string $classname The class name being autoloaded
	 */
	public static function plugin_autoload( $classname ) {

		$filename = dirname( __FILE__ ) .
      DIRECTORY_SEPARATOR .
      'lib' . 
      DIRECTORY_SEPARATOR .
      str_replace( '_', DIRECTORY_SEPARATOR, $classname ) .
      '.php';
    if ( file_exists( $filename ) )
      require $filename;

	}

} // end class

MultisiteMaintenanceMode::get_instance();