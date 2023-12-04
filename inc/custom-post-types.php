<?php

/**
 * Helper methods
 */
function lunnar_post_type_labels_nytt($singular = 'Post', $plural = 'Posts')
{
    $p_lower = strtolower($plural);
    $s_lower = strtolower($singular);

    return [
        'name'                     => $plural,
        'singular_name'         => $singular,
        'add_new'                 => "Nýtt $singular",
        'add_new_item'             => "Nýtt $singular",
        'edit_item'             => "Tillaga $singular",
        'view_item'             => "Síggj $singular",
        'view_items'             => "Síggj $plural",
        'search_items'             => "Leita eftir $plural",
        'not_found'             => "Eingin $p_lower funnin",
        'not_found_in_trash'     => "Eingin $p_lower funnin í skrellispann",
        'parent_item_colon'     => "Foreldur at $singular",
        'all_items'             => "Øll $plural",
        'archives'                 => "$singular arkiv",
        'attributes'             => "$singular eginleikar",
        'insert_into_item'         => "Innset í $s_lower",
        'uploaded_to_this_item' => "Uploada til hetta $s_lower",
    ];
}

function lunnar_post_type_labels_nyggj($singular = 'Post', $plural = 'Posts')
{
    $p_lower = strtolower($plural);
    $s_lower = strtolower($singular);

    return [
        'name' => $plural,
        'singular_name'         => $singular,
        'add_new'                 => "Nýggj $singular",
        'add_new_item'             => "Nýggj $singular",
        'edit_item'             => "Tillaga $singular",
        'view_item'             => "Síggj $singular",
        'view_items'             => "Síggj $plural",
        'search_items'             => "Leita eftir $plural",
        'not_found'             => "Eingin $p_lower funnin",
        'not_found_in_trash'     => "Eingin $p_lower funnin í skrellispann",
        'parent_item_colon'     => "Foreldur at $singular",
        'all_items'             => "Allar $plural",
        'archives'                 => "$singular arkiv",
        'attributes'             => "$singular eginleikar",
        'insert_into_item'         => "Innset í $s_lower",
        'uploaded_to_this_item' => "Uploada til hetta $s_lower",
    ];
}

function lunnar_post_type_labels_nyggjan($singular = 'Post', $plural = 'Posts')
{
    $p_lower = strtolower($plural);
    $s_lower = strtolower($singular);

    return [
        'name' => $plural,
        'singular_name'         => $singular,
        'add_new'                 => "Nýggjan $s_lower",
        'add_new_item'             => "Nýggjan $s_lower",
        'edit_item'             => "Tillaga $s_lower",
        'view_item'             => "Síggj $s_lower",
        'view_items'             => "Síggj $p_lower",
        'search_items'             => "Leita eftir $s_lower",
        'not_found'             => "Eingin $p_lower funnin",
        'not_found_in_trash'     => "Eingin $p_lower funnin í skrellispann",
        'parent_item_colon'     => "Foreldur at $s_lower",
        'all_items'             => "Allir $p_lower",
        'archives'                 => "$singular arkiv",
        'attributes'             => "$singular eginleikar",
        'insert_into_item'         => "Innset í $s_lower",
        'uploaded_to_this_item' => "Uploada til henda $s_lower",
    ];
}

function lunnar_post_type_labels_nyggja($singular = 'Post', $plural = 'Posts')
{
    $p_lower = strtolower($plural);
    $s_lower = strtolower($singular);

    return [
        'name' => $plural,
        'singular_name'         => $singular,
        'add_new'                 => "Nýggja $singular",
        'add_new_item'             => "Nýggja $singular",
        'edit_item'             => "Tillaga $singular",
        'view_item'             => "Síggj $singular",
        'view_items'             => "Síggj $plural",
        'search_items'             => "Leita eftir $plural",
        'not_found'             => "Eingin $s_lower funnin",
        'not_found_in_trash'     => "Eingin $s_lower funnin í skrellispann",
        'parent_item_colon'     => "Foreldur at $singular",
        'all_items'             => "Allar $plural",
        'archives'                 => "$singular arkiv",
        'attributes'             => "$singular eginleikar",
        'insert_into_item'         => "Innset í $s_lower",
        'uploaded_to_this_item' => "Uploada til hetta $s_lower",
    ];
}
