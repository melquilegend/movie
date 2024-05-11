<?php
if (isset($args['actor'])):
    $actor_info = $args['actor'];
    
    $actor_details = $args['actor_details'];
    $actor_images = $args['actor']['images'];
    $actor_credits = $args['actor']['credits'];
    $profile_path = $args['profile_path'];

     get_template_part('template-parts/actor-details/actor-detais-feature', null, ['actor_info' =>$actor_info,'profile_path'=>$profile_path, 'actor_details'=>$actor_details]);
     get_template_part('template-parts/actor-details/known-for', null, ['actor_credits' =>$actor_credits]);
     get_template_part('template-parts/actor-details/gallery', null, ['images' =>$actor_images]);

else:
    echo '<p>No actor data provided.</p>';
endif;
?>
