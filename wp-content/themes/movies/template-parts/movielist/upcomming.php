<?php
$movies = get_all_movies();
if ($movies):
?>
<div class="movie-list-container">
    <header class="section-header">
        <h1 class="title">All Movie Reviews</h1>
        <p class="subtitle">All our reviews sorted alphabetically.</p>
    </header>
    <div class="reviews-grid">
        <?php foreach ($movies as $movie): ?>
            <a class="actor_link" href="<?php echo site_url(); ?>/movie-detail?movie_id=<?php echo $movie['id']; ?>">
            <article class="review-card">
                <figure class="card-image">
                    <img src="https://image.tmdb.org/t/p/w500<?php echo esc_attr($movie['poster_path']); ?>" alt="<?php echo esc_attr($movie['title']); ?>">
                </figure>
                <div class="card-content">
                    <h3 class="movie-title"><?php echo esc_html($movie['title']); ?></h3>
                    <div class="genre"><?php echo esc_html($movie['genre_names']); ?></div>
                    <div class="movie-rating"><?php echo esc_html($movie['vote_average']); ?></div>
                </div>
            </article>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?php
else:
    echo '<p>No movies found.</p>';
endif;

?>
