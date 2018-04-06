<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 05/04/2018
 * Time: 20:01
 */

echo 'This is the events edit page';
?>
<h1>Edit Event</h1>
<hr/>
<div class="container col-sm-10">
    <form class="form-signin col-lg-12" action="/events/edit" method="post">
        <h2 class="form-signin-heading">Create an event</h2>
        <input class="input-block-level col-lg-12 form-row form-field" type="text" name="title" value="<?= $controller->event->title; ?>"/>
        <textarea class="input-block-level col-lg-12 form-row form-field" name="description"><?= $controller->event->description; ?></textarea>
        <input class="input-block-level col-lg-12 form-row form-field datetimepicker" type="text" name="datetime" value="<?= $controller->event->datetime; ?>"/>
        <input class="input-block-level" type="hidden" name="userId" value="<?= $controller->event->userId; ?>"/>
        <input class="input-block-level" type="hidden" name="eventId" value="<?= $controller->event->_id; ?>"/>
        <button class="btn btn-large btn-primary col-lg-12 form-submit" type="submit">Finish editing</button>
    </form>
</div>
