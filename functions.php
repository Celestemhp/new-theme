<?php
require_once('inc/acf.php');
require_once('inc/enqueue.php');
require_once('inc/custom-post-types.php');
require_once('inc/lunnar-search.php');

add_theme_support('align-wide');
add_theme_support('wp-block-styles');

/**
 * Constants
 */
define('THEME_ROOT', get_template_directory_uri());
define('IMAGES', THEME_ROOT . '/images');
define('SCRIPTS', THEME_ROOT . '/js');
define('STYLES', THEME_ROOT . '/css');

/**
 * Register Menus
 */
function register_my_menus()
{
    register_nav_menus(array(
        'main-menu' => 'Main Menu',
        'footer-menu' => 'Footer Menu',
        'footer-menu2' => 'Footer Menu2',
        'legal-menu' => 'Legal Menu',
    ));
}
add_action('init', 'register_my_menus');

/**
 * Hide WP admin bar
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Add thumbnails support
 */
add_theme_support('post-thumbnails');

add_theme_support('custom-spacing');

function single_id_template($template)
{
    $post_id = get_the_ID();

    if (is_single() &&  $post_id) {
        $_template = locate_template(array('single-' . $post_id . '.php'));
        $template = ($_template) ? $_template : $template;
    }

    return $template;
}

/**
 * Ninjaforms translations
 */
function da_i18n_front_end($strings)
{
    $strings['fieldsMarkedRequired'] = 'Felter med <span class="ninja-forms-req-symbol">*</span> skal udfyldes.';
    $strings['validateRequiredField'] = 'Dette er et påkrævet felt.';
    $strings['formErrorsCorrectErrors'] = 'Ret fejlene';
    $strings['changeEmailErrorMsg'] = 'Skriv en korrekt email';

    return $strings;
}
add_filter('ninja_forms_i18n_front_end', 'da_i18n_front_end');


/**
 * Echo an SVG with alt attribute
 */
function svg($name, $alt = '')
{
    $image_url = get_template_directory_uri() . '/images/';
    echo '<img data-src="' . $image_url . $name . '.svg" class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="' . esc_attr($alt) . '" />';
}


/**
 * Prevent Wordpress from making _scaled images on large image sizes
 */
add_filter('big_image_size_threshold', '__return_false');

/**
 * Convert date.
 */
function convert_date($format, $time = null)
{
    $my_locale = my_locale(); // Hent den aktuelle lokalitet

    if ($time == null) $time = time();

    if ($my_locale == "en_US") return strftime($format, $time);
    else {
        global $fo_locale_string;
        $fo_locale_string = array(
            "weekday" => array("Søndag", "Mandag", "Tirsdag", "Onsdag", "Torsdag", "Fredag", "Lørdag"),
            "weekday_initial" => array("M", "T", "O", "T", "F", "L", "S"),
            "weekday_abbrev" => array("Søn", "Man", "Tirs", "Ons", "Tors", "Fre", "Lør"),
            "month" => array("januar", "februar", "marts", "april", "maj", "juni", "juli", "august", "september", "oktober", "november", "december"),
            "month_abbrev" => array("jan", "feb", "mar", "apr", "maj", "jun", "jul", "aug", "sept", "okt", "nov", "dec")
        );

        $format = str_replace("%a", $fo_locale_string["weekday_abbrev"][strftime("%w", $time)], $format);  //day abbreviation
        $format = str_replace("%A", $fo_locale_string["weekday"][strftime("%w", $time)], $format);  //day name
        $format = str_replace("%b", $fo_locale_string["month_abbrev"][strftime("%m", $time) - 1], $format);  //month abbreviation (it's 1-based index - hence the subtraction)
        $format = str_replace("%B", $fo_locale_string["month"][strftime("%m", $time) - 1], $format);  //month abbreviation (it's 1-based index - hence the subtraction)
        return strftime($format, $time);
    }
}

function get_formatted_date($post_date, $short = true, $lang = 'da')
{
    $date = new DateTime($post_date);

    if (!$date) {
        return null;
    }

    $months = ["januar", "februar", "marts", "april", "maj", "juni", "juli", "august", "september", "oktober", "november", "december"];

    if ($short) {
        $months = ["jan.", "feb.", "mar.", "apr.", "maj", "jun.", "jul.", "aug.", "sept.", "okt.", "nov.", "dec."];
    }

    if ($lang !== 'da') {
        $months = ["Jan.", "Feb.", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        if ($short) {
            $months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.", "Jul.", "Aug.", "Sept.", "Oct.", "Nov.", "Dec."];
        }
    }

    $day = $date->format('d');
    $month = $months[intval($date->format('m'))];
    $year = $date->format('Y');

    return $day . '. ' . $month . ' ' . $year;
}

function get_simple_date($post_date)
{
    $date = new DateTime($post_date);

    if (!$date) {
        return null;
    }

    return $date->format('d.m.y');
}

/**
 * Get short text.
 */
function get_short_text($text, $chars = 110)
{
    $sanitized = sanitize_text_field($text);

    if (strlen($sanitized) <= $chars) {
        $the_str = mb_substr($sanitized, 0, $chars, "utf-8");
    } else {
        $the_str = mb_substr($sanitized, 0, $chars, "utf-8") . '...';
    }

    return $the_str;
}

/**
 * Move Yoast to bottom
 */
function yoasttobottom()
{
    return 'low';
}

add_filter('wpseo_metabox_prio', 'yoasttobottom');


function get_yeost_primary_cat_id($postId)
{

    $category = get_the_category($postId);

    // If post has a category assigned.
    if ($category) {
        $category_id  = "";
        if (class_exists('WPSEO_Primary_Term')) {
            // Show the post's 'Primary' category, if this Yoast feature is available, & one is set.
            $wpseo_primary_term = new WPSEO_Primary_Term('category', get_the_id($postId));
            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
            $term               = get_term($wpseo_primary_term);
            if (is_wp_error($term)) {
                // Default to first WP category (not Yoast) if an error is returned.
                $category_id    = $category[0]->term_id;
            } else {
                // Yoast Primary category.
                $category_id    = $term->term_id;
            }
        } else {
            // Default, display the first category in WP's list of assigned categories.
            $category_id    = $category[0]->term_id;
        }

        return $category_id;
    }
}


function get_yeost_primary_cat($postId)
{

    $category = get_the_category($postId);

    // If post has a category assigned.
    if ($category) {
        $category_slug  = "";
        if (class_exists('WPSEO_Primary_Term')) {
            // Show the post's 'Primary' category, if this Yoast feature is available, & one is set.
            $wpseo_primary_term = new WPSEO_Primary_Term('category', get_the_id($postId));
            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
            $term               = get_term($wpseo_primary_term);
            if (is_wp_error($term)) {
                // Default to first WP category (not Yoast) if an error is returned.
                $class_exists    = $category[0]->slug;
            } else {
                // Yoast Primary category.
                $class_exists    = $term->slug;
            }
        } else {
            // Default, display the first category in WP's list of assigned categories.
            $class_exists    = $category[0]->slug;
        }

        return $class_exists;
    }
}


add_theme_support('yoast-seo-breadcrumbs');

/**
 * Fix for themes customization
 */
add_filter('wp_get_nav_menu_items', 'my_wp_get_nav_menu_items', 10, 3);
function my_wp_get_nav_menu_items($items, $menu, $args)
{
    foreach ($items as $key => $item)
        $items[$key]->description = '';

    return $items;
}


/**
 * Get nav menu items by location
 *
 * @param $location The menu location id
 */
function get_nav_menu_items_by_location($location, $args = [])
{

    // Get all locations
    $locations = get_nav_menu_locations();

    // Get object id by location
    $object = wp_get_nav_menu_object($locations[$location]);

    // Get menu items by menu name
    $menu_items = wp_get_nav_menu_items($object->name, $args);

    // Return menu post objects
    return $menu_items;
}
