<?php
$popular_actors = fetch_popular_actors();
if ($popular_actors):
?>
<div class="movie-list-container">
    <header class="section-header">
        <h1 class="title">Best Actors</h1>
        <p class="subtitle">All our reviews sorted alphabetically.</p>
    </header>
    <div class="reviews-grid">
        <?php foreach ($popular_actors as $actor):
            $profile_path = esc_url('https://image.tmdb.org/t/p/w500' . $actor['profile_path']);
            $name = esc_html($actor['name']);
            ?>
            <a class="actor_link" href="<?php echo site_url(); ?>/actor-detail?actor_id=<?php echo $actor['id']; ?>">
            <article class="review-card">
                <figure class="card-image">
                    <img src="<?php echo $profile_path; ?>" alt="<?php echo $name; ?>">
                </figure>
                <div class="card-content">
                    <h3 class="movie-title"><?php echo esc_html($name); ?></h3>
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
