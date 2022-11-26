<?php

/**
 * Comportements à l'activation du plugin
 * Ajoute la table wp_mon_premier_plugin du plugin à la db WordPress
 */
function mpp_activation()
{
    global $wpdb;
    $mpp_admin_table = $wpdb->prefix . 'mpp_options_modal_admin';
    $charset_collate = $wpdb->get_charset_collate();

    if ($wpdb->get_var("SHOW TABLES LIKE '$mpp_admin_table'") != $mpp_admin_table) {
        $sql = "CREATE TABLE $mpp_admin_table (
            id int NOT NULL AUTO_INCREMENT,
            bg_color varchar(10) NOT NULL,
            PRIMARY KEY (id)
        ) $charset_collate";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        $wpdb->insert($mpp_admin_table, array("bg_color" => "#FFFFFF"));
    }

    $mpp_inscriptions_table = $wpdb->prefix . "mpp_inscriptions_client";

    if ($wpdb->get_var("SHOW TABLES LIKE '$mpp_inscriptions_table'") != $mpp_inscriptions_table) {
        $sql = "CREATE TABLE $mpp_inscriptions_table (
            id int NOT NULL AUTO_INCREMENT,
            email varchar(50) NOT NULL,
            PRIMARY KEY (id)
        ) $charset_collate";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }



}