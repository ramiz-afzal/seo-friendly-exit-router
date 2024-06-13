<?php

/**
 * Plugin Name:       SEO Friendly Exit Router
 * Plugin URI:        mailto:m.ramiz.afzal@gmail.com
 * Description:       For Woocommerce's External/Affiliate product, makes redirecting to external sites seo friendly by routing them through a intermediate exit page
 * Version:           1.0.0
 * Requires at least: 6.1
 * Requires PHP:      7.4
 * Author:            Ramiz Afzal
 * Author URI:        mailto:m.ramiz.afzal@gmail.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

// Direct access protection
defined('ABSPATH') or die();

// composer autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// load global variables
if (class_exists('SEO_FRIENDLY_EXIT_ROUTER\\Base\\Variable')) {
    SEO_FRIENDLY_EXIT_ROUTER\Base\Variable::LOAD_VARIABLES(__FILE__);
}

// plugin activation callback
if (class_exists('SEO_FRIENDLY_EXIT_ROUTER\\Base\\Activate')) {
    SEO_FRIENDLY_EXIT_ROUTER\Base\Activate::activate(__FILE__);
}

// plugin deactivation callback
if (class_exists('SEO_FRIENDLY_EXIT_ROUTER\\Base\\Deactivate')) {
    SEO_FRIENDLY_EXIT_ROUTER\Base\Deactivate::deactivate(__FILE__);
}

// load plugin services
if (class_exists('SEO_FRIENDLY_EXIT_ROUTER\\Init')) {
    SEO_FRIENDLY_EXIT_ROUTER\Init::register_services();
}
