<div id="fgc-menu">
    <div class="fgc-menu--top">

        <div class="top-menu--left">
            <a href="<?= home_url(); ?>" class="top-logo">
                <div class="logo"><?= svg('logo-icon-purple'); ?></div>
            </a>
            <p>Farum Gospel Choir</p>
        </div>

        <div class="fgc-menu--close toggle-menu">
            <?= svg('close-menu'); ?>
        </div>
    </div>

    <div class="menu-content-scroller">
        <div class="menu-content">

            <a href="<?= home_url(); ?>">
                <h3>Forside</h3>
            </a>

            <?php wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => '',
                'depth' => 1,
            )); ?>

            <a href="#" class="btn-header">
                <p>Book nu</p>
            </a>

            <div class="social-links-container">
                <h3>Følg os</h3>
                <div class="menu-social-links">
                    <a href="https://www.facebook.com/FarumGospel" target="_blank">
                        <?= svg('fb-iconvir'); ?>
                    </a>
                    <a href="https://instagram.com/farumgospelchoir?igshid=MmVlMjlkMTBhMg==" target="_blank">
                        <?= svg('ig-icon'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>