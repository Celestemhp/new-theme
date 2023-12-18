<?php
$blockName = "shortcut";

$id = $blockName . '_' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$className = 'fgc-' . $blockName;
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$image = get_field('image');
$link = get_field('link');

// Set variables directly using null coalescing operator
$url = $link['url'] ?? null;
$title = $link['title'] ?? null;
$target = $link['target'] ?? '_self'; // Default to '_self' if not provided
?>

<div id="<?= $id; ?>" class="<?= $className; ?>">
    <?php if ($url) : ?>
        <a href="<?= esc_url($url) ?>" target="<?= esc_attr($target) ?>">
            <div class="shortcut-image">
                <?php if ($image) : ?>
                    <img src="<?= esc_url($image['sizes']['medium']) ?>" alt="<?= esc_attr($image['alt']) ?>" width="<?= esc_attr($image['sizes']['medium-width']) ?>" height="<?= esc_attr($image['sizes']['medium-height']) ?>" />
                <?php endif; ?>
            </div>

            <div class="shortcut-link"><?= esc_html($title) ?></div>
        </a>
    <?php endif; ?>
</div>