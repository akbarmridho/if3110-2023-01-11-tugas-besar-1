<?php
/** @var \App\Model\Review $review */

?>

<div class="review">
    <div class="review-head">
        <span class="review-user"><a href="/profile/<?= $review->user_id ?>"><?=($review->user_id)?></a></span>
        <span class="review-update-time">Last updated <?= date('Y-m-d', strtotime(strval($review->updated_at))) ?></span>
    </div>
    <div class="review-rating">
        <span class='font-semibold'>Rating:</span>
        <span><?= $review->rating ?><br></span>

    </div>
    <div class="review-content">
        <?= $review->review ?><br>
    </div>
</div>
