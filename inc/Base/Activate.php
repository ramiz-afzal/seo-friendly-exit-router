<?php

namespace SEO_FRIENDLY_EXIT_ROUTER\Base;

use SEO_FRIENDLY_EXIT_ROUTER\Base\Functions;
use SEO_FRIENDLY_EXIT_ROUTER\Core\WordPressHooks;

if (!defined('ABSPATH')) exit;

class Activate
{
    public static function activate($__FILE__)
    {
        register_activation_hook($__FILE__, [get_called_class(), 'activation_callback']);
    }

    public static function activation_callback()
    {
        Functions::register_uuid();
        flush_rewrite_rules();
    }
}
