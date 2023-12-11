<?php
$footer_cols = get_field('footer_columns', 'option');
$address_info = get_field('address_info', 'option');
?>



<div id="footer">
    <div class="main-footer">
        <div class="footer-container alignwide">

            <div class="footer-cols">
                <div class="footer-col footer-col-logo">
                    <a href="<?= home_url(); ?>" class="footer-logo">
                        <?= svg('logo-icon-white'); ?>
                    </a>
                    <h4>Farum Gospel Choir</h4>
                </div>

                <div class="footer-col footer-col--nav">
                    <div>
                        <p class="footer-text--bold">om</p>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'footer-menu',
                            'container' => '',
                            'depth' => 1,
                        )); ?>
                    </div>
                    <div>
                        <p class="footer-text--bold">mere</p>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'footer-menu2',
                            'container' => '',
                            'depth' => 1,
                        )); ?>
                        <a href="<?= home_url(); ?>" target="_blank" class="link-decoration">
                            Intranet
                            <?= svg('arrow_up'); ?>
                        </a>
                    </div>
                    <div class="footer-col informations">
                        <p class="footer-text--bold">Farum Gospel Choir</p>

                        <p><?= $address_info ?></p>

                        <div class="hide-desktop">
                            <?php get_template_part('template-parts/elements/social-links'); ?>
                        </div>
                        <div class="hide-mobile">
                            <?php get_template_part('template-parts/elements/social-links'); ?>
                        </div>
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