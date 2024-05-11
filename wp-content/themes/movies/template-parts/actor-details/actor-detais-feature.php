<?php
if (isset($args['actor_info'])):
    $actor_details = $args['actor_details']; 
    $profile_path=$args['profile_path'];
?>
    <div class="actor-detail-container">
        <div class="actor-image">
            <img src="<?php echo esc_url($profile_path); ?>" alt="<?php echo esc_attr($actor_details['name']); ?>">
        </div>
        <div class="actor-content">
            <h1><?php echo esc_html($actor_details['name']); ?></h1>
            <p class="actor-bio"><?php echo nl2br(esc_html($actor_details['biography'])); ?></p>
            <div class="actor-details">
                <p><strong>Birthday:</strong> <?php echo esc_html($actor_details['birthday']); ?></p>
                <p><strong>Place of Birth:</strong> <?php echo esc_html($actor_details['place_of_birth']); ?></p>
                <?php if (!empty($actor_details['deathday'])): ?>
                    <p><strong>Day of Death:</strong> <?php echo esc_html($actor_details['deathday']); ?></p>
                <?php endif; ?>
                <?php if (!empty($actor_details['homepage'])): ?>
                    <p><strong>Website:</strong> <a href="<?php echo esc_url($actor_details['homepage']); ?>" target="_blank">Visit</a></p>
                <?php endif; ?>
                <p><strong>Popularity:</strong> <?php echo esc_html($actor_details['popularity']); ?></p>
            </div>
        </div>
    </div>
<?php
else:
    echo '<p>No images available.</p>';
endif;
?>    