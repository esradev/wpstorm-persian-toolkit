<?php
/**
 * Plugin Name: Wpstorm Persian Toolkit
 * Plugin URI:  https://wpstorm.ir/wpstorm-persian-toolkit
 * Description: This plugin adds Persian customization options to WordPress, including changing the date format, default font, and Elementor integration.
 * Version:     1.0.0
 * Author:      Wpstorm Genius
 * Author URI:  https://wpstorm.ir
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wpstorm-persian-toolkit
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * The main class for the Wpstorm Persian Toolkit plugin.
 */
class Wpstorm_Persian_Toolkit {

    /**
     * Plugin version.
     *
     * @var string
     */
    const VERSION = '1.0.0';

    /**
     * Initialize the plugin.
     */
    public function __construct() {
        $this->define_constants();
        $this->load_dependencies();
        $this->setup_hooks();
    }

    /**
     * Define plugin constants.
     */
    private function define_constants() {
        define('WPSTORM_PT_FILE', __FILE__);
        define('WPSTORM_PT_DIR', plugin_dir_path(WPSTORM_PT_FILE));
        define('WPSTORM_PT_URL', plugin_dir_url(WPSTORM_PT_FILE));
        define('WPSTORM_PT_VERSION', self::VERSION);
        define('WPSTORM_PT_SLUG', 'wpstorm_pt_settings');
    }

    /**
     * Load plugin dependencies.
     */
    private function load_dependencies() {
        // Include additional files or classes here if needed.
        require_once WPSTORM_PT_DIR . 'classes/wpstorm-pt-settings.php';
        require_once WPSTORM_PT_DIR . 'classes/wpstorm-pt-date-changer.php';
        require_once WPSTORM_PT_DIR . 'classes/wpstorm-pt-font-changer.php';
        require_once WPSTORM_PT_DIR . 'classes/wpstorm-pt-elementor.php';
    }

    /**
     * Set up the plugin hooks.
     */
    private function setup_hooks() {
        $settings = new Wpstorm_PT_Settings();
        add_action('admin_menu', array($settings, 'init_menu'));
        add_action('admin_enqueue_scripts', [$settings, 'admin_enqueue_scripts']);
        add_action('admin_enqueue_scripts', [$settings, 'admin_enqueue_styles']);

        $date_changer = new Wpstorm_PT_Date_Changer();
        add_filter('the_date', array($date_changer, 'change_date_format'), 10, 2);

        $font_changer = new Wpstorm_PT_Font_Changer();
        add_action('wp_enqueue_scripts', array($font_changer, 'enqueue_styles'));

        $elementor_integration = new Wpstorm_PT_Elementor_Integration();
        add_action('elementor/controls/controls_registered', array($elementor_integration, 'register_controls'));
    }
}

/**
 * Initialize the Wpstorm Persian Toolkit plugin.
 */
function wpstorm_pt_init() {
    $wpstorm_pt_plugin = new Wpstorm_Persian_Toolkit();
}

add_action('plugins_loaded', 'wpstorm_pt_init');
