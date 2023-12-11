<?php
$class = '';

if (is_page()) {
    global $post;
    $paddingClass = "";

    $parents = get_post_ancestors($post->ID);
    $id = ($parents) ? $parents[count($parents) - 1] : $post->ID;
    $parent = get_post($id);

    $class = 'page-' . $parent->post_name . " " . $paddingClass;

    global $hide_page_title;
    global $transparent_top;
    $hide_page_title = get_field('hide_page_title');
    $transparent_top = get_field('transparent_top');
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="da">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />

    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="HandheldFriendly" content="true" />
    <meta name="apple-mobile-web-app-capable" content="YES" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">




    <link rel="icon" type="image/png" sizes="16x16" href="<?= IMAGES; ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= IMAGES; ?>/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= IMAGES; ?>/apple-touch-icon.png">

    <?php wp_head(); ?>
</head>

<body <?php body_class($class); ?>>
    <div id="body-wrapper">
        <?php get_template_part('template-parts/elements/header'); ?>
        <?php get_template_part('template-parts/elements/menu'); ?>