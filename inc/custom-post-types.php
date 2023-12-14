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
        'add_new'                 => "Nyt $singular",
        'add_new_item'             => "Nyt $singular",
        'edit_item'             => "Tilføj $singular",
        'view_item'             => "Se $singular",
        'view_items'             => "Se $plural",
        'search_items'             => "Led efter $plural",
        'not_found'             => "Intet $p_lower fundet",
        'not_found_in_trash'     => "Intet $p_lower fundet i skraldespanden",
        'parent_item_colon'     => "Forældre for $singular",
        'all_items'             => "Alle $plural",
        'archives'                 => "$singular arkiv",
        'attributes'             => "$singular eginleikar",
        'insert_into_item'         => "Indsæt i $s_lower",
        'uploaded_to_this_item' => "Upload til dette $s_lower",
    ];
}

function lunnar_post_type_labels_nyggj($singular = 'Post', $plural = 'Posts')
{
    $p_lower = strtolower($plural);
    $s_lower = strtolower($singular);

    return [
        'name' => $plural,
        'singular_name'         => $singular,
        'add_new'                 => "Ny $singular",
        'add_new_item'             => "Ny $singular",
        'edit_item'             => "Tilføj $singular",
        'view_item'             => "Se $singular",
        'view_items'             => "Se $plural",
        'search_items'             => "Led efter $plural",
        'not_found'             => "Intet $p_lower fundet",
        'not_found_in_trash'     => "Intet $p_lower fundet i skraldespanden",
        'parent_item_colon'     => "Forældre til $singular",
        'all_items'             => "Alle $plural",
        'archives'                 => "$singular arkiv",
        'attributes'             => "$singular eginleikar",
        'insert_into_item'         => "Indsæt i $s_lower",
        'uploaded_to_this_item' => "Uploada til dette $s_lower",
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
        'add_new'                 => "Ny $singular",
        'add_new_item'             => "Ny $singular",
        'edit_item'             => "Tilføj $singular",
        'view_item'             => "Se $singular",
        'view_items'             => "Se $plural",
        'search_items'             => "Led efter $plural",
        'not_found'             => "Intet $s_lower fundet",
        'not_found_in_trash'     => "Intet $s_lower fundet i skraldespanden",
        'parent_item_colon'     => "Forældre til $singular",
        'all_items'             => "Alle $plural",
        'archives'                 => "$singular arkiv",
        'attributes'             => "$singular eginleikar",
        'insert_into_item'         => "Indsæt i $s_lower",
        'uploaded_to_this_item' => "Uploada til dette $s_lower",
    ];
}
