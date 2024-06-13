<?php
defined('ABSPATH') or die();

use SEO_FRIENDLY_EXIT_ROUTER\Base\Constant;
use SEO_FRIENDLY_EXIT_ROUTER\Base\Functions;
?>
<h1><?= get_admin_page_title(); ?></h1>
<div class="wrap">
    <form method="post" action="options.php">
        <?php settings_fields(Functions::prefix('settings')); ?>
        <?php do_settings_sections(Functions::prefix('settings')); ?>
        <table class="form-table">

            <tr valign="top">
                <th scope="row">
                    <label for="<?= Functions::prefix('routing_enabled'); ?>">Routing Enabled?</label>
                </th>
                <td>
                    <input type="checkbox" name="<?= Functions::prefix('routing_enabled'); ?>" id="<?= Functions::prefix('routing_enabled'); ?>" value="yes" <?= get_option(Functions::prefix('routing_enabled'), 'no') == 'yes' ? 'checked' : ''; ?>>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <label for="<?= Functions::prefix('intermediate_url_slug'); ?>">Intermediate URL Slug</label>
                </th>
                <td>
                    <input type="text" name="<?= Functions::prefix('intermediate_url_slug'); ?>" id="<?= Functions::prefix('intermediate_url_slug'); ?>" value="<?= esc_attr(get_option(Functions::prefix('intermediate_url_slug'), Constant::URL_EXTERNAL_SLUG)); ?>" class="regular-text" placeholder="<?= Constant::URL_EXTERNAL_SLUG; ?>" required>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>