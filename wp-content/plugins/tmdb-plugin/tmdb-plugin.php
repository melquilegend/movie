<?php
/*
Plugin Name: TMDB Integration
Description: Fetches data from The Movie Database API.
Version: 1.0
Author: Melqui
*/

defined('ABSPATH') or die('Direct script access disallowed.');

define('TMDB_API_KEY', 'f5c787e2a151a693af227bf0226a55f4');
define('TMDB_API_URL', 'https://api.themoviedb.org/3');

function fetch_from_tmdb($endpoint) {
    $url = TMDB_API_URL . $endpoint . '?api_key=' . TMDB_API_KEY;
    $response = wp_remote_get($url);
    if (is_wp_error($response)) {
        return false; // Handle errors appropriately
    }
    $body = wp_remote_retrieve_body($response);
    return json_decode($body, true);
}
// Code for tmdb_upcoming_movies_shortcode and tmdb_popular_actors_shortcode
function tmdb_upcoming_movies_shortcode() {
    $movies = fetch_from_tmdb('/movie/upcoming');
    $output = '<div class="movies">';
    foreach ($movies['results'] as $movie) {
        $output .= '<div class="movie">';
        $output .= '<img src="https://image.tmdb.org/t/p/w500' . $movie['poster_path'] . '" alt="' . esc_attr($movie['title']) . '">';
        $output .= '<h3>' . esc_html($movie['title']) . '</h3>';
        $output .= '<p>Release Date: ' . esc_html($movie['release_date']) . '</p>';
        $output .= '</div>';
    }
    $output .= '</div>';
    return $output;
}
add_shortcode('tmdb_upcoming_movies', 'tmdb_upcoming_movies_shortcode');

function tmdb_popular_actors_shortcode() {
    $actors = fetch_from_tmdb('/person/popular');
    $output = '<div class="actors">';
    foreach ($actors['results'] as $actor) {
        $output .= '<div class="actor">';
        $output .= '<img src="https://image.tmdb.org/t/p/w500' . $actor['profile_path'] . '" alt="' . esc_attr($actor['name']) . '">';
        $output .= '<h3>' . esc_html($actor['name']) . '</h3>';
        $output .= '</div>';
    }
    $output .= '</div>';
    return $output;
}
add_shortcode('tmdb_popular_actors', 'tmdb_popular_actors_shortcode');

function tmdb_styles() {
    wp_enqueue_style('tmdb-style', plugins_url('assets/css/tmdb-style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'tmdb_styles');

function fetch_movie_by_id($movie_id) {
    return fetch_from_tmdb("/movie/$movie_id");
}


function fetch_latest_movies() {
    $movies = fetch_from_tmdb('/movie/now_playing');
    return $movies ? $movies['results'] : false;
}

function fetch_upcoming_movies() {
    $movies = fetch_from_tmdb('/movie/upcoming');
    return $movies ? $movies['results'] : false;
}

function get_upcoming_movies_by_month() {
    $movies = fetch_upcoming_movies();
    $grouped_movies = [];

    if ($movies) {
        foreach ($movies as $movie) {
            if (!empty($movie['release_date'])) {
                $month_year = date('F Y', strtotime($movie['release_date']));
                $grouped_movies[$month_year][] = $movie;
            }
        }
    }

    return $grouped_movies;
}

function fetch_popular_actors() {
    $actors = fetch_from_tmdb('/person/popular');
    return $actors ? $actors['results'] : false;
}

function fetch_movie_cast($movie_id) {
    $cast = fetch_from_tmdb("/movie/$movie_id/credits");
    return $cast ? $cast['cast'] : false;
}
function fetch_movie_trailers($movie_id) {
    $trailers = fetch_from_tmdb("/movie/$movie_id/videos");
    return $trailers ? $trailers['results'] : false;
}

function fetch_related_movies($movie_id) {
    $related_movies = fetch_from_tmdb("/movie/$movie_id/similar");
    return $related_movies ? $related_movies['results'] : false;
}

function fetch_full_movie_details($movie_id) {
    // Fetch the main movie details
    $movie_details = fetch_from_tmdb("/movie/$movie_id");

    // Fetch additional details like alternative titles, reviews, and similar movies
    $alt_titles = fetch_from_tmdb("/movie/$movie_id/alternative_titles");
    $reviews = fetch_from_tmdb("/movie/$movie_id/reviews");
    $similar_movies = fetch_from_tmdb("/movie/$movie_id/similar");
    $credits = fetch_from_tmdb("/movie/$movie_id/credits");

    // Combine all data into one array
    return [
        'details' => $movie_details,
        'alt_titles' => $alt_titles['titles'] ?? [],
        'reviews' => $reviews['results'] ?? [],
        'similar_movies' => $similar_movies['results'] ?? [],
        'cast' => $credits['cast'] ?? []
    ];
}

function fetch_actor_details($actor_id) {
    // Fetch main actor details
    $details = fetch_from_tmdb("/person/$actor_id");
    
    // Fetch actor images (for the gallery)
    $images = fetch_from_tmdb("/person/$actor_id/images");

    // Fetch actor's movie credits
    $credits = fetch_from_tmdb("/person/$actor_id/movie_credits");

    return [
        'details' => $details,
        'images' => $images['profiles'] ?? [],
        'credits' => $credits['cast'] ?? []
    ];
}

function get_all_movies() {
    $movies = fetch_from_tmdb('/movie/popular');  // This endpoint can be changed based on the actual requirement
    return $movies ? $movies['results'] : false;
}


function get_all_movies_filter($filters = []) {
    if (!empty($filters['name']) || !empty($filters['year']) || !empty($filters['genre'])) {
        $params = [];
        if (!empty($filters['name'])) {
            $params['query'] = $filters['name'];
        }
        if (!empty($filters['year'])) {
            $params['year'] = $filters['year'];
        }
        if (!empty($filters['genre'])) {
            $params['with_genres'] = $filters['genre'];
        }
        return fetch_from_tmdb('/discover/movie', $params);
    } else {
        return fetch_from_tmdb('/movie/popular');
    }
}
function fetch_movie_genres() {
    // This uses the same fetch_from_tmdb function we defined earlier
    $genres = fetch_from_tmdb('/genre/movie/list');
    return $genres ? $genres['genres'] : false;
}
