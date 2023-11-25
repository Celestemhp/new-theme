<?php get_header(); ?>

<?php
global $wp_query;
$term = $wp_query->queried_object;
?>

<main class="post-archive-page alignwide">
    <h1 class="post-title"><?= $term->name ?></h1>

    <?php if (have_posts()) : ?>
        <div class="posts--list">
            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('template-parts/cards/news-card'); ?>

            <?php endwhile; ?>
        </div>

        <?php the_posts_pagination(); ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>