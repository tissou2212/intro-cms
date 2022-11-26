<?php

function mpp_get_bg_color(){
    global $wpdb;

    $result = $wpdb->get_var("SELECT bg_color FROM " . MPP_OPTIONS_MODAL_ADMIN . " WHERE id=1");

    return $result;

}