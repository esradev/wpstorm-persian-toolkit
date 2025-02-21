<?php

namespace WpstormPersianToolkit\Includes\Core;

use WpstormPersianToolkit\Includes\Core\Options;
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Routes')) {

    /**
     * Class Routes
     *
     * @author esradev <wpstormdev@gmail.com>
     */

    class Routes
    {
        /**
         * Instance
         *
         * @access private
         * @var object Class object.
         * @since 1.0.0
         */
        private static object $instance;

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
         */
        public function __construct()
        {
            add_action('rest_api_init', [$this, 'register_routes']);
        }

        public function register_routes()
        {
            $namespace = 'payamito/v1';

            foreach (Options::$option_groups as $group => $options) {
                $route_name = $group . '_options';
                register_rest_route($namespace, $route_name, [
                    [
                        'methods' => 'GET',
                        'callback' => [$this, 'get_options'],
                        'permission_callback' => [$this, 'admin_permissions_check'],
                    ],
                    [
                        'methods' => 'POST',
                        'callback' => [$this, 'update_options'],
                        'permission_callback' => [$this, 'admin_permissions_check'],
                    ],
                ]);
            }
        }

        /**
         * Get options
         *
         * @param WP_REST_Request $req
         * @return array
         */
        public function get_options($req)
        {
            $group = basename($req->get_route(), '_options');
            return Options::get_options($group);
        }

        /**
         * Update options
         *
         * @param WP_REST_Request $req
         * @return array
         */
        public function update_options($req)
        {
            $group = basename($req->get_route(), '_options');
            $options = $req->get_json_params();
            return Options::update_options($group, $options);
        }

        /**
         * Check if a given req has admin permissions
         *
         * @return bool
         */
        public function admin_permissions_check()
        {
            return current_user_can('manage_options');
        }

    }

    Routes::get_instance();
}