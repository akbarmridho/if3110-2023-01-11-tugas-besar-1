<?php
/** @var array $meta */

$meta['title'] = 'Change Password';
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/edit-password';

?>

<div class="register">
    <h1 class="font-semibold">Change Password</h1>
    <form action="/profile/password" method="post">
        <input name="_method" value="PUT" hidden/>
        <div class="form-control">
            <label for="oldPassword">Old Password</label>
            <input type="password" name="oldPassword" placeholder="Password" id="password" required minlength="6"/>
            <?php if (isset($errors) && array_key_exists('oldPassword', $errors)): ?>
                <p class="text-danger text-small"><?= implode(', ', $errors['oldPassword']) ?></p>
            <?php endif ?>
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
        <input type="submit" value="Update Password">
    </form>
</div>
