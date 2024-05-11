<div class="content-container">
            <?php
            // Define the movie ID you want to pass
            $movie_id = get_field('featurer_movie_');

            // Call get_template_part and pass the movie ID
            get_template_part('template-parts/movielist/feature_movie', null, ['movie_id' => $movie_id]);
            ?>

            <?php
             get_template_part('template-parts/movielist/new_releases');
            ?>
            
            <?php
             get_template_part('template-parts/movielist/upcomming');
            ?>
            <?php
             get_template_part('template-parts/movielist/filter_movie');
            ?>
</div>