<?php
function rescue_portfolio_shortcode($atts=array()) {
    ob_start();
    rescue_portfolio_show($atts);
    $content = ob_get_clean();
    return $content;
}
add_shortcode('rescue_portfolio', 'rescue_portfolio_shortcode');

function rescue_portfolio_show($atts=array()) {
    if (isset($atts["filter"])) {
        $filter_term_slug = $atts["filter"]; // will be used by template script
    }
    require (RESCUE_PORTFOLIO_TEMPLATE_DIR . "/includes/template.php");
     
}