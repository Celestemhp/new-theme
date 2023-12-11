<?php
/*
    Enqueue styles & scripts.
*/
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');
    wp_enqueue_style('magnific-css', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.min.css');

    wp_enqueue_script('axios', 'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js', null, null, true);
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', null, null, true);
    wp_enqueue_script('lazyload', 'https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.0/dist/lazyload.min.js', null, null, true);

    // for magnific popup
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-1.12.4.min.js', null, null, true);
    wp_enqueue_script('magnific', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js', null, null, true);

    wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue@2.6.14', null, null, true);

    // enqueue algolia if search is enabled
    if (get_field('search', 'option')) {
        wp_register_script('algolia-index-name', '', true);
        wp_enqueue_script('algolia-index-name');
        wp_add_inline_script('algolia-index-name', "var algolia_index_name = '" . apply_filters('lunnar_search_indexname', null) . "';");

        wp_enqueue_script('algolia', 'https://cdn.jsdelivr.net/npm/algoliasearch@4.5.1/dist/algoliasearch-lite.umd.js', null, null, true);

        wp_register_script('algolia-id', '', true);
        wp_enqueue_script('algolia-id');
        wp_add_inline_script('algolia-id', "var algolia_application_id = '" . get_field('application_id', 'option') . "'; var algolia_api_key = '" . get_field('search-only_api_key', 'option') . "';");

        // Algolia
        wp_enqueue_script('algolia-search-lite', 'https://cdn.jsdelivr.net/npm/algoliasearch@4.5.1/dist/algoliasearch-lite.umd.js', null, null, true);
        wp_enqueue_script('algolia-settings', get_template_directory_uri() . '/js/algolia-settings.js', array('jquery'), '', true);
        wp_enqueue_script('search', get_template_directory_uri() . '/js/search.js', null, null, true);
    }


    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', null, null, true);
});

/*
    Enqueue Gutenberg styles & scripts.
*/
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style('lunnar-starter-two-backend', get_template_directory_uri() . '/css/editor.min.css');
});
