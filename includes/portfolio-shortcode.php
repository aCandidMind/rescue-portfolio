<?php
function rescue_portfolio_shortcode($atts=array()) {
    ob_start();
    rescue_portfolio_show($atts);
    $content = ob_get_clean();
    return $content;
}
add_shortcode('rescue_portfolio', 'rescue_portfolio_shortcode');

function rescue_portfolio_show($atts=array()) {

     require (RESCUE_PORTFOLIO_TEMPLATE_DIR . "/includes/template.php");
     
}