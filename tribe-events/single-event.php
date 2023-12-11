<?php get_header(); ?>

<?php
$event_id = get_the_ID(); // Få indlæggets ID som event_id
$event = get_post($event_id); // Hent indlægget som et objekt

$start_date = tribe_get_start_date($event_id, false, 'D, F j, Y');
$event_cost = tribe_get_cost($event);
$start_time = tribe_get_start_date($event_id, false, 'H:i');
$event_map = tribe_get_embedded_map($event, $force_load = false, $width = null, $height = null);
?>

<script>
    let postId = <?= $event_id; ?>;
    let postDuration = '<?= $event->post_duration; ?>';
</script>

<main class="post-page--event alignwide">

    <div class="post-event--content">
        <div class="">
            <?php echo tribe_event_featured_image($event->ID, 'thumbnail'); ?>
        </div>

        <div class="single-event--content">

            <h1><?= the_title(); ?></h1>

            <div class="single-event--description">
                <h4>Upplýsingar um event</h4>
                <p><?php the_content() ?></p>
            </div>

            <div class="info">
                <div class="info-container">
                    <div class="time-container">
                        <?= svg('icon-schedule'); ?>
                        <h5><?= $start_time ?></h5>
                    </div>

                    <div class="date-container">
                        <?= svg('icon-event'); ?>
                        <h5><?= $start_date ?></h5>
                    </div>
                </div>

                <div class="info-container">
                    <div class="location-container">
                        <?= svg('icon-location'); ?>
                        <h5><?= tribe_get_venue($event_id); ?></h5>
                    </div>

                    <div class="price-container">
                        <?= svg('icon-price'); ?>
                        <h5><?= $event_cost ?>,-</h5>
                    </div>
                </div>
                <div class="categories-container">
                    <?= svg('icon-genres'); ?>
                    <h5>
                        <?php $event_categories = get_the_terms($event_id, 'tribe_events_cat');
                        if (!empty($event_categories) && !is_wp_error($event_categories)) {
                            foreach ($event_categories as $category) {
                                echo $category->name . '<br>';
                            }
                        }
                        ?>
                    </h5>
                </div>

            </div>

            <div class="map-container">
                <?= $event_map ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>