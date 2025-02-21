<?php

namespace WpstormPersianToolkit\Includes\Core;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Options' ) ) {

	/**
	 * Class Options
	 *
	 * @author esradev <wpstormdev@gmail.com>
	 */
	class Options {
		public static $jalali_wordpress_core;
    public static $jalali_woocomerce;

		/**
		 * The option groups for the wpstorm_pt plugin.
		 *
		 * @var array
		 */
		public static $option_groups;

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
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			self::$option_groups = self::get_default_options();
			$this->load_options();
			add_action( 'init', [ $this, 'register_options' ] );

      self::$jalali_wordpress_core = self::get_option_item( 'jalali_date', 'wordpress_core' );
			self::$jalali_woocomerce     = self::get_option_item( 'jalali_date', 'woocommerce' );
		}

    /**
     * Get the default options for the plugin.
     *
     * @return array The default options.
     * @since 1.0.0
     */
		public static function get_default_options() {
			return [
				'jalali_date' => [],
			];
		}

		/**
		 * Load the options from the database.
     * 
     * @since 1.0.0
		 */
		private function load_options() {
			foreach ( self::$option_groups as $group => $options ) {
				$option_name   = 'wpstorm_pt_' . $group . '_options';
				$group_options = get_option( $option_name );
				if ( $group_options ) {
					if ( is_array( $group_options ) ) {
						self::$option_groups[ $group ] = $group_options;
					} else {
						$group_options                 = json_decode( get_option( $option_name ), true );
						self::$option_groups[ $group ] = $group_options;
					}
				}
			}
		}

		/**
		 * Register the options in the database if they don't exist.
     * 
     * @since 1.0.0
		 */
		public function register_options() {
			foreach ( self::$option_groups as $group => $options ) {
				$option_name = 'wpstorm_pt_' . $group . '_options';
				if ( ! get_option( $option_name ) ) {
					add_option( $option_name, wp_json_encode( $options ) );
				}
			}
		}

		/**
		 * Update the options in the database.
		 *
		 * @param string $group The option group.
		 * @param array $options The new options.
		 *
		 * @return bool True if the options were updated, false otherwise.
     * @since 1.0.0
		 */
		public static function update_options( $group, $options ) {
			if ( isset( self::$option_groups[ $group ] ) ) {
				$option_name = 'wpstorm_pt_' . $group . '_options';

				if ( $options ) {
					if ( is_array( $options ) ) {
						$option_json = $options;
					} else {
						$option_json = wp_json_encode( $options );
					}
				}

				return update_option( $option_name, $option_json );
			}

			return false;
		}

		/**
		 * Get the options from the database.
		 *
		 * @param string $group The option group.
		 *
		 * @return array|bool The options if found, false otherwise.
     * @since 1.0.0
		 */
		public static function get_options( $group ) {
			$option_name = 'wpstorm_pt_' . $group . '_options';
			add_option( $option_name, wp_json_encode( self::$option_groups[ $group ] ) );

			$group_options = get_option( $option_name );

			if ( $group_options ) {
				if ( is_array( $group_options ) ) {
					return $group_options;
				} else {
					return json_decode( $group_options, true );
				}
			}

		}

    /**
     * Get the options item from the database.
     * 
     * @param string $group The option group.
     * @param string $item The option item.
     * @param string $sub_item The option sub item.
     * 
     * @return array|bool The options if found, false otherwise.
     * @since 1.0.0
     */
		public static function get_option_item( $group, $item, $sub_item = null ) {
			$options = self::get_options( $group );
			if ( ! isset( $options[ $item ] ) ) {
				return null;
			}

			if ( $sub_item ) {
				return $options[ $item ][ $sub_item ] ?? null;
			}

			return $options[ $item ];
		}
	}

	Options::get_instance();
}