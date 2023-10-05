<?php
/** @var array $meta */

assert(isset($user));

$meta['title'] = 'ListWibuKu - ' . $user->username;
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/profile';

?>

<div class="user-profile">
    <table>
        <thead>
            <tr class="content-header">
                <h1 class="font-bold">
                    <?= $user->username ?> - <?= $user->name ?>
                </h1>
            </tr>
        </thead>
        <tbody>
            <tr class="content-body">
                <div class="profile-info">
                    <div>
                        <span class="font-bold profile-category">Name</span>
                        <span class="profile-value"><?= $user->name ?></span>
                    </div>
                    <div>
                        <span class="font-bold profile-category">Username</span>
                        <span class="profile-value"><?= $user->username ?></span>
                    </div>
                    <div>
                        <span class="font-bold profile-category">Bio</span>
                        <span class="profile-value"><?= $user->bio ?? 'No bio available' ?></span>
                    </div>
                    <div>
                        <span class="font-bold profile-category">Created at</span>
                        <span class="profile-value"><?= $user->created_at ?></span>
                    </div>
                    <div>
                        <span class="font-bold profile-category">Updated at</span>
                        <span class="profile-value"><?= $user->updated_at ?></span>
                    </div>
                </div>
            </tr>
        </tbody>
    </table>
</div>