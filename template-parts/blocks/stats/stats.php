<?php
$blockName = "stats";

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

$stats = get_field('stats');
?>

<div id="<?= $id; ?>" class="<?= $className; ?>">

    <?php if (is_admin() && !$stats) : ?>
        <div class="block-notice">
            <h3>Hagtøl</h3>
            <p><?php _e('Blokkurin er tómur. Vinarliga legg tilfar til.', 'lunnar'); ?></p>
        </div>
    <?php endif; ?>

    <div class="stats-slider swiper">
        <div class="swiper-wrapper">
            <?php foreach ($stats as $item) : ?>

                <?php
                $cleanNumber = 0;

                // string
                $string = $item['value'];

                // get number
                $number = preg_replace('/[^\d]/', '', $string);
                $number = (float)$number;

                $suffix = "";
                if ($item['suffix']) {
                    $suffix = $item['suffix'];
                }
                ?>

                <div class="stat-item swiper-slide" data-number="<?= $number ?>">
                    <h2><span><?= $item['value'] ?></span><?= $suffix ?></h2>
                    <p><?= $item['description']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="swiper-pagination"></div>
    </div>

</div>