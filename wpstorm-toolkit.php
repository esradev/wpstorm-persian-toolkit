<?php
/**
 * Plugin Name: Wpstorm Toolkit
 * Plugin URI:  https://wpstorm.ir/wpstorm-tk
 * Description: This plugin adds Toolkit customization options to WordPress, including changing the date format, default font, and Elementor integration.
 * Version:     1.0.0
 * Author:      Wpstorm Genius
 * Author URI:  https://wpstorm.ir
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wpstorm-tk
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * The main class for the Wpstorm Persian Toolkit plugin.
 */
class Wpstorm_Toolkit {

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
    }

    /**
     * Define plugin constants.
     */
    private function define_constants() {
        define('WPSTORM_TK_FILE', __FILE__);
        define('WPSTORM_TK_DIR', plugin_dir_path(WPSTORM_TK_FILE));
        define('WPSTORM_TK_URL', plugin_dir_url(WPSTORM_TK_FILE));
        define('WPSTORM_TK_VERSION', self::VERSION);
        define('WPSTORM_TK_SLUG', 'WPSTORM_TK_settings');
    }

    /**
     * Load plugin dependencies.
     */
    private function load_dependencies() {
        // Include additional files or classes here if needed.
        require_once WPSTORM_TK_DIR . 'classes/wpstorm-pt-settings.php';
        require_once WPSTORM_TK_DIR . 'classes/wpstorm-pt-date-changer.php';
        require_once WPSTORM_TK_DIR . 'classes/wpstorm-pt-font-changer.php';
        require_once WPSTORM_TK_DIR . 'classes/wpstorm-pt-elementor.php';
    }
}

/**
 * Initialize the Wpstorm Persian Toolkit plugin.
 */
function WPSTORM_TK_init() {
    $WPSTORM_TK_plugin = new Wpstorm_Toolkit();
}

add_action('plugins_loaded', 'WPSTORM_TK_init');
