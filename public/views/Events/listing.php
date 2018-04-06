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
    <?php if (!empty($controller->events)) : ?>
        <?php foreach ($controller->events as $event) : ?>
             <div class='col-md-6 event-container'>
                 <a href='/events/view/<?= $event->_id ?>/<?= $event->urlTitle ?>'><h2><?= $event->title ?></h2></a>
                 <p><?= $event->description ?></p>
             </div>
        <?php endforeach; ?>
        <div class="clear-both"></div>
    <?php else : ?>
        <p>There are no events to be shown.</p>
    <?php endif; ?>
</div>