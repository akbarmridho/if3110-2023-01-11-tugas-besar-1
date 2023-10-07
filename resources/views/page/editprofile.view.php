<?php
/** @var array $meta */

$meta['title'] = 'Edit Profile';
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/edit-profile';

$user = \Core\Session\Session::$user;
assert(!is_null($user));

?>

<div class="edit-profile">
    <h1 class="font-semibold">Edit Profile</h1>
    <form action="/profile/edit" method="post">
        <input name="_method" value="PUT" hidden/>
        <div class="form-control">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username" id="username" disabled minlength="6"
                   value="<?= $user->username ?>"/>
            <p class="text-small">Username cannot be changed</p>
        </div>
        <div class="form-control">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" id="name" required minlength="6"
                   value="<?= $user->name ?>"/>
        </div>
        <div class="form-control">
            <label for="bio">Biography</label>
            <textarea id="bio" name="bio" rows="5" cols="50"><?= $user->bio ?></textarea>
        </div>
        <input type="submit" value="Update">
    </form>
</div>
