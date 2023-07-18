<?php
/**
 * Class WPSTORM_TK_Font_Changer
 * Handles changing the default font of the WordPress site.
 */
class WPSTORM_TK_Font_Changer {
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
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
    }

    /**
     * Enqueue custom styles to change the default font.
     */
    public function enqueue_styles() {
        // Check if the current locale is Persian.
        if ($this->is_persian_locale()) {
            // Enqueue custom CSS to change the default font.
            wp_enqueue_style('wpstorm-pt-custom-font', WPSTORM_TK_PLUGIN_URL . 'assets/css/custom-font.css');
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

WPSTORM_TK_Font_Changer::get_instance();
