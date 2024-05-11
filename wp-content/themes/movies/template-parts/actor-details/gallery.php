<?php
if (isset($args['images'])):
    $images = $args['images'];  // Now $images contains what was passed as 'images'
?>
<h2>Gallery</h2>
    <div class="gallery">
        <?php foreach (array_slice($images, 0, 10) as $image): ?>
            <img class="actor-gallery" src="https://image.tmdb.org/t/p/w500<?php echo esc_attr($image['file_path']); ?>" alt="Gallery Image">
        <?php endforeach; ?>
    </div>
    <?php
else:
    echo '<p>No images available.</p>';
endif;
?>    
    