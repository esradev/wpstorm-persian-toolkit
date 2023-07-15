<?php
/**
 * Class Wpstorm_PT_Font_Changer
 * Handles changing the default font of the WordPress site.
 */
class Wpstorm_PT_Font_Changer {

    /**
     * Enqueue custom styles to change the default font.
     */
    public function enqueue_styles() {
        // Check if the current locale is Persian.
        if ($this->is_persian_locale()) {
            // Enqueue custom CSS to change the default font.
            wp_enqueue_style('wpstorm-pt-custom-font', WPSTORM_PT_PLUGIN_URL . 'assets/css/custom-font.css');
        }
    }

    /**
     * Check if the current locale is Persian.
     *
     * @return bool True if the locale is Persian, false otherwise.
     */
    private function is_persian_locale() {
        $locale = get_locale();
        return (strpos($locale, 'fa') === 0 || strpos($locale, 'fa_IR') === 0);
    }

}
