<?php
/** @var \App\Model\Review $review */

use Core\Session\Session;
?>

<div class="review-edit">
    <a href='/review/edit/<?= $review->id?>' class='btn btn-primary btn-small'>Edit review</a>
    <button id="review-delete-button" class='btn btn-danger btn-small' data-modal="review-delete">Delete review</button>
</div>

<div class="modal" id="review-delete">
    <div class="modal-bg modal-exit"></div>
    <div class="modal-container">
        <h1 class="modal-title">Are you sure?</h1>
        <div class="modal-body"><p>Are you sure want to remove this review?</p></div>
        <div class="modal-action">
            <button class="btn modal-exit">Cancel</button>
            <button class="btn btn-danger" id="review-delete-form"
                    data-id="<?= $review->id ?>">Delete
            </button>
        </div>
        <button class="modal-close modal-exit">X</button>
    </div>
</div>

<div class="toast" id="toast-review-delete">
    <div class="toast-body">
        Review deleted
    </div>
</div>