<?php

$filters = [
    'name' => $_GET['name'] ?? '',
    'year' => $_GET['year'] ?? '',
    'genre' => $_GET['genre'] ?? ''
];
$movies = get_all_movies_filter($filters);
$genres = fetch_movie_genres(); // Fetch genres dynamically
?>
<div class="movie-list-container">
    <header class="section-header">
        <h1 class="title">Seach</h1>
        <p class="subtitle">All our reviews sorted alphabetically.</p>
    </header>
    <div class="filter-controls">
        <input type="text" id="filterName" placeholder="Filter by name or title...">
        <input type="number" id="filterYear" placeholder="Year...">
        <select id="filterGenre" placeholder="Genre...">
            <option value="">Select Genre</option>
            <?php if ($genres): foreach ($genres as $genre): ?>
                <option value="<?php echo esc_attr($genre['id']); ?>"><?php echo esc_html($genre['name']); ?></option>
            <?php endforeach; endif; ?>
        </select>
        <button onclick="applyFilters()">Apply Filters</button>
    </div>
    <div class="reviews-grid">
        <?php if (!empty($movies['results'])): foreach ($movies['results'] as $movie): ?>
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
        <?php endforeach; else: ?>
            <p>No movies found.</p>
        <?php endif; ?>
    </div>
</div>


