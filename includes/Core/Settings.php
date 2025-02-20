<?php

namespace WpstormPersianToolkit\Includes\Core;
// Exit if accessed directly.
if (! defined('ABSPATH')) {
	exit;
}
if (! class_exists('Settings')) {
	/**
	 * Class Settings
	 *
	 * @author esradev <wpstormdev@gmail.com>
	 */
	class Settings
	{

		/**
		 * Instance
		 *
		 * @access private
		 * @var object Class object.
		 * @since 1.0.0
		 */
		private static object $instance;

		/**
		 * Initiator
		 *
		 * @return object Initialized object of class.
		 * @since 1.0.0
		 */
		public static function get_instance()
		{
			if (! isset(self::$instance)) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		private static $current_link;

		/**
		 * Constructor
		 */
		public function __construct()
		{
			self::$current_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);
			add_filter('admin_menu', [$this, 'init_menu'], 999);
			// add_filter('plugin_action_links_' . WPSTORM_PT_BASE, [$this, 'settings_link']);
			// add_action('admin_head', [$this, 'admin_head'], 999);
			// if (isset($_GET['page']) && $_GET['page'] == WPSTORM_PT_SLUG) {
			// 	add_action('admin_init', [$this, 'hide_all_admin_notices']);
			// }
		}

		/**
		 * Enqueue admin scripts
		 *
		 * @return void
		 */
		public function admin_enqueue_scripts()
		{
			//Load TailwindCss styles just on plugin settings page.
			if (false !== strpos(self::$current_link, home_url('/wp-admin/admin.php?page=' . WPSTORM_PT_SLUG))) {
				wp_enqueue_style('wpstorm-pt-admin-style', WPSTORM_PT_BUILD_URL . 'style-index.css', [], WPSTORM_PT_VERSION, 'all');
        wp_enqueue_script('wpstorm-pt-admin-script', WPSTORM_PT_BUILD_URL . 'index.js', ['wp-element','wp-i18n'], WPSTORM_PT_VERSION, true);

				/**
				 * Add a localization object ,The base rest api url and a security nonce
				 * @see https://since1979.dev/snippet-014-setup-axios-for-the-wordpress-rest-api/
				 */
				wp_localize_script(
					'wpstorm-pt-admin-script',
					'wpstormptLocalize',
					[
						'rootapiurl'     => esc_url_raw(rest_url()),
						'nonce'          => wp_create_nonce('wp_rest'),
						'ajax_url'       => admin_url('admin-ajax.php'),
						'src_assets_url' => plugins_url('assets', WPSTORM_PT_BASE),
					]
				);

				// Load wpstorm-pt languages for JavaScript files.
				wp_set_script_translations('wpstorm-pt-admin-script', 'wpstorm-pt', WPSTORM_PT_DIR_PATH . 'languages');
			}

      // $current_screen = get_current_screen();

			// // Check if we are on the plugins.php page
			// if ($current_screen && $current_screen->id === 'plugins') {
			// 	// Enqueue styles
			// 	wp_enqueue_style('payamito-styles', WPSTORM_PT_BUILD_URL . 'css/plugins-page-links.css');
			// }
		}

		/**
		 * Plugin settings link on all plugins page.
		 *
		 * @since 1.0.0
		 */
		public function settings_link($links)
		{
			$settings_link = '<a href="' . esc_url(WPSTORM_PT_LINK) . '" id="wpstorm-pt-settings-link" class="wpstorm-pt-plugin-link">' . esc_html__('Wpstorm Persian Toolkit Settings', 'wpstorm-pt') . '</a>';

			$doc_link = '<a href="' . esc_url(WPSTORM_PT_WEB_MAIN_DOC) . '" target="_blank" rel="noopener noreferrer" id="wpstorm-pt-docs-link" class="wpstorm-pt-plugin-link">' . esc_html__('Docs', 'wpstorm-pt') . '</a>';

			array_push($links, $settings_link, $doc_link);

			return $links;
		}

		/**
		 * Initializes the menu for the Payamito settings.
		 */
		public function init_menu()
		{
			$new_badge = '<span class="wpstorm-pt-new-section">' . __(' new', 'wpstorm-pt') . '</span>';

			add_menu_page(
				__('Wpstorm Persian Toolkit', 'wpstorm-pt'),
				__('Wpstorm Persian Toolkit', 'wpstorm-pt'),
				'manage_options',
				WPSTORM_PT_SLUG,
				[$this, 'admin_page'],
				'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0 1 12 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 0 1-3.476.383.39.39 0 0 0-.297.17l-2.755 4.133a.75.75 0 0 1-1.248 0l-2.755-4.133a.39.39 0 0 0-.297-.17 48.9 48.9 0 0 1-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97ZM6.75 8.25a.75.75 0 0 1 .75-.75h9a.75.75 0 0 1 0 1.5h-9a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H7.5Z" clip-rule="evenodd" /></svg>'),
				7
			);
			add_submenu_page(
				WPSTORM_PT_SLUG,
				__('Payamito', 'wpstorm-pt'),
				__('Auth', 'wpstorm-pt'),
				'manage_options',
				WPSTORM_PT_SLUG,
				[$this, 'admin_page']
			);
		}

		/**
		 * Init Admin Page.
		 *
		 * @return void
		 */
		public function admin_page()
		{
?>
			<div class="wrap">
				<div id="wpstorm-pt-dashboard" class="wpstorm-pt-dashboard"></div>
			</div>
			<?php
		}


		/**
		 * This method is called when the admin head section is being rendered.
		 * It is used to perform any necessary actions or add any necessary scripts/styles to the admin head.
		 */
		public function admin_head()
		{
			wp_register_style('payamito-fonts', WPSTORM_PT_BUILD_URL . 'fonts/fonts.css', [], WPSTORM_PT_VERSION, 'all');
			wp_enqueue_style('payamito-fonts');

			if (is_rtl()) {
			?>
				<style>
					tr[data-plugin*='payamito/wpstorm-pt.php'] {
						font-family: var(--wpstorm-pt-font-family), Tahoma, Arial, sans-serif;
					}
				</style>
<?php
			}
		}

		/**
		 * Hides all admin notices.
		 */
		function hide_all_admin_notices()
		{
			global $wp_filter;


			// Check if the WP_Admin_Bar exists, as it's not available on all admin pages.
			if (isset($wp_filter['admin_notices'])) {
				// Remove all actions hooked to the 'admin_notices' hook.
				unset($wp_filter['admin_notices']);
			}
		}
	}

	Settings::get_instance();
}