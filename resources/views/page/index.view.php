<?php
/** @var array $meta
 * @var array $data
 * @var int $currentPage
 * @var int $totalPage
 */


$meta['title'] = 'ListWibuKu - Home';
$meta['layout'] = 'withnavbar';
$meta['js'][] = 'page/anime-search'

?>

<?php render_component('anime-list/filter'); ?>
<div id="anime-list-content">
    <?php render_component('anime-list/list', [
        'data' => $data,
        'currentPage' => $currentPage,
        'totalPage' => $totalPage
    ]); ?>
</div>