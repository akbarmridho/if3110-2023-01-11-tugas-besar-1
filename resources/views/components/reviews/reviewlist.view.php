<section class="review-list">
    <?php
    /** @var array $data */
    foreach ($data as $review) {
        render_component('reviews/review', ['review' => $review]);
    }
    ?>
</section>