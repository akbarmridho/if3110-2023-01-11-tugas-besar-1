<section class="review-list">
    <?php
    /** @var array $data */
    /** @var int $user_id */
    if (isset($user_id)) {
        for ($i = 0; $i < count($data); $i++) { 
            if ($data[$i]->user_id == $user_id) {
                $tmp = $data[0];
                $data[0] = $data[$i];
                $data[$i] = $tmp;
    
                break;
            }
        }
    }
    foreach ($data as $review) {
        render_component('reviews/review', ['review' => $review]);
    }
    ?>
</section>