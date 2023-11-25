<div id="lunnar-menu">
    <div class="lunnar-menu--top">
        <div class="lunnar-menu--close toggle-menu">
            <?= svg('close-menu'); ?>
        </div>
    </div>

    <div class="menu-content-scroller">
        <div class="menu-content">

            <a href="<?= home_url(); ?>">
                <h3>Forsíða</h3>
            </a>

            <?php wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => '',
                'depth' => 1,
            )); ?>

            <a href="https://www.mammuhjalpin.fo/" target="_blank" class="menu-link-container">
                <h3 class="menu-link">Mammuhjálpin</h3>
                <?= svg('arrow_up'); ?>
            </a>

            <div class="social-links-container">
                <h3>Fylg okkum</h3>
                <div class="menu-social-links">
                    <a href="https://www.facebook.com/provita.fo/" target="_blank">
                        <?= svg('icon-facebook'); ?>
                    </a>
                    <a href="https://www.instagram.com/fyrilivi/" target="_blank">
                        <?= svg('icon-instagram'); ?>
                    </a>
                    <a href="https://www.youtube.com/channel/UCCYe59QXf8awAfpnouCXXNg" target="_blank">
                        <?= svg('icon-youtube'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>