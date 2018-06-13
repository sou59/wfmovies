<?php
function add_parent_style() {
    wp_enqueue_style("parent-style", get_template_directory_uri()."/style.css");
}
add_action("wp_enqueue_scripts", "add_parent_style"); // appel de la fonction (attention _scripts) : avec deux paramètres style et nom de la fonction
// hook = modifier le comportement par défaut de wp

