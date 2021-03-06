<?php get_header(); ?>
<div class="container pt-5">
    <h1>Les films à l'affiche</h1>

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

                <h3>
                    <!-- Affichage de la taxonomy réalisateur, 3e paramètre ce qui s'affiche -->
                    <?php the_terms($post->ID, "realisateur", "Réalisateur : "); ?>
                </h3>
                
                <p>
                    <!-- Affichage de la taxonomy genre, 3e paramètre ce qui s'affiche -->
                    <?php the_terms($post->ID, "genre", "Genre : "); ?>
                </p>

                
                    
            </article>

            <?php
        }
    }
    ?>

</div>



<?php get_footer(); ?>