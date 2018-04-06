<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 05/04/2018
 * Time: 20:35
 */

echo '<p>Are you sure you want to delete this?</p>';
echo "<a class='btn btn-outline-danger confirm-button' href='/events/delete/confirm?id={$controller->id}''><i class='fa fa-check'></i> Confirm</a>";
echo "<a class='btn btn-light confirm-button' href='/events/view/{$controller->id}''><i class='fa fa-times'></i> Cancel</a>";
