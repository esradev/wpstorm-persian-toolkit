<?php
/**
 * Class Wpstorm_PT_Settings
 * Handles the settings page for Wpstorm Persian Toolkit.
 */
class Wpstorm_PT_Settings {

    /**
     * Register the stylesheets for the admin area.
     *
     * @since 1.0.0
     */
    public function admin_enqueue_styles()
    {
            wp_enqueue_style('wpstorm-notify-style', WPSTORM_PT_URL . 'build/index.css', [], WPSTORM_PT_VERSION);
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since 1.0.0
     */
    public function admin_enqueue_scripts($hook)
    {
        wp_enqueue_script(
            'wpstorm-notify-script',
            WPSTORM_PT_URL . 'build/index.js',
            [
                'wp-element',
                'wp-i18n',
            ],
            WPSTORM_PT_VERSION,
            true
        );

    }

    /**
     * Add submenu page for the plugin settings.
     */
    public function init_menu()
    {
        add_menu_page(
            __('Wpstorm Persian Toolkit Settings', 'wpstorm-persian-toolkit'),
            __('Wpstorm Persian Toolkit', 'wpstorm-persian-toolkit'),
            'manage_options',
            WPSTORM_PT_SLUG,
            [
                $this,
                'render_settings_page',
            ],
            'dashicons-superhero',
            100
        );
        add_submenu_page(
            WPSTORM_PT_SLUG,
            __('Wpstorm Persian Toolkit Settings', 'wpstorm-persian-toolkit'),
            __('Settings', 'wpstorm-persian-toolkit'),
            'manage_options',
            WPSTORM_PT_SLUG,
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
            <div id="wpstorm-persian-toolkit-admin"></div>
        </div>
        <?php
    }

}
