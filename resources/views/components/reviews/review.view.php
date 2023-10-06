<?php
/** @var \App\Model\Review $review */

use Core\Session\Session;

?>

<div class="review">
    <!-- todo: review editor -->
    <div class="review-head">
        <span class="review-user"><a href="/profile/<?= $review->user_id ?>"><?=($review->username)?></a></span>
        <span class="review-update-time">Last updated <?= date('Y-m-d', strtotime(strval($review->updated_at))) ?></span>
    </div>
    <div class="review-rating">
        <span class='font-semibold'>Rating:</span>
        <span><?= $review->rating ?><br></span>
    </div>
    <div class="review-content">
        <?= $review->review ?><br>
    </div>
    <div class="review-edit">
        <?php if(Session::isAuthenticated()) : ?>
            <?php if($review->user_id == Session::$user->id || Session::$user->role == 'ADMIN') : ?>
                <a href='#' class='btn btn-primary btn-small'>Edit review</a>
                <!-- todo: edit review -->
            <?php endif ?>
        <?php endif ?>
    </div>
</div>
