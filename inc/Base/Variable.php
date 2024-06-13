<?php

namespace SEO_FRIENDLY_EXIT_ROUTER\Base;

if (!defined('ABSPATH')) exit;

final class Variable
{
    private static $VARIABLES = [];
    public static function LOAD_VARIABLES($__FILE__)
    {
        self::$VARIABLES['PREFIX']                      = 'seo-friendly-exit-router';
        self::$VARIABLES['ADMIN_PAGE']                  = 'seo-friendly-exit-router-settings';
        self::$VARIABLES['TRANSLATION_DOMAIN']          = 'seoFriendlyExitRouter';
        self::$VARIABLES['URL']                         = plugin_dir_url($__FILE__);
        self::$VARIABLES['PATH']                        = plugin_dir_path($__FILE__);
        self::$VARIABLES['BASENAME']                    = plugin_basename($__FILE__);
        self::$VARIABLES['TEMPLATES']                   = self::$VARIABLES['PATH'] . 'templates';
        self::$VARIABLES['LOAD_FRONTEND_FILES']         = false;
        self::$VARIABLES['LOAD_ADMIN_FILES']            = false;
        self::$VARIABLES['LOCALIZE_JS_OBJECT']          = false;
        self::$VARIABLES['JS_OBJECT_NAME']              = 'seoFriendlyExitRouterAjax';
        self::$VARIABLES['LOCALIZE_ADMIN_JS_OBJECT']    = false;
        self::$VARIABLES['JS_ADMIN_OBJECT_NAME']        = 'seoFriendlyExitRouterAdminAjax';

        // load file variables
        self::GET_FILE_VARIABLES($__FILE__);
    }

    private static function GET_FILE_VARIABLES($__FILE__)
    {
        $default_headers = [
            'PLUGIN_NAME'       => 'Plugin Name',
            'PLUGIN_URI'        => 'Plugin URI',
            'DESCRIPTION'       => 'Description',
            'VERSION'           => 'Version',
            'REQUIRES_AT_LEAST' => 'Requires at least',
            'REQUIRES_PHP'      => 'Requires PHP',
            'AUTHOR'            => 'Author',
            'AUTHOR_URI'        => 'Author URI',
            'LICENSE'           => 'License',
            'LICENSE_URI'       => 'License URI',
        ];

        $file_variables = get_file_data($__FILE__, $default_headers);

        if (!empty($file_variables) && is_array($file_variables)) {
            self::$VARIABLES = array_merge(self::$VARIABLES, $file_variables);
        }
    }

    public static function GET($name)
    {
        if (isset(self::$VARIABLES[$name])) {
            return self::$VARIABLES[$name];
        }
        return NULL;
    }
}
