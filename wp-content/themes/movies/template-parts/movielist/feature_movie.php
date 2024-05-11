<?php
if (isset($args['movie_id'])) {
    $movie_id = $args['movie_id'];

    // Now you can use $movie_id to fetch movie details
    $movie = fetch_movie_by_id($movie_id);

    // Check if the movie was fetched successfully
    if ($movie) {
        // Build the output HTML
        $background_image = 'https://image.tmdb.org/t/p/original' . $movie['backdrop_path'];
        $poster_image = 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'];
        ?>
        <div class="featured-content"
            style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('<?php echo esc_url($background_image); ?> '); background-size: cover; background-position: center;">
            <img class="featured-title" src="<?php echo esc_url($poster_image); ?>" alt="<?php echo esc_attr($movie['title']); ?>">
            <p class="featured-desc"><?php echo esc_html($movie['overview']); ?></p>
            <button class="featured-button">WATCH</button>
        </div>
        <?php
    } else {
        echo '<p>Movie details not available.</p>';
    }
}
?>
