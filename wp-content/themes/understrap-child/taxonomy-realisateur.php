<?php get_header(); ?>


<div class="container pt-5 genres">
    <h1>Genre : <?php single_term_title(); ?></h1>

    <?php
    if(have_posts()) {
        while(have_posts()) {
            the_post();
            ?>

            <article class="movie">
                <!-- affiche du film en miniature -->
                <?php the_post_thumbnail("thumbnail");  ?>  <!-- pas besoin de balise img cette fonction la retourne, en paramètre la taille de l'image -->
                        
                <h2>
                    <a href="<?php the_permalink(); ?>" >
                        <?php the_title(); ?>
                    </a>
                </h2>

                <p>
                    <!-- Affichage de la taxonomy genre, 3e paramètre ce qui s'affiche -->
                    <?php the_terms($post->ID, "realisateur", "Réalisateur : "); ?>

                </p>        
                    
            </article>

            <?php
        }
    }
    ?>


</div>



<?php get_footer(); ?>
