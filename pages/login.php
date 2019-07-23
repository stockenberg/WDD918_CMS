
<?= \app\core\Status::read('login') ?>

<form class="log-in-form" action="?page=login&action=login" method="post">
    <h4 class="text-center">Log in with you email account</h4>
    <label>Email
        <input type="text" placeholder="somebody@example.com" name="username">
    </label>
    <label>Password
        <input type="password" placeholder="Password" name="password">
    </label>
    <input id="show-password" type="checkbox"><label for="show-password">Show password</label>
    <p><input type="submit" class="button expanded" value="Log in"></p>
    <p class="text-center"><a href="#">Forgot your password?</a></p>
</form>


