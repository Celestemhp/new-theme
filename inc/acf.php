<?php

/**
 * Register block category.
 */
add_filter('block_categories_all', function ($categories, $post) {
    return array_merge(
        array(
            array(
                'slug'  => 'lunnar-blocks',
                'title' => 'Lunnar Blocks',
            ),
        ),
        $categories
    );
}, 10, 2);

/**
 * Register block types.
 */
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {

        $blockName = "accordion";
        register_block_type(__DIR__ . "/../template-parts/blocks/$blockName");
        wp_register_script("block-$blockName", get_template_directory_uri() . "/template-parts/blocks/$blockName/$blockName.js", null, false, true);

        $blockName = "video-embed";
        register_block_type(__DIR__ . "/../template-parts/blocks/$blockName");
        wp_register_script("block-$blockName", get_template_directory_uri() . "/template-parts/blocks/$blockName/$blockName.js", null, false, true);

        $blockName = "shortcut";
        register_block_type(__DIR__ . "/../template-parts/blocks/$blockName");

        $blockName = "stats";
        register_block_type(__DIR__ . "/../template-parts/blocks/$blockName");
        wp_register_script("block-$blockName", get_template_directory_uri() . "/template-parts/blocks/$blockName/$blockName.js", null, false, true);

        $blockName = "news";
        register_block_type(__DIR__ . "/../template-parts/blocks/$blockName");
    });
}

// add options page
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
}
