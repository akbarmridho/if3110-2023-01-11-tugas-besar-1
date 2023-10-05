<?php
/** @var array $meta */

use App\Model\Review;
use App\Model\UserAnime;
use Core\Session\Session;

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
                            <span class="stats-value"><?= $anime->rating ? number_format($anime->rating, 2, '.', '') : 'N/A' ?></span>
                            <span class="font-bold stats-category">Members</span>
                            <span class="stats-value"><?= $anime->members ?? 'N/A'?></span>
                        </div>
                    </div>
                    <div class="anime-manage">
                        <?php if (Session::isAuthenticated()): render_component(
                            'anime-stats/animestats', [
                                'user_anime' => UserAnime::findByUserIdAnimeId(Session::$user->id, $anime->id),
                                'review' => Review::findByUserIdAnimeId(Session::$user->id, $anime->id)
                            ])?>
                        <?php else: ?>
                            <a href='/login' class='btn btn-primary btn-small'>Log in to rate anime</a>
                        <? endif?>
                    </div>
                    <h2 class="font-bold">Description</h2>
                    <div><p><?= $anime->description ?? 'No summary available'?></p></div>
                    <h2 class="font-bold">Trailer</h2>
                    insert video
                    <?php if(Session::isAuthenticated() && is_null(Review::findByUserIdAnimeId(Session::$user->id, $anime->id))) : ?>
                        <h2 class="font-bold">My Review</h2>
                        todo: add review component<br>
                    <?php endif ?>
                    <h2 class="font-bold">Reviews</h2>
                    <?php 
                        $reviews = Review::findByAnimeId($anime->id);
                        if (is_null($reviews)) {
                            echo "No reviews found";
                        } else {
                            render_component('reviews/reviewlist', ['data' => $reviews]);
                        }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>