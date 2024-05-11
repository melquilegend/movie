<div class="movie-list-container">
                <h1 class="movie-list-title">POPULAR ACTORS</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                    <?php
                        $popular_actors = fetch_popular_actors();
                        if ($popular_actors):
                            foreach (array_slice($popular_actors, 0, 10) as $actor): // Limit to 10 movies
                                $profile_path = esc_url('https://image.tmdb.org/t/p/w500' . $actor['profile_path']);
                                $name = esc_html($actor['name']);
                                ?>
                                <div class="movie-list-item">
                                <img class="movie-list-item-img" src="<?php echo $profile_path; ?>" alt="<?php echo $name; ?>">
                                    <span class="movie-list-item-title"><?php echo $name; ?></span>
                                    <button class="movie-list-item-button"  onclick="location.href='<?php echo site_url(); ?>/actor-detail?actor_id=<?php echo $actor['id']; ?>'">Know More</button>
                                </div>
                            <?php endforeach;
                        else: ?>
                            <p>No popular actors found.</p>
                        <?php endif; ?>
                    </div>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
            </div>