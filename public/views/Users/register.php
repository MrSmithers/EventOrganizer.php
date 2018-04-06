<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 01/04/2018
 * Time: 14:35
 */

?>
<h1>Sign up</h1>
<div class="container register-container">
    <form class="col-lg-12 register-form" id="register-form" action="/sign-up" method="post">
        <h2 class="form-signin-heading">Sign up to access our features</h2>
        <input class="input-block-level col-lg-12 form-row form-field" type="text" name="email" placeholder="Email address" autocomplete="email" value="<?= $_POST['email']; ?>"/>
        <input class="input-block-level col-lg-12 form-row form-field" type="password" name="password" placeholder="Password" autocomplete="current-password"/>
        <input class="input-block-level col-lg-12 form-row form-field" type="text" name="name" placeholder="Display name" value="<?= $_POST['name']; ?>"/>
        <?php if (!is_null($controller->_Errors)) : ?>
            <div class="error-container col-lg-12">
                <?php foreach($controller->_Errors as $key => $error) : ?>
                    <div class="error-row col-lg-12"><?= $error; ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <button class="btn btn-large btn-primary col-lg-12 submit" id="register-submit" type="submit">Sign up</button>
    </form>
</div>
