<?php
/** @var array $meta */

assert(isset($user));

$meta['title'] = 'ListWibuKu - ' . $user->username;
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/user';

?>

<div class="user-profile">
    <table>
        <thead>
            <tr class="content-header">
                <h1 class="font-bold">
                    <?= $user->username ?>
                    <?= $user->name ?>
                </h1>
            </tr>
        </thead>
        <tbody>
            <tr class="content-body">
                <td >
                    <div class="profile-info">
                        <div>
                            <span class="font-bold stats-category">Name</span>
                            <span class="stats-value"><?= $user->name ?></span>
                            <span class="font-bold stats-category">Username</span>
                            <span class="stats-value"><?= $user->username ?></span>
                            <span class="font-bold stats-category">Bio</span>
                            <span class="stats-value"><?= $user->bio ?? 'No bio available' ?></span>
                            <span class="font-bold stats-category">Created at</span>
                            <span class="stats-value"><?= $user->created_at ?></span>
                            <span class="font-bold stats-category">Updated at</span>
                            <span class="stats-value"><?= $user->updated_at ?></span>
                        </div>
                    </div>
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>