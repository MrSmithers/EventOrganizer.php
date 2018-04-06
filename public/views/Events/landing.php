<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 01/04/2018
 * Time: 14:35
 */

echo '<div class="header">';
echo "<h1>{$controller->event->title}</h1>";
if (!empty($controller->user)) {
    if ($controller->user->_id == $_COOKIE['session']) {
        echo "<a class='btn btn-danger delete event-btn pull-right' href='/events/delete?id={$controller->event->_id}''><i class='fa fa-times'></i> Delete</a>";
        echo "<a class='btn btn-danger edit event-btn pull-right' href='/events/edit?id={$controller->event->_id}''><i class='fa fa-pencil-alt'></i> Edit</a>";
    }
    echo "<p class='created-by'>Created by <a href='/profile/{$controller->user->_id}'>{$controller->user->name}</a></p>";

    echo "<div class='clear-both'></div>";
}
echo '</div>';

echo "<div class='col-lg-12 event-description'><p>{$controller->event->description}</p></div>";