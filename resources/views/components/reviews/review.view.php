<?php
/** @var \App\Model\Review $review */

use Core\Session\Session;

?>

<div class="review">
    <div class="review-head">
        <div class="review-user"><a href="/profile/<?= $review->user_id ?>"><?= ($review->username) ?></a></div>
        <div class="review-update-time">Last updated <?= date_format($review->updated_at, 'Y-m-d') ?></div>
    </div>
    <div class="review-rating">
        <span class=''>Rating:</span>
        <span><?= $review->rating ?><br></span>
    </div>
    <div class="review-content">
        <?= $review->review ?><br>
    </div>
    <div class="review-edit">
        <?php if (Session::isAuthenticated()) : ?>
            <?php if ($review->user_id == Session::$user->id) : ?>
                <a href='/review/edit/<?= $review->id?>' class='btn btn-primary btn-small'>Edit review</a>
                <a href='#' class='btn btn-danger btn-small'>Delete review</a>
            <?php endif ?>
        <?php endif ?>
    </div>
    <br>
</div>
