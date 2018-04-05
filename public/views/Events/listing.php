<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 01/04/2018
 * Time: 14:35
 */

?>
<h1>Events Listing</h1>
<div class="events-container">
    <?php
    if (!empty($controller->events)) {
        foreach ($controller->events as $event) {
            echo "<div class='col-md-6 event-container'><a href='/events/view/{$event->_id}/" . _clean($event->title) . "'><h2>{$event->title}</h2></a>";
            echo "<p>{$event->description}</p></div>";
        }
        echo '<div class="clear-both"></div>';
    } else {
        echo '<p>There are no events to be shown.</p>';
    }
    ?>
</div>
<?php

function _clean($string) {
    $string = strtolower($string);
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^a-z0-9\-]/', '', $string); // Removes special chars.

    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}