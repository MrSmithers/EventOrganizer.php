<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 03/04/2018
 * Time: 00:22
 */

echo 'This is the events creation page';
?>
<h1>Create Event</h1>
<hr/>
<div class="container col-sm-10">
    <form class="form-signin col-lg-12" action="/events/create" method="post">
        <h2 class="form-signin-heading">Create an event</h2>
        <input class="input-block-level col-lg-12 form-row form-field" type="text" name="title" placeholder="Event Title"/>
        <textarea class="input-block-level col-lg-12 form-row form-field" name="description" placeholder="Description..."></textarea>
        <input class="input-block-level col-lg-12 form-row form-field datetimepicker" type="text" name="datetime" placeholder="dd/mm/yyyy"/>
        <input class="input-block-level" type="hidden" name="userId" value="<?php echo $_COOKIE['session'] ?>"/>
        <button class="btn btn-large btn-primary col-lg-12 form-submit" type="submit">Create Event</button>
    </form>
</div>
