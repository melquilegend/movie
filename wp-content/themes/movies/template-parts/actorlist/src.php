<div class="content-container">
            <?php
            // Define the movie ID you want to pass
            $movie_id = get_field('movie_actor');
            // Call get_template_part and pass the movie ID
            get_template_part('template-parts/actorlist/feature_actor', null, ['movie_actor' => $movie_id]);
            ?>
            
            <?php
             get_template_part('template-parts/actorlist/popular_actors');
            ?>
</div>