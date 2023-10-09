<?php
/** @var \App\Model\Review $review */

use Core\Session\Session;

?>

<div class="review" id="review-<?= $review->id?>">
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
    <?php if(Session::isAuthenticated() && $review->user_id == Session::$user->id) {
        render_component('reviews/reviewmanage', ['review' => $review]);
    } ?>
    <br>
</div>
