<div class="movie-list-container">
                <h1 class="movie-list-title">NEW RELEASES</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                    <?php
                        $latest_movies = fetch_latest_movies();
                        if ($latest_movies):
                            foreach (array_slice($latest_movies, 0, 10) as $movie): // Limit to 10 movies
                                $poster_path = esc_url('https://image.tmdb.org/t/p/w500' . $movie['poster_path']);
                                $title = esc_html($movie['title']);
                                $description = esc_html($movie['overview']);
                                ?>
                                <div class="movie-list-item">
                                    <img class="movie-list-item-img" src="<?php echo $poster_path; ?>" alt="<?php echo $title; ?>">
                                    <span class="movie-list-item-title"><?php echo $title; ?></span>
                                    <p class="movie-list-item-desc"><?php echo truncate_text(esc_html($description), 100); ?></p>
                                    <button class="movie-list-item-button" onclick="location.href='<?php echo site_url(); ?>/movie-detail?movie_id=<?php echo $movie['id']; ?>'">More</button>
                                </div>
                            <?php endforeach;
                        else: ?>
                            <p>No latest movies found.</p>
                        <?php endif; ?>
                    </div>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
            </div>