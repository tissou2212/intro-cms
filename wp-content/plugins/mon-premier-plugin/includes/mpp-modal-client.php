<?php


/**
 * Ajoute un modal côté client pour l'infolettre
 */
function mpp_affiche_modal() {

    require_once('mpp-get-bg-color.php');
    $bg_color = mpp_get_bg_color();

    ob_start(); 
    include(dirname(plugin_dir_path(__FILE__)) . '/templates/modal-client.php');
    $template = ob_get_clean();
    echo $template;
}
add_action( 'wp_body_open', 'mpp_affiche_modal' );



/**
 * Gestion de la soumission du formulaire côté client
 */
function mpp_nouvelle_inscription() {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if ( !empty( $_POST['mpp-courriel'] )) {

            global $wpdb;

            $mpp_courriel = sanitize_email($_POST['mpp-courriel']);

            $wpdb->insert( MPP_INSCRIPTIONS_CLIENT,
                array(
                    'email'=> $mpp_courriel
                ), array(
                    '%s'        // $format (optionnel) => string )
                )
            );

            unset($_POST);
            header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
            exit;
        }
    }
}
add_action( 'init', 'mpp_nouvelle_inscription' );