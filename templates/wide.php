<?php /* Template Name: Wide */ ?>

<?php get_header(); ?>

<?php
global $hide_page_title;
?>

<main class="post-page alignwide">
    <?php if (!$hide_page_title) : ?><h1 class="post-title"><?= get_the_title(); ?></h1><?php endif; ?>

    <?php the_content(); ?>
</main>

<?php get_footer(); ?>