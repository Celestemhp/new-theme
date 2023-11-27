<?php
$blockName = "events";
$id = $blockName . '_' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$className = 'lunnar-' . $blockName;
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$number_of_posts = get_field('number_of_posts') ? get_field('number_of_posts') : 5;

// fields 
global $post;

$events = tribe_get_events(array(
    'posts_per_page'        => $number_of_posts,
    'post_type'             => 'tribe_events',
    'post_status'            => 'publish',
    'meta_query' => array(
        array(
            'key'        => '_EventStartDate',
            'compare'    => '>',
            'value'        => date('Y-m-d'),
        )
    )
));

?>

<div id="<?= $id; ?>" class="<?= $className; ?> ">
    <div class="events">
        <?php if (is_admin() && !$events) : ?>
            <div class="block-notice"><?php _e('Blokken er tom'); ?></div>
        <?php endif; ?>

        <?php foreach ($events as $post) : setup_postdata($post); ?>
            <?php get_template_part('template-parts/cards/events-card'); ?>
        <?php endforeach; ?>
    </div>
</div>