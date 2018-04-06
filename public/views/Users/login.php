<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 01/04/2018
 * Time: 14:35
 */

?>
<h1>Login</h1>
<p>Please log in to your account</p>
<div class="container login-container">
    <form class="form-signin col-lg-12 login-form" id="login-form" action="/login" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input class="input-block-level col-lg-12 form-row form-field" type="text" name="email" placeholder="Email address" autocomplete="email" value="<?= $_POST['email']; ?>"/>
        <input class="input-block-level col-lg-12 form-row form-field" type="password" name="password" placeholder="Password" autocomplete="current-password"/>
        <label class="checkbox col-lg-12"><input type="checkbox" value="remember-me" name="remember-me"/> <span class="checkbox-text">Remember me</span></label>
        <input class="input-block-level" type="hidden" name="redirect" value="<?= $controller->redirect; ?>"/>
        <?php if (!is_null($controller->_Errors)) : ?>
            <div class="error-container col-lg-12">
                <?php foreach($controller->_Errors as $key => $error) : ?>
                    <div class="error-row col-lg-12"><?= $error; ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <button class="btn btn-large btn-primary col-lg-12 submit" id="login-submit" type="submit">Sign in</button>
        <div class="col-lg-12 login-register-link">Not registered? <a href="/sign-up">Register now</a></div>
    </form>
</div>