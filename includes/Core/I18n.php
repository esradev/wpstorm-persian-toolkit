<?php

namespace WpstormPersianToolkit\Includes\Core;
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists('I18n')) {
    /**
     * Class I18n
     *
     * @author esradev <wpstormdev@gmail.com>
     */
    class I18n
    {

        /**
         * Instance
         *
         * @access private
         * @var object Class object.
         * @since 1.0.0
         */
        private static $instance;

        /**
         * Initiator
         *
         * @return object Initialized object of class.
         * @since 1.0.0
         */
        public static function get_instance()
        {
            if (!isset(self::$instance)) {
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
            add_action('plugins_loaded', [$this, 'load_textdomain'], 999);
            add_filter('load_textdomain_mofile', [$this, 'load_textdomain_mofile'], 999, 2);
        }

        /**
         * Loads the text domain.
         */
        public function load_textdomain()
        {
            load_plugin_textdomain('wpsotrm-pt', false, WPSTORM_PT_DIR_PATH . 'languages');
        }

        /**
         * Loads the translation MO file for a specific domain.
         *
         * @param string $mofile The path to the MO file.
         * @param string $domain The translation domain.
         */
        public function load_textdomain_mofile($mofile, $domain)
        {
            if ('wpsotrm-pt' === $domain) {
                $mofile = WPSTORM_PT_DIR_PATH . 'languages/wpsotrm-pt-' . get_locale() . '.mo';
            }

            return $mofile;
        }
    }

    I18n::get_instance();
}