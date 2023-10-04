<section class="cards-anime">
    <?php
    /* @var array $data */
    foreach ($data as $anime) {
        render_component('anime-list/card', ['anime' => $anime]);
    }
    ?>
</section>