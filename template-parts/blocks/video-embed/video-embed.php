<?php
$blockName = "embed";

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lunnar-' . $blockName;
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// fields 
$embed = get_field('embed') ?: null;
$fallback_image = get_field('fallback_image') ?: null;
$play_btn_only = get_field('play_btn_only') ?: false;
$play_btn_text = get_field('play_btn_text') ? get_field('play_btn_text') : 'Button text here...';

$video_id = "";
$type = "";
$thumbnail = "";

if ($embed && is_string($embed)) {
    preg_match('/src="(.+?)"/', $embed, $matches);

    $src = $matches[1];
    $parse = parse_url($src);


    if (($parse['host'] == 'vimeo.com') || ($parse['host'] == 'www.vimeo.com') || ($parse['host'] == 'player.vimeo.com')) {
        $video_id = ltrim($parse['path'], '/video/');
        $type = "vimeo";

        // get thumbnail from vimeo api
        if (!$play_btn_only) {
            $apiData = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$video_id.php"));
            $videoInfo = $apiData[0];
            $thumbnail = $videoInfo['thumbnail_large'];
        }
    }

    if (($parse['host'] == 'youtube.com') || ($parse['host'] == 'youtu.be') || ($parse['host'] == 'www.youtube.com')) {
        $url = $parse['path'];
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $src, $match);
        $video_id = $match[1];
        $type = "youtube";
        $thumbnail = 'https://img.youtube.com/vi/' . $video_id . '/maxresdefault.jpg';
    }
}

if ($fallback_image) {
    $thumbnail = $fallback_image['sizes']['large'];
}
?>

<div <?= $anchor; ?> class="<?= esc_attr($className); ?>" data-type="<?= $type; ?>" data-id="<?= $video_id; ?>">
    <?php if (is_admin() && !$embed) : ?>
        <div class="block-notice"><?php _e('This block is empty. Please click here to add content.', 'lunnar'); ?></div>
    <?php endif; ?>

    <?php if (!$play_btn_only) : ?>
        <a href="#" class="embed--image lunnar-embed-video-overlay">
            <?php if ($thumbnail) : ?>
                <img src="<?= $thumbnail; ?>" />
            <?php endif; ?>

            <div class="embed--image-btn"><?= svg('icon-play'); ?></div>
        </a>
    <?php else : ?>
        <div class="embed--btn-only">
            <a href="#" class="lunnar-embed-video-overlay">
                <?= $play_btn_text ?>
                <?= svg('icon-play'); ?>
            </a>
        </div>
    <?php endif; ?>
</div>