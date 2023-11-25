<?php get_header(); ?>

<?php
global $post;

// post image
$post_thumbnail_id = get_post_thumbnail_id($post->ID);
if ($post_thumbnail_id) {
    $image_url = get_the_post_thumbnail_url($post->ID, 'large');
    $image_focal_points = get_focal_points($post_thumbnail_id);
}

$image_caption = wp_get_attachment_caption($post_thumbnail_id);
?>

<main class="post-page post-single">
    <a href="#" class="post-back">
        <?= svg('arrow_chevron'); ?>
        <p>Aftur</p>
    </a>

    <?php if ($post_thumbnail_id) : ?>
        <div class="post-image alignwide">
            <div class="the-image">
                <img src="<?= $image_url ?>" style="object-position: <?= $image_focal_points ?>;" alt="" />
            </div>
            <?php if ($image_caption) : ?>
                <small><?= $image_caption ?></small>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="post-date"><?php echo get_formatted_date($post->post_date, false); ?></div>

    <h1 class="post-title"><?= get_the_title(); ?></h1>

    <?php the_content(); ?>

</main>

<script>
    // Get the button element by its id
    var theBackButton = document.querySelector('.post-back');

    // Add a click event listener to the button
    theBackButton.addEventListener('click', function(e) {
        e.preventDefault();
        // Go back in history
        window.history.back();
    });
</script>

<?php get_footer(); ?>