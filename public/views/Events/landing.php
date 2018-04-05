<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 01/04/2018
 * Time: 14:35
 */

echo "<h1>{$controller->event->title}</h1>";
echo "<p>Created by <a href='/profile/{$controller->user->_id}'>{$controller->user->name}</a></p>";