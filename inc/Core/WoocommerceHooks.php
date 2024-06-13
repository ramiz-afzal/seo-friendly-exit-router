<?php

namespace SEO_FRIENDLY_EXIT_ROUTER\Core;

use SEO_FRIENDLY_EXIT_ROUTER\Base\Functions;
use SEO_FRIENDLY_EXIT_ROUTER\Base\Constant;

class WoocommerceHooks
{
    public function register()
    {
        add_filter('woocommerce_product_add_to_cart_url', [$this, 'override_redirect_url'], 10, 2);
    }


    public function override_redirect_url($redirect_url, $product)
    {
        $routing_enabled = get_option(Functions::prefix('routing_enabled'), 'no');
        if ($routing_enabled !== 'yes') {
            return $redirect_url;
        }

        if ($product->get_type() !== 'external') {
            return $redirect_url;
        }

        $intermediate_url_slug = get_option(Functions::prefix('intermediate_url_slug'), Constant::URL_EXTERNAL_SLUG);
        if (empty($intermediate_url_slug)) {
            return $redirect_url;
        }

        $redirect_url = site_url('/' . str_replace('/', '', $intermediate_url_slug) . '/' . $product->get_id());

        return $redirect_url;
    }
}
