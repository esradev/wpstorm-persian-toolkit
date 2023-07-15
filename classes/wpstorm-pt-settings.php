<?php
/**
 * Class Wpstorm_PT_Settings
 * Handles the settings page for Wpstorm Persian Toolkit.
 */
class Wpstorm_PT_Settings {

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
            'dashicons-testimonial',
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
            <h1><?php echo esc_html__('Wpstorm Persian Toolkit Settings', 'wpstorm-persian-toolkit'); ?></h1>
            <!-- Add your settings page content here -->
        </div>
        <?php
    }

}
