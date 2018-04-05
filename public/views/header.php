<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 24/03/2018
 * Time: 23:15
 */

?><div class="banner">
    <div class="col-sm-6 col-md-4 logo float-left"><a href="/"><img class="logo-image" src="/images/calendar.png"></a></div>
    <div class="site-name col-sm-6 col-md-8 float-left">event organizer</div>
    <div class="navbar col-sm-6 col-md-8 float-left">
        <div class="col-sm-6 col-md-3 btn-padding"><a class="btn btn-danger nav-btn" href="/events"><i
                    class="fa fa-calendar"></i> Events</a></div>
        <?php if (empty($_COOKIE['session'])) {
            echo '<div class="col-sm-6 col-md-3 btn-padding"><a class="btn btn-danger nav-btn" href="/login"><i
                    class="fa fa-user"></i> Profile</a></div>';
            echo '<div class="col-sm-6 col-md-3 btn-padding"><a class="btn btn-danger nav-btn" href="/login"><i
                    class="fa fa-sign-in-alt"></i> Login</a></div>';
            echo '<div class="col-sm-6 col-md-3 btn-padding"><a class="btn btn-danger nav-btn" href="/sign-up"><i
                    class="fa fa-user-plus"></i> Register</a></div>';
        } else {
            echo '<div class="col-sm-6 col-md-3 btn-padding"><a class="btn btn-danger nav-btn" href="/profile/'.$_COOKIE['session'].'"><i
                    class="fa fa-user"></i> Profile</a></div>';
            echo '<div class="col-sm-6 col-md-3 btn-padding"><a class="btn btn-danger nav-btn" href="/events/create"><i
                        class="fa fa-plus"></i> Add Event</a></div>';
            echo '<div class="col-sm-6 col-md-3 btn-padding"><a class="btn btn-danger nav-btn" href="/logout"><i
                        class="fa fa-sign-in-alt"></i> Logout</a></div>';
        }
        ?>
    </div>
    <div class="clear-both"></div>
</div>
