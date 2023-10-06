<?php
/**
 * @var array $data
 * @var int $currentPage
 * @var int $totalPage
 * */
?>

    <section class="cards-anime">
        <?php
        foreach ($data as $anime) {
            render_component('anime-list/card', ['anime' => $anime]);
        }
        ?>
    </section>

<?php render_component('common/pagination', [
    'currentPage' => $currentPage,
    'totalPage' => $totalPage
]); ?>