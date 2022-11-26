<?php


/**
 * Crée un panneau dans le menu côté admin
 */
function mpp_ajouter_menu()
{
    add_menu_page(
        'Mon Premier Plugin',           // Page title
        'Mon Premier Plugin',           // Menu title
        'manage_options',               // Capability
        'mon-premier-plugin',           // Menu slug
        'mmp_ajouter_formulaire'        // Callable function
    );
}
add_action('admin_menu', 'mpp_ajouter_menu');



/**
 * Injecte le contenu du panneau (argument Callable function de add_menu_page())
 */
function mmp_ajouter_formulaire()
{
    // S’il y a un query string nom, ajoute sa valeur à la db
    if (isset($_POST['mpp-bg-color'])) {
        mmp_ajouter_data();     // Appelle la fonction pour l’appel à la db
    };

    require_once("mpp-get-bg-color.php");
    $bg_color = mpp_get_bg_color();

    echo '<div style="padding:5vw;">
                <h2>' . get_admin_page_title() . '</h2>
                <form method="post" style="margin-top:25px;">
                    <label for="bg-color">Couleurs de fond: </label>
                    <input type="color" id="bg-color" name="mpp-bg-color" value="' . $bg_color . '">
                    <button type="submit" name="enregistrer">Enregistrer</button>
                </form>
            </div>';

    //mmp_afficher_data();        // Appelle la fonction qui affiche les datas
}



/**
 * Ajoute la nouvelle valeur à la table du plugin
 */
function mmp_ajouter_data()
{
    global $wpdb;
    $mpp_bg_color = sanitize_text_field($_POST['mpp-bg-color']);

    $data = ["bg_color" => $mpp_bg_color];
    $where = ["id" => 1];
    $wpdb->update(MPP_OPTIONS_MODAL_ADMIN, $data, $where);

    /*
    $wpdb->insert(
        MPP_OPTIONS_MODAL_ADMIN,
        array(
            'bg_color' => $mpp_bg_color
        ),
        array(
            '%s'            // $format (optionnel) => string
        )
    );

    */
}



/**
 * Affiche une liste des informations conservées dans la table du plugin
 */
function mmp_afficher_data()
{
    global $wpdb;

    // Récupère les valeurs de la table wp_mon_premier_plugin
    $results = $wpdb->get_results("SELECT * FROM " . MPP_OPTIONS_MODAL_ADMIN);

    // S'il y a des résultats
    if ($results) {
        echo '<div style="padding:0 5vw;">
                <h2>Entrée(s)</h2>
                <ul>';
        foreach ($results as $data) {
            echo '<li><small>Nom : </small>' . esc_html($data->nom) . '</li>';
        }
        echo '  </ul>
            </div>';
    }
}
