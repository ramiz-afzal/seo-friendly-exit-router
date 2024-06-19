<?php

namespace SEO_FRIENDLY_EXIT_ROUTER\Core;

use SEO_FRIENDLY_EXIT_ROUTER\Base\Functions;
use SEO_FRIENDLY_EXIT_ROUTER\Base\Constant;

class WordPressHooks
{
    public function register()
    {
        add_action('init', [$this, 'register_rewrite_rule']);
        add_filter('query_vars', [$this, 'register_query_vars']);
        add_filter('template_include', [$this, 'load_custom_template']);
    }


    public function register_rewrite_rule()
    {
        $slug           = esc_attr(get_option(Functions::prefix('intermediate_url_slug'), Constant::URL_EXTERNAL_SLUG));
        $rewrite_rule   = $slug . '/?([^/]*)/?';

        add_rewrite_rule($rewrite_rule, 'index.php?pid=$matches[1]', 'top');
    }


    public function register_query_vars($query_vars)
    {
        $query_vars[] = 'pid';
        return $query_vars;
    }

    public function load_custom_template($template)
    {
        if (get_query_var('pid') == false || get_query_var('pid') == '') {
            return $template;
        }

        return Functions::get_template_file('pages/external-url.php');
    }
}
