<?php
$blockName = "news";

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

$categories = get_field('categories');
$tags = get_field('tags');
$amount = get_field('amount');

$tax_query = [];

if ($categories || $tags) {
    $tax_query = array(
        'relation' => 'AND'
    );

    if ($categories) {
        $category_query = array(
            'taxonomy' => 'category',
            'terms'    => $categories
        );

        $tax_query[] = $category_query;
    }

    if ($tags) {
        $tag_query = array(
            'taxonomy' => 'post_tag',
            'terms'    => $tags
        );

        $tax_query[] = $tag_query;
    }
}

$posts = get_posts(array(
    'posts_per_page'        => $amount ? $amount : 3,
    'post_status'           => 'publish',
    'post_type'             => 'post',
    'tax_query'             => $tax_query
));

global $post;
?>

<div id="<?= $id; ?>" class="<?= $className; ?>">

    <?php if (is_admin() && !$posts) : ?>
        <div class="block-notice"><?php _e('Blokken er tom'); ?></div>
    <?php endif; ?>

    <?php if ($posts) : ?>

        <div class="news-container">

            <?php foreach ($posts as $post) {

                setup_postdata($post);

                get_template_part('template-parts/cards/news-card');

                wp_reset_postdata();
            }
            ?>
        </div>

    <?php endif; ?>
</div>