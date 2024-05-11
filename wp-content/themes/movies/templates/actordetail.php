<div class="container actordetails">
    <?php
    $actor_id = $_GET['actor_id'] ?? 0;
    $actor_details = fetch_from_tmdb("/person/$actor_id");
    $actor = fetch_actor_details($actor_id);

    if ($actor['details']):
        $actor_details = $actor['details'];
        $actor_images = $actor['images'];
        $actor_credits = $actor['credits'];
        $profile_path = 'https://image.tmdb.org/t/p/w500' . $actor_details['profile_path'];
        
    ?>
<?php
        // Include the content template part
        get_template_part('template-parts/actor-details/src', null, ['actor' => $actor, 'profile_path'=>$profile_path, 'actor_details'=>$actor_details]);
?>
    <?php
        else:
            echo '<p>Actor details not available.</p>';
        endif;

    ?>
</div>