<?php
// Exit if accessed directly
if (!defined('ABSPATH')){
    exit;
    }
/*
    Plugin Name: Mon Premier Plugin
    Plugin URI: https://github.com/tissou2212/intro-cms
    Description: Mon premier plugin WordPress du cours
    Version: 1.0.0
    Author: Sana Bakhrouf
*/

function mpp_define_const() {
    if ( !defined('MPP_TABLE_NAME') ) {
    global $wpdb;
    define ( 'MPP_TABLE_NAME', $wpdb->prefix . 'mon_premier_plugin' );
    }
   }
   add_action('plugins_loaded', 'mpp_define_const', 0);

function mpp_activation() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'mon_premier_plugin';
    $charset_collate = $wpdb->get_charset_collate();
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
    $sql = "CREATE TABLE $table_name (
     id int NOT NULL AUTO_INCREMENT,
     nom varchar(50) NOT NULL,
     PRIMARY KEY (id)
    ) $charset_collate";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    }
    }
    register_activation_hook(__FILE__, 'mpp_activation');
/*


    function mpp_deactivation() {
        global $wpdb;
         $table_name = $wpdb->prefix . 'mon_premier_plugin';
         $wpdb->query( "DROP TABLE IF EXISTS $table_name" );
        }
        register_deactivation_hook(__FILE__, 'mpp_deactivation');


*/


function mpp_ajouter_menu() {
    add_menu_page(
    'Mon Premier Plugin', // Page title
    'Mon Premier Plugin', // Menu title
    'manage_options', // Capability
    'mpp-menu-page', // Menu slug
    'mpp_ajouter_formulaire' // Callable function
    );
    }
    add_action('admin_menu', 'mpp_ajouter_menu');


    function mpp_ajouter_formulaire() {
        echo '<div style="padding:5vw;">
        <h2>' . get_admin_page_title() . '</h2>
        <form method="post" style="margin-top:25px;">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom">
        <button type="submit" name="enregistrer">Enregistrer</button>
        </form>
        </div>';
        // S’il y a un query string nom, ajoute sa valeur à la db
        if (isset($_POST['nom'])) {
        mpp_ajouter_data(); // Appelle la fonction pour l’appel à la db
        };
        mpp_afficher_data(); // Appelle la fonction qui affiche les datas
       }

       function mpp_ajouter_data() {
        global $wpdb;
        $mpp_nom = sanitize_text_field($_POST['nom']);
        $wpdb->insert( MPP_TABLE_NAME,
        array(
        'nom' => $mpp_nom
        ),
        array(
        '%s' // $format (optionnel) => string
        )
        );
        }

        function mpp_afficher_data() {
            global $wpdb;
           // Récupère les valeurs de la table wp_mon_premier_plugin
            $results = $wpdb->get_results("SELECT * FROM " . MPP_TABLE_NAME);
            // S'il y a des résultats
            if ($results) {
            echo '<div style="padding:0 5vw;">
            <h2>Entrée(s)</h2>
            <ul>';
            foreach ($results as $data) {
            echo '<li><small>Nom : </small>' . esc_html($data->nom) . '</li>';
            }
            echo ' </ul>
            </div>';
            }
           }










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