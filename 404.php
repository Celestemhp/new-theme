<?php $transparent_top = true; ?>

<?php get_header(); ?>

<main class="main-404">

    <h1>404</h1>
    <h3>Siden ikke fundet</h3>
    <p>Siden du leder efter findes ikke</p>

    <div class="header-right">
        <a href="<?= home_url(); ?>" class="btn-404">
            <p>Til forside</p>
        </a>

        <!-- mobile -->
        <div class="mobile-menu">
            <a href="#" class="top-menu toggle-menu">
                <?= svg('icon-menu', 'icon-menu'); ?>
            </a>
        </div>
    </div>
</main>

<?php get_footer(); ?>