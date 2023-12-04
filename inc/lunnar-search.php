
<?php
/**
 * Post types to index.
 */
function theme_search_post_types()
{
    $post_types = array('post', 'page', 'people', 'forms', 'jobs', 'tribe_events', 'publication');

    return $post_types;
}
add_filter('lunnar_search_post_types', 'theme_search_post_types', 11, 1);

/**
 * Serialize Post Types.
 */
function lunnar_search_serialize(WP_Post $post)
{
    /**
     * Post
     */
    if ($post->post_type === 'post') {
        $tags = array_map(function (WP_Term $term) {
            return $term->name;
        }, wp_get_post_terms($post->ID, 'post_tag'));

        $categories = array_map(function (WP_Term $term) {
            return $term->name;
        }, wp_get_post_terms($post->ID, 'category'));

        $attributes = array(
            'objectID' => implode('#', [$post->post_type, $post->ID]),
            'post_id' => $post->ID,
            'post_type' => $post->post_type,
            'post_title' => $post->post_title,
            'excerpt' => $post->post_excerpt,
            'content' => mb_substr(stripcslashes(strip_tags($post->post_content)), 0, 5000, 'UTF-8'),
            'post_tag' => $tags,
            'post_category' => $categories,
            'url' => get_post_permalink($post->ID),
            'search_weight' => 2
        );

        return $attributes;
    }

    /**
     * Page
     */
    if ($post->post_type === 'page') {
        return [
            'objectID' => implode('#', [$post->post_type, $post->ID]),
            'post_id' => $post->ID,
            'post_type' => $post->post_type,
            'post_title' => $post->post_title,
            'excerpt' => $post->post_excerpt,
            'content' => mb_substr(stripcslashes(strip_tags($post->post_content)), 0, 5000, 'UTF-8'),
            'url' => get_post_permalink($post->ID),
            'search_weight' => 2
        ];
    }

    /**
     * Events
     */
    if ($post->post_type === 'tribe_events') {
        $tags = array_map(function (WP_Term $term) {
            return $term->name;
        }, wp_get_post_terms($post->ID, 'post_tag'));

        $categories = array_map(function (WP_Term $term) {
            return $term->name;
        }, wp_get_post_terms($post->ID, 'tribe_events_cat'));

        $attributes = array(
            'objectID' => implode('#', [$post->post_type, $post->ID]),
            'post_id' => $post->ID,
            'post_type' => $post->post_type,
            'post_title' => $post->post_title,
            'excerpt' => $post->post_excerpt,
            'content' => mb_substr(stripcslashes(strip_tags($post->post_content)), 0, 5000, 'UTF-8'),
            'post_tag' => $tags,
            'post_category' => $categories,
            'url' => get_post_permalink($post->ID),
            'search_weight' => 2
        );

        return $attributes;
    }

    /**
     * Jobs
     */
    if ($post->post_type === 'jobs') {

        $attributes = array(
            'objectID' => implode('#', [$post->post_type, $post->ID]),
            'post_id' => $post->ID,
            'post_type' => $post->post_type,
            'post_title' => $post->post_title,
            'excerpt' => $post->post_excerpt,
            'content' => mb_substr(stripcslashes(strip_tags($post->post_content)), 0, 5000, 'UTF-8'),
            'url' => get_post_permalink($post->ID),
            'search_weight' => 2
        );

        return $attributes;
    }

    /**
     * Forms
     */
    if ($post->post_type === 'forms') {

        $categories = array_map(function (WP_Term $term) {
            return $term->name;
        }, wp_get_post_terms($post->ID, 'category'));

        $attributes = array(
            'objectID' => implode('#', [$post->post_type, $post->ID]),
            'post_id' => $post->ID,
            'post_type' => $post->post_type,
            'post_title' => $post->post_title,
            'excerpt' => $post->post_excerpt,
            'files' => get_field('files', $post->ID),
            'content' => mb_substr(stripcslashes(strip_tags($post->post_content)), 0, 5000, 'UTF-8'),
            'post_category' => $categories,
            'url' => get_post_permalink($post->ID),
            'search_weight' => 2
        );

        return $attributes;
    }

    /**
     * Publication
     */
    if ($post->post_type === 'publication') {
        $tags = array_map(function (WP_Term $term) {
            return $term->name;
        }, wp_get_post_terms($post->ID, 'post_tag'));

        $categories = array_map(function (WP_Term $term) {
            return $term->name;
        }, wp_get_post_terms($post->ID, 'category'));

        $attributes = array(
            'objectID' => implode('#', [$post->post_type, $post->ID]),
            'post_id' => $post->ID,
            'post_type' => $post->post_type,
            'post_title' => $post->post_title,
            'excerpt' => $post->post_excerpt,
            'content' => mb_substr(stripcslashes(strip_tags($post->post_content)), 0, 5000, 'UTF-8'),
            'post_tag' => $tags,
            'post_category' => $categories,
            'url' => get_post_permalink($post->ID),
            'year' >= get_field('year', $post->ID),
            'search_weight' => 2
        );

        return $attributes;
    }

    /**
     * People
     */
    if ($post->post_type === 'people') {

        $categories = array_map(function (WP_Term $term) {
            return $term->name;
        }, wp_get_post_terms($post->ID, 'people_categories'));

        $img = wp_get_attachment_image_src(get_field('image', $post->ID), 'medium');

        $image = [];

        if ($img) {
            $image = [
                'url' => $img[0],
                'focal_point' => get_focal_points(get_field('image', $post->ID))
            ];
        }

        return [
            'objectID' => implode('#', [$post->post_type, $post->ID]),
            'post_id' => $post->ID,
            'post_type' => $post->post_type,
            'post_title' => $post->post_title,
            'excerpt' => $post->post_excerpt,
            'image' => $image,
            'content' => mb_substr(stripcslashes(strip_tags($post->post_content)), 0, 5000, 'UTF-8'),
            'url' => '/starvsfolk?q=' . $post->post_title,
            'title' => get_field('title', $post->ID),
            'email' => get_field('email', $post->ID),
            'phone' => get_field('phone', $post->ID),
            'post_category' => count($categories) ? $categories[0] : '',
            'search_weight' => 2
        ];
    }
}
add_filter('post_to_record', 'lunnar_search_serialize');

/**
 * Search Settings
 */
function lunnar_get_search_settings($defaultSettings)
{
    return [
        'searchableAttributes' => [
            'post_title',
            'content',
            'post_tag',
            'post_category',
            'year',
            'phone',
            'email',
            'title'
        ],
        'attributesForFaceting' => [
            'searchable(post_type)',
            'searchable(post_tag)',
            'searchable(post_category)',
            'searchable(title)',
        ],
        'attributesToHighlight' => [
            '*'
        ],
        'ranking' => [
            'asc(search_weight)',
            'asc(title)',
            'typo',
            'geo',
            'words',
            'filters',
            'proximity',
            'attribute',
            'exact',
            'custom',
        ]
    ];
}
add_filter('lunnar_get_search_settings', 'lunnar_get_search_settings');
