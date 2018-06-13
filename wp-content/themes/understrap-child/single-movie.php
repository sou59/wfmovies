<?php get_header(); ?>

<?php
if(have_posts()) {
    while(have_posts()) {
        the_post(); // ici très important, pour itérer sur le film, sinon cela fera une boucle infinie
        ?>
            <article class="container pt-5 movie">
                <div class="row">
                    <div class="col-md-3">
                        <!-- affiche du film -->
                        <?php the_post_thumbnail("large");  // pas besoin de balise img cette fonction la retourne, en paramètre la taille de l'image 
                        ?> 
                    </div>
                    <div class="col-md-9">
                        <!-- info du film -->
                        <h1><?php the_title();  ?></h1>
                        <p><?php the_content();  ?></p>

                        <!-- Affichage de la bande annonce elle ne gère pas l'affichage -->
                        <p>
                        <?php 
                        $trailer = get_post_meta($post->ID, "trailer");
                        echo $trailer[0];

                        ?></p>

                        <p>
                        <?php the_field('titre'); ?>
                        </p>
                        
                    </div>
                </div>
            </article>

        <?php
    }
}
?>
<?php get_footer(); ?>
