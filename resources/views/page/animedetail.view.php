<?php
/** @var array $meta */

assert(isset($anime));

$meta['title'] = 'ListWibuKu - ' . $anime->title;
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/animedetail';

?>

<div class="anime">
    <table>
        <thead>
            <tr class="content-header">
                <h1 class="font-bold">
                    <?= $anime->title ?>
                </h1>
            </tr>
        </thead>
        <tbody>
            <tr class="content-body">
                <td class="left-content">
                    <img src="<?= $anime->poster ? storage($anime->poster) : assets('default-poster.jpg') ?>" alt="<?= $anime->title ?>">
                    <h2 class="font-bold">Information</h2>
                    <div class="anime-info"><span class="font-semibold">Title:</span> <?= $anime->title?></div>
                    <div class="anime-info"><span class="font-semibold">Studio:</span> <?= $anime->studio ?? '?'?></div>
                    <div class="anime-info"><span class="font-semibold">Genre:</span> <?= $anime->genre ?? '?'?></div>
                    <div class="anime-info"><span class="font-semibold">Episode Count:</span> <?= $anime->episode_count ?? '?'?></div>
                    <div class="anime-info"><span class="font-semibold">Air Date Start:</span> <?= $anime->air_date_start ?? '?'?></div>
                    <div class="anime-info"><span class="font-semibold">Air Date End:</span> <?= $anime->air_date_end ?? '?'?></div>
                </td>
                <td class="right-content">
                    <div class="anime-stats">
                        <div>
                            <span class="font-bold stats-category">Score</span>
                            <span class="stats-value"><?= 8.9?></span>
                            <span class="font-bold stats-category">Members</span>
                            <span class="stats-value"><?= 10000?></span>
                        </div>
                    </div>
                    <div class="anime-manage">
                        <a href='#' class="btn btn-primary btn-small">Add to list</a>
                        <select>
                            <!--  placeholder -->
                            <option selected>Select rating</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <h2 class="font-bold">Description</h2>
                    <div><p><?= $anime->description ?? 'No summary available'?></p></div>
                    <h2>Trailer</h2>
                    insert video
                    <h2>Review</h2>
                    insert reviews
                </td>
            </tr>
        </tbody>
    </table>
</div>