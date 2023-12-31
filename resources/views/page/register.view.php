<?php
/** @var array $meta */

$meta['title'] = 'Register';
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/register';

?>

<div class="register">
    <h1 class="font-semibold">Register</h1>
    <form action="/register" method="post">
        <div class="form-control">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username" id="username" required minlength="6"
                   value="<?= isset($old) && array_key_exists('username', $old) ? $old['username'] : '' ?>"/>
            <?php if (isset($errors) && array_key_exists('username', $errors)): ?>
                <p class="text-danger text-small"><?= implode(', ', $errors['username']) ?></p>
            <?php endif ?>
        </div>
        <div class="form-control">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" id="name" required minlength="6"
                   value="<?= isset($old) && array_key_exists('name', $old) ? $old['name'] : '' ?>"/>
        </div>
        <div class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" id="password" required minlength="6"/>
            <?php if (isset($errors) && array_key_exists('password', $errors)): ?>
                <p class="text-danger text-small"><?= implode(', ', $errors['password']) ?></p>
            <?php endif ?>
        </div>
        <div class="form-control">
            <label for="passwordVerify">Password Confirmation</label>
            <input type="password" name="passwordVerify" placeholder="Password" id="passwordVerify" required
                   minlength="6"/>
        </div>
        <p class="login-cta">Have an account? <a href="/login">Login here</a></p>
        <input type="submit" value="Register">
    </form>
</div>
