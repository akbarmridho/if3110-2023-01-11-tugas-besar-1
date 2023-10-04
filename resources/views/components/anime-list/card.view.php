<?php
/** @var \App\Model\Anime $anime */
?>

<div class="card-anime">
    <div class="card-anime-title">
        <a href="/anime/<?= $anime->id ?>"><?= $anime->title ?></a>
    </div>
    <div class="card-anime-sub">
        <div class="card-anime-release">
            <p><?= $anime->air_date_start ?? 'No date available' ?></p>
        </div>
        <div class="card-anime-episode">
            <p><?= $anime->episode_count ?? '??' ?> eps</p>
        </div>
    </div>
    <div class="card-anime-body">
        <div class="card-anime-poster">
            <img src="<?= $anime->poster ? storage($anime->poster) : assets('default-poster.jpg') ?>" alt="">
        </div>
        <div class="card-anime-description">
            <p>
                <?= $anime->description ?? 'No description available' ?>
            </p>
            <br>
            <p>
                <span class="font-semibold">Genre:</span> <?= $anime->genre ?? 'No info available' ?>
            </p>
            <p>
                <span class="font-semibold">Studio:</span> <?= $anime->studio ?? 'No info available' ?>
            </p>
        </div>
    </div>
    <div class="card-anime-footer">
        <div class="card-anime-rating">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path
                        fill="#e5e7eb"
                        d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/>
            </svg>
            <p><?= $anime->rating ? number_format($anime->rating, 2, '.', '') : 'N/A' ?></p>
        </div>
        <div class="card-anime-members">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path fill="#e5e7eb"
                      d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
            </svg>
            <p><?= $anime->members ?? 0 ?></p>
        </div>
        <div class="card-anime-action">
            <a class="btn btn-primary btn-small" href="/anime/<?= $anime->id ?>">More Info</a>
        </div>
    </div>
</div>