<?php
$post_id = $post->ID;
$post_thumbnail_id = get_post_thumbnail_id($post_id);
$post_image_url = get_the_post_thumbnail_url($post_id, 'medium');
$post_focal_points = get_focal_points($post_thumbnail_id);

$short_text = get_short_text($post->post_content, 115);

// Pass the post date to get_formatted_date function
$date = get_formatted_date($post->post_date, $short = true, $lang = 'fo');
?>

<a href="<?= get_the_permalink($post_id) ?>" class="post--card">
    <div class="post--card-content">
        <div class="post--card-image">
            <img src="<?= $post_image_url; ?>" alt="" style="object-position: <?= $post_focal_points ?>" />
        </div>
        <div class="post-card--text">
            <h5><?php echo get_the_title($post_id); ?></h5>
            <p><?= $short_text ?></p>
            <h6 class="post-date"><?php echo $date; ?></h6>
        </div>
    </div>
</a>