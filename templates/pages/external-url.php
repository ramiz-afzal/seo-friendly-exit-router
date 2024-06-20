<?php

use SEO_FRIENDLY_EXIT_ROUTER\Base\Constant;
use SEO_FRIENDLY_EXIT_ROUTER\Base\Functions;
use SEO_FRIENDLY_EXIT_ROUTER\Base\Variable;

$pid = get_query_var('pid');
$show_title     = '';
$show_url       = '#';
$routing_delay  = esc_attr(get_option(Functions::prefix('routing_delay'), Constant::ROUTING_DELAY));
if (!empty($pid) && function_exists('wc_get_product')) {
    $product = wc_get_product($pid);
    if (!empty($product)) {
        $show_title = $product->get_title();
        $show_url   = $product->get_product_url();
    }
}
wp_enqueue_style(Functions::with_uuid('frontend-styles'), Functions::css_file('frontend.css'), [], Functions::get_uuid());
wp_enqueue_script(Functions::with_uuid('frontend-script'), Functions::js_file('frontend.js'), [], Functions::get_uuid(), true);
wp_localize_script(Functions::with_uuid('frontend-script'), Variable::GET('JS_OBJECT_NAME'), ['pid' => $pid, 'show_url' => $show_url, 'routing_delay' => $routing_delay]);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body class="redirection-page">
    <section class="redirection-content">
        <h2 class="redirection-title">We are sending you to the official booking site for <?= $show_title; ?></h2>
        <p class="redirection-subtitle">Please add a review of <?= bloginfo('title'); ?> on Google.</p>
        <p class="redirection-timer">Redirecting in <span id="time-left">...</span> seconds</p>
        <p class="redirection-link-wrap"><a class="redirection-link" href="<?= $show_url; ?>">Go now</a></p>
    </section>
    <?php wp_footer(); ?>
</body>

</html>