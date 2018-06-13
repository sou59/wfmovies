<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

/*
On utilise une fonction pour créer notre custum post type "Films"
*/
function movie_init() { // initialisation

    $labels = array (
        "name" => "Films",
        "singular_name" => "Film",
        "menu_name" => "Films",
        "add_new" => "Ajouter un film",
        "add_new_item" => "Ajouter un nouveau film",
        "new_item" => "Ajouter un nouveau film",
        "edit_item" => "Modifier un film",
        "view_item" => "Voir le film",
        "all_items" => "Tous les films",
        "search_items" => "Rechercher un film"
    );

    $args = array(
        "label" => "Films",
        "labels" => $labels,
        // on définit ici les options disponibles dans l'éditeur de notre custom post type : affichage dans ajouter film
        "supports" => array("title", "editor", "author", "thumbnail", "comments", "custum_fields"), // custum_fields
        // option supplémentaire
        "public" => true,
        "has_archive" => true, // à ne pas oublier si vous utilisez un modèle d'archive
        "menu_icon" => "dashicons-video-alt2"
    );

    register_post_type("movie", $args);

    /* Création du tag genre  */

    register_taxonomy("genre", "movie", array(
        "label" => "genre",
        "labels" => array(
            "name" => "Genre",
            "singular_name" => "Genre",
            "menu_name" => "Genres",
            "add_new" => "Ajouter un genre",
            "add_new_item" => "Ajouter un nouveau genre",
            "new_item" => "Ajouter un nouveau genre",
            "edit_item" => "Modifier un genre",
            "view_item" => "Voir le genre",
            "all_items" => "Tous les genre",
            "search_items" => "Rechercher un genre"
            ),
        "hierarchical" => false // si on met vraie ce sera une catégorie avec une relation parent_enfant, false = tags
        )
    );

    /* Création du tag genre  */
    register_taxonomy("realisateur", "movie", array(
        "label" => "realisateur",
        "labels" => array(
            "name" => "Réalisateur",
            "singular_name" => "Réalisateur",
            "menu_name" => "Réalisateurs",
            "add_new" => "Ajouter un réalisateur",
            "add_new_item" => "Ajouter un nouveau réalisateur",
            "new_item" => "Ajouter un nouveau réalisateur",
            "edit_item" => "Modifier un réalisateur",
            "view_item" => "Voir le réalisateur",
            "all_items" => "Tous les réalisateur",
            "search_items" => "Rechercher un réalisateur"
            ),
        "hierarchical" => false // si on met vraie ce sera une catégorie avec une relation parent_enfant, false = tags
        )
    );

    // Association du CPT movie (custom post type) nécessaire si ce n'est pas indiqué dans register_taxonomy lien entre genre et movie
    // register_taxonomy_for_object_type("genre", "movie");

}
add_action("init", "movie_init" );
