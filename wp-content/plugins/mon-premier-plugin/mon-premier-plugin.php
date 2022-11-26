<?php

/*
Plugin Name: Mon Premier Plugin
Plugin URI: https://e2195749.webdev.cmaisonneuve.qc.ca/intro-cms/
Description: plugin d'inscription infolettre (version du professeur)
Version: 0.1
Author: Sana Bakhrouf
*/


/**
 * Exit si accès direct au fichier 
 */
if (!defined('ABSPATH')) {
    exit;
}

//echo 'Je suis accessible';



/**
 * Défini une CONSTANTE identifiant le nom de la table créée pour notre plugin
 */
function mpp_define_const()
{
    if (!defined('MPP_OPTIONS_MODAL_ADMIN')) {
        global $wpdb;
        define('MPP_OPTIONS_MODAL_ADMIN', $wpdb->prefix . 'mpp_options_modal_admin');
    }

    if (!defined('MPP_INSCRIPTIONS_CLIENT')) {
        global $wpdb;
        define('MPP_INSCRIPTIONS_CLIENT', $wpdb->prefix . 'mpp_inscriptions_client');
    }
}
add_action('plugins_loaded', 'mpp_define_const', 0);


/**
 * Charge les comportements a l'activation
 */
require_once(plugin_dir_path(__FILE__) . "/includes/mpp-activation.php");
register_activation_hook(__FILE__, 'mpp_activation');


/**
 * Charge les comportements a l'deactivation
 */
require_once(plugin_dir_path(__FILE__) . "/includes/mpp-deactivation.php");
register_deactivation_hook(__FILE__, 'mpp_deactivation');

/**
 * Gestion du panneaux admin
 */
require_once(plugin_dir_path(__FILE__) . "/includes/mpp-admin-panel.php");


/**
 * modal coté client
 */
require_once(plugin_dir_path(__FILE__) . "/includes/mpp-modal-client.php");

/**
 * Charge les styles et scripts
 */
function mpp_ajouter_styles_et_scripts()
{
    wp_register_style('id-style', plugins_url('styles/styles.css', __FILE__));
    wp_enqueue_style('id-style');

    wp_register_script('id-script', plugins_url('scripts/main.js', __FILE__));
    wp_enqueue_script('id-script');
}
add_action('init', 'mpp_ajouter_styles_et_scripts');
//add_action( 'wp_enqueue_scripts','mpp_ajouter_styles_et_scripts' );       // Uniquement côté client
//add_action( 'admin_enqueue_scripts','mpp_ajouter_styles_et_scripts' );    // Uniquement côté admin