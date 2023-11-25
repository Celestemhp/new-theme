<?php
$footer_cols = get_field('footer_columns', 'option');
$address_info = get_field('address_info', 'option');
?>



<div id="footer">
    <div class="main-footer">
        <div class="footer-container alignwide">

            <div class="footer-cols">
                <div class="footer-col">
                    <div class="footer-logo">
                        <?= svg('logo-icon-white'); ?>
                    </div>
                    <p><?= $address_info ?></p>
                </div>

                <div class="footer-col footer-col--nav">
                    <p></p>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'container' => '',
                        'depth' => 1,
                    )); ?>

                    <a href="https://www.mammuhjalpin.fo/" target="_blank" class="link-decoration">
                        Intranet
                        <?= svg('arrow_up'); ?>
                    </a>

                    <div class="hide-mobile">
                        <?php get_template_part('template-parts/elements/social-links'); ?>
                    </div>

                </div>

                <div class="footer-col footer-col--nav materials">
                    <p class="footer-text--bold">Tilfar</p>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'container' => '',
                        'depth' => 1,
                    )); ?>

                    <div class="hide-desktop">
                        <?php get_template_part('template-parts/elements/social-links'); ?>
                    </div>
                </div>

            </div>
        </div>
        <div class="by-footer">
            <div class=" by-footer-content">
                <span>&copy; <?= date("Y"); ?> <?= get_bloginfo('name'); ?></span>
            </div>
        </div>
    </div>
</div>