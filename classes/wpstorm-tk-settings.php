<?php
/**
 * Class WPSTORM_TK_Settings
 * Handles the settings page for Wpstorm Toolkit.
 */
class WPSTORM_TK_Settings {
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

    public function __construct()
    {
        add_action('admin_menu', [$this, 'init_menu']);
        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);
        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_styles']);
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since 1.0.0
     */
    public function admin_enqueue_styles()
    {
            wp_enqueue_style('wpstorm-tk-style', WPSTORM_TK_URL . 'build/index.css', [], WPSTORM_TK_VERSION);
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since 1.0.0
     */
    public function admin_enqueue_scripts($hook)
    {
        wp_enqueue_script(
            'wpstorm-tk-script',
            WPSTORM_TK_URL . 'build/index.js',
            [
                'wp-element',
                'wp-i18n',
            ],
            WPSTORM_TK_VERSION,
            true
        );

        /**
        * Add a localization object ,The base rest api url and a security nonce
        * @see https://since1979.dev/snippet-014-setup-axios-for-the-wordpress-rest-api/
        * */
        wp_localize_script(
            'wpstorm-tk-script',
            'wpstormTKJsObject',
            [
                'rootapiurl'        => esc_url_raw(rest_url()),
                'nonce'             => wp_create_nonce('wp_rest'),
            ]
        );

    }

    /**
     * Add submenu page for the plugin settings.
     */
    public function init_menu()
    {
        add_menu_page(
            __('Wpstorm Toolkit Settings', 'wpstorm-tk'),
            __('Wpstorm Toolkit', 'wpstorm-tk'),
            'manage_options',
            WPSTORM_TK_SLUG,
            [
                $this,
                'render_settings_page',
            ],
            'dashicons-superhero',
            100
        );
        add_submenu_page(
            WPSTORM_TK_SLUG,
            __('Wpstorm Toolkit Settings', 'wpstorm-tk'),
            __('Settings', 'wpstorm-tk'),
            'manage_options',
            WPSTORM_TK_SLUG,
            [
                $this,
                'render_settings_page',
            ]
        );
    }


    /**
     * Render the settings page content.
     */
    public function render_settings_page() {
        ?>
        <div class="wrap">
            <div id="wpstorm-tk-admin"></div>
        </div>
        <?php
    }

}

WPSTORM_TK_Settings::get_instance();