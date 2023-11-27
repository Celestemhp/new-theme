<?php
$post_id = $post->ID;

$start_date = tribe_get_start_date($event_id, false, 'D d');
$start_time = tribe_get_start_date($event_id, false, 'H:i');
$venue_name = tribe_get_venue($event_id);
$event_categories = get_the_terms($event_id, 'tribe_events_cat');

?>

<a href="<?php the_permalink(); ?>" class="event-item">
    <div class="event-container">

        <div class="event-container--date">
            <h4 class="post-date"><?= $start_date ?></h4>
        </div>

        <div class="event-card--left">
            <h3><?php the_title(); ?></h3>
            <div>
                <p><?= $venue_name ?> kl. <?= $start_time ?></p>
            </div>
        </div>
    </div>
</a>