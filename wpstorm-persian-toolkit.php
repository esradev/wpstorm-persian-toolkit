<?php

/**
 * Plugin Name: Wpstorm Persian Toolkit
 * Plugin URI: https://wpstorm.ir
 * Description: A toolkit for Persian WordPress sites, including Persian date (datepickers), Persian number, and more.
 * Version: 1.0.0
 * Author: esradev
 * Author URI: https://wpstorm.ir
 * License: GPLv2 or later
 * Text Domain: wpstorm-pt
 * Domain Path: /languages/
 * Requires at least: 5.0
 * Tested up to: 6.6.2
 * Requires PHP: 7.4
*/ 

namespace WpstormPersianToolkit;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WpstormPersianToolkit' ) ) {

    class WpstormPersianToolkit {
        
        private static object $instance;

        public static function get_instance(): object
		{
			if (! isset(self::$instance)) {
				self::$instance = new self();
			}

			return self::$instance;
		}

        /**
		 * Constructor
		 * @since 1.0.0
		 */
		public function __construct()
		{
			require __DIR__ . '/vendor/autoload.php';

			$this->define_constants();
			$this->require_files();

			register_activation_hook(__FILE__, [$this, 'plugin_activate']);
			add_action('admin_init', [$this, 'redirect_to_settings_page']);
		}

		/**
		 * Plugin activation hook
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function plugin_activate(): void
		{
			add_option('wpstorm_pt_activated', true);
		}

		/**
		 * Redirect to settings page if the plugin is activated for the first time.
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function redirect_to_settings_page(): void
		{
			if (get_option('wpstorm_pt_activated')) {
				delete_option('wpstorm_pt_activated');
				wp_safe_redirect(WPSTORM_PT_LINK);
				exit;
			}
		}

		/**
		 * Defines all constants
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function define_constants(): void
		{
			define('WPSTORM_PT_VERSION', '1.0.0');
			define('WPSTORM_PT_FILE', __FILE__);
			define('WPSTORM_PT_DIR_PATH', plugin_dir_path(__FILE__));
			define('WPSTORM_PT_SLUG', 'wpstorm-pt_settings');
			define('WPSTORM_PT_BASE', plugin_basename(__FILE__));
			define('WPSTORM_PT_LINK', admin_url('admin.php?page=' . WPSTORM_PT_SLUG));
			define('WPSTORM_PT_WEB_MAIN', 'https://wpstorm.ir/');
			define('WPSTORM_PT_WEB_MAIN_DOC', WPSTORM_PT_WEB_MAIN . 'plugins/');
			define('WPSTORM_PT_BUILD_URL', plugin_dir_url(__FILE__) . 'build/');
		}

        /**
         * Require all plugin files.
				 * 
				 * @return void
				 * @since 1.0.0
         */
		public function require_files(): void
		{
			require_once WPSTORM_PT_DIR_PATH . 'includes/Core/I18n.php';
			require_once WPSTORM_PT_DIR_PATH . 'includes/Core/Routes.php';
			require_once WPSTORM_PT_DIR_PATH . 'includes/Core/Settings.php';
			require_once WPSTORM_PT_DIR_PATH . 'includes/Core/Options.php';
		}
	}

	WpstormPersianToolkit::get_instance();
}

