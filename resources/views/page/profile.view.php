<?php
/** @var array $meta */
/** @var array $stats */
/** @var \App\Model\User $user */

$meta['title'] = 'ListWibuKu - ' . $user->username;
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/profile';

?>

<div class="profile">
    <div class="profile-head">
        <div><h1><?= $user->username ?>'s Profile</h1></div>
        <?php if ($user->id === \Core\Session\Session::$user?->id) : ?>
            <div>
                <a href="" class="link">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path fill="#b2c8f0"
                              d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
                        </svg>
                    </span>
                    Edit Profile
                </a>
            </div>
        <?php endif ?>
    </div>
    <div class="profile-body">
        <div class="profile-info">
            <img src="<?= assets('profile.png') ?>" alt="Image profile" class="profile-image"/>
            <p class="profile-name"> <?= $user->name ?></p>
            <p class="profile-join">Joined <?= date_format($user->created_at, "d-m-Y") ?></p>
        </div>
        <div class="profile-detail">
            <div class="profile-bio">
                <p>
                    <?php if (is_null($user->bio) || $user->bio === ""): ?>
                        No biography yet.
                        <?php if ($user->id === \Core\Session\Session::$user?->id) : ?>
                            <a href="" class="link">Write it now</a>
                        <?php endif ?>
                    <?php else: ?>
                        <?= $user->bio ?>
                    <?php endif ?>
                </p>
            </div>
            <div class="profile-stats">
                <p class="font-semibold">Anime Statistics</p>
                <div class="anime-stats">
                    <div>
                        <p>Mean score</p>
                    </div>
                    <div>
                        <p><?= is_null($stats['mean_score']) ? 'N/A' : number_format($stats['mean_score'], 2, '.', '') ?></p>
                    </div>
                    <div>
                        <p>Wishlist</p>
                    </div>
                    <div>
                        <p><?= $stats['wishlist'] ?></p>
                    </div>
                    <div>
                        <p>Watching</p>
                    </div>
                    <div>
                        <p><?= $stats['watching'] ?></p>
                    </div>
                    <div>
                        <p>Watched</p>
                    </div>
                    <div>
                        <p><?= $stats['watched'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
