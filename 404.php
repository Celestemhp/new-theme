<?php $transparent_top = true; ?>

<?php get_header(); ?>

<main class="main-404">

    <h1>404</h1>
    <h3>Síðan ikki funnin</h3>
    <p>Síðan sum tú leitar eftir er tíverri ikki at finna.</p>

    <div class="header-right">
                <a href="<?= home_url(); ?>" class="btn-404">
                    <p>Til forsíðuna</p>
                </a>

            <!-- mobile -->
                <div class="mobile-menu">
                    <a href="#" class="top-menu toggle-menu">
                    <?= svg('icon-menu'); ?>
                    </a>
                </div>
            </div>
</main>

<?php get_footer(); ?>