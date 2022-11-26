<?php


/**
 * Comportements à la désactivation du plugin
 * Ajoute la table wp_mon_premier_plugin du plugin à la db WordPress
 */
function mpp_deactivation()
{
    global $wpdb;
    $mpp_admin_table = $wpdb->prefix . 'mpp_options_modal_admin';
    $wpdb->query("DROP TABLE IF EXISTS $mpp_admin_table");

    $mpp_inscriptions_table = $wpdb->prefix . "mpp_inscriptions_client";
    $wpdb->query("DROP TABLE IF EXISTS $mpp_inscriptions_table");
}