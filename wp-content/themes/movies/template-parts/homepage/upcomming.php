<div class="movie-list-container">
    <h1 class="movie-list-title">UPCOMMING MOVIES</h1>
    <?php
    $upcoming_movies = get_upcoming_movies_by_month();    
    foreach ($upcoming_movies as $month_year => $movies): ?>
        <h2><?php echo esc_html($month_year); ?></h2>
        <div class="movie-list-wrapper">
            <div class="movie-list">
                <?php foreach ($movies as $movie): ?>
                    <div class="movie-list-item">
                        <img class="movie-list-item-img" src="https://image.tmdb.org/t/p/w500<?php echo esc_attr($movie['poster_path']); ?>" alt="<?php echo esc_attr($movie['title']); ?>">
                        <span class="movie-list-item-title"><?php echo esc_html($movie['title']); ?></span>
                        <p class="movie-list-item-desc"><?php echo truncate_text($movie['overview'], 90); ?></p>
                        <button class="movie-list-item-button" onclick="location.href='<?php echo site_url(); ?>/movie-detail?movie_id=<?php echo $movie['id']; ?>'">More</button>
                    </div>
                <?php endforeach; ?>
            </div>
            <i class="fas fa-chevron-right arrow"></i>
        </div>
    <?php endforeach; ?>
</div>
