<?php

if (isset($args['actor_credits'])):
    $actor_credits = $args['actor_credits'];  // Now $images contains what was passed as 'images'
?>
<div class="known-for">
    <h2>Known For</h2>
    <div class="movies-grid">
        <?php foreach (array_slice($actor_credits, 0, 10) as $credit): // Display up to 10 movies ?>
            <div class="movie-card">
                <a href="<?php echo site_url(); ?>/movie-detail?movie_id=<?php echo $credit['id']; ?>"><img src="https://image.tmdb.org/t/p/w500<?php echo esc_attr($credit['poster_path']); ?>" alt="<?php echo esc_attr($credit['title']); ?>"></a>
                <div class="movie-info">
                    <p><?php echo esc_html($credit['title']); ?></p>
                    <p><?php echo esc_html($credit['character']); ?></p>
                    <p><?php echo esc_html($credit['release_date']); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
else:
    echo '<p>No images available.</p>';
endif;
?>    