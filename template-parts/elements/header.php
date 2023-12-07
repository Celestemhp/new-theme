<?php
global $transparent_top;
$has_large_image = get_field('large_image');

if (is_single() && $has_large_image) {
    $transparent_top = true;
}
?>

<div id="header" class="<?php echo $transparent_top ? 'has-transparent-top' : ''; ?>">
    <div class="header-content">

        <div class="menu-wrapper">

            <a href="<?= home_url(); ?>" class="header-left">
                <div class="logo logo-std"><?= svg('logo-icon-purple'); ?></div>
                <div class="logo logo-transparent"><?= svg('logo-icon-purple'); ?></div>
                <p>Farum Gospel Choir</p>
            </a>

            <div class="header-right">

                <?php wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container' => '',
                    'depth' => 1,
                )); ?>

                <a href="#" class="btn-header btn-secondary right-link">
                    <p>Book nu</p>
                </a>

                <!-- mobile -->
                <div class="mobile-menu">
                    <a href="#" class="top-menu toggle-menu">
                        <?= svg('icon-menu'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($transparent_top) : ?>
    <div class="header-gradient"></div>
<?php endif; ?>