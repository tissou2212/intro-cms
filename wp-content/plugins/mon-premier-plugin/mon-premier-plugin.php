<?php

/*
    Plugin Name: Mon Premier Plugin
*/
function mpp_ajouter_pop_up(){
    ob_start();
    include('templates/pop-up.php');
    $template = ob_get_clean();
    echo $template;


}
add_action('wp_body_open','mpp_ajouter_pop_up');

function mpp_ajouter_styles_et_scripts() {
    wp_register_style('mpp-style', plugins_url('styles/styles.css',__FILE__ ));
    wp_enqueue_style('mpp-style');
    wp_register_script('mpp-script', plugins_url('scripts/main.js',__FILE__ ));
    wp_enqueue_script('mpp-script');
    }
    add_action( 'init','mpp_ajouter_styles_et_scripts' );
    ?>