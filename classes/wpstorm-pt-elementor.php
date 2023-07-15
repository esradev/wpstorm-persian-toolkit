<?php
/**
 * Class Wpstorm_PT_Elementor_Integration
 * Handles the integration of Persian fonts and icons with Elementor.
 */
class Wpstorm_PT_Elementor_Integration {

    /**
     * Register controls for Persian fonts and icons in Elementor.
     */
    public function register_controls() {
        add_action('elementor/element/section/section_typography/after_section_end', array($this, 'add_persian_font_control'));
        add_action('elementor/element/section/section_icon/after_section_end', array($this, 'add_persian_icon_control'));
    }

    /**
     * Add a control for selecting Persian fonts in Elementor typography settings.
     *
     * @param \Elementor\Controls_Stack $stack The Elementor control stack.
     */
    public function add_persian_font_control($stack) {
        $stack->start_controls_section(
            'section_persian_fonts',
            array(
                'label' => __('Persian Fonts', 'wpstorm-persian-toolkit'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );

        // Add your Persian font control settings here.
        // Example: $stack->add_control('persian_font', [...]);

        $stack->end_controls_section();
    }

    /**
     * Add a control for selecting Persian icons in Elementor icon settings.
     *
     * @param \Elementor\Controls_Stack $stack The Elementor control stack.
     */
    public function add_persian_icon_control($stack) {
        $stack->start_controls_section(
            'section_persian_icons',
            array(
                'label' => __('Persian Icons', 'wpstorm-persian-toolkit'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );

        // Add your Persian icon control settings here.
        // Example: $stack->add_control('persian_icon', [...]);

        $stack->end_controls_section();
    }

}
