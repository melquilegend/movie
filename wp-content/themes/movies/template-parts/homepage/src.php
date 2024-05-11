<div class="content-container">
            <?php
            // Define the movie ID you want to pass
            $movie_id = get_field('feature_movie');

            // Call get_template_part and pass the movie ID
            get_template_part('template-parts/homepage/feature_movie', null, ['movie_id' => $movie_id]);
            ?>

            <?php
             get_template_part('template-parts/homepage/new_releases');
            ?>
            
            <?php
             get_template_part('template-parts/homepage/upcomming');
            ?>
            <?php
             get_template_part('template-parts/homepage/popular_actors');
            ?>
</div>