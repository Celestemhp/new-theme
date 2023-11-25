<?php
$blockName = "accordion";

$id = $blockName . '_' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$className = 'lunnar-' . $blockName;
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$accordion = get_field('accordion');
?>

<div id="<?= $id; ?>" class="<?= $className; ?>">

    <?php if (is_admin() && !$accordion) : ?>
        <div class="block-notice">
            <h3>Accordion / OSS</h3>
            <p><?php _e('Blokkurin er tómur. Vinarliga legg tilfar til.', 'lunnar'); ?></p>
        </div>
    <?php endif; ?>

    <?php foreach ($accordion as $item) : ?>
        <div class="accordion-item">
            <div class="accordion-item--title">
                <?= $item['title']; ?>
                <div class="accordion-item--title-plus">
                </div>
            </div>
            <div class="accordion-item--content">
                <?= $item['content']; ?>
            </div>
        </div>
    <?php endforeach; ?>

</div>