<?php
$movie_id = isset($_GET['movie_id']) ? intval($_GET['movie_id']) : 0;
$movie = fetch_movie_by_id($movie_id);
$actors = fetch_movie_cast($movie_id);
$trailers = fetch_movie_trailers($movie_id);
$movie_data = fetch_full_movie_details($movie_id);

// Unpack all data for easier access
$movie = $movie_data['details'];
$alt_titles = $movie_data['alt_titles'];
$reviews = $movie_data['reviews'];
$similar_movies = $movie_data['similar_movies'];
$trailer_link = '';

// Finding the first YouTube trailer, if available
foreach ($trailers as $trailer) {
    if ($trailer['site'] === 'YouTube' && $trailer['type'] === 'Trailer') {
        $trailer_link = 'https://www.youtube.com/watch?v=' . $trailer['key'];
        break;
    }
}

if ($movie) {
    $poster_path = 'https://image.tmdb.org/t/p/original' . $movie['poster_path'];
    $background_path = 'https://image.tmdb.org/t/p/original' . $movie['backdrop_path'];
    $title = $movie['title'];
    $description = $movie['overview'];
} else {
    echo '<p>Movie details not available.</p>';
}
?>
<div class="container details">
<section style="background-image: url('<?php echo esc_url($background_path); ?>');background-size: cover; background-position: center;">
        <img class="poster" src="<?php echo esc_url($poster_path); ?>" alt="<?php echo esc_attr($title); ?>">
        <div class="content-details">
            <div class="details">
                <span class="classification"><?php echo esc_attr($title); ?></span><br>
                <span><?php echo esc_html($movie['vote_average'] * 10 . '%'); ?></span><br>
                <span> Date of Release: <?php echo esc_html($movie['release_date']); ?></span>
                <span></span>
            </div>
            <div class="button">
                 <a href="<?php echo esc_url($trailer_link); ?>" class="btn1" target="_blank"><span class="btn1">Play trailer</span></a>
                <span class="btn2">+ My List</span>
            </div>
        </div>
</section>
<!--Body content here -->
<div class="sec">
<div class="row2">
        <div class="col1">
            <div class="movie-information">
            <h2 class="title-description">Movie information</h2>
            <p><strong>Alternative Titles:</strong> <?php echo implode(', ', array_map(function($title) { return $title['title']; }, $alt_titles)); ?></p>
            <p><strong>Production Companies:</strong> <?php echo implode(', ', array_map(function($company) { return $company['name']; }, $movie['production_companies'])); ?></p>
            <p><strong>Original Language:</strong> <?php echo esc_html($movie['original_language']); ?></p>
            <p><strong>Popularity:</strong> <?php echo esc_html($movie['popularity']); ?></p>
            <h2 class="title-description">Overview</h2>
            <p class="pharagraph"><?php echo esc_html($description); ?></p>
            </div>
        </div>
    </div>
        <?php
        $related_movies = fetch_related_movies($movie_id);  // Ensure you have the movie ID from earlier in your code

        if ($related_movies): ?>
            <div class="info">
                <h1 class="title">Similar Movies</h1>
            </div>
            <div class="row">
                <?php foreach ($related_movies as $movie): ?>
                    <div class="col">
                        <img class="poster_for" src="https://image.tmdb.org/t/p/w500<?php echo esc_attr($movie['poster_path']); ?>" alt="<?php echo esc_attr($movie['title']); ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No similar movies found.</p>
        <?php endif; ?>
    <div class="row2">
        <div class="col1">
        <h2>Cast</h2>
        </div>
    </div>
    <?php if ($actors): ?>
        <div class="row">
            <?php foreach ($actors as $actor): ?>
                 <div class="col">
                    <a class="actor_link" href="<?php echo esc_url(add_query_arg('actor_id', $actor['id'], site_url('/actor-detail'))); ?>"> 
                        <img class="poster_for" src="https://image.tmdb.org/t/p/w500<?php echo esc_attr($actor['profile_path']); ?>" alt="<?php echo esc_attr($actor['name']); ?>">
                        <p class="actor_name"><?php echo esc_html($actor['name']); ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
                <p>No actor information available.</p>
     <?php endif; ?>
</div>
</div>
