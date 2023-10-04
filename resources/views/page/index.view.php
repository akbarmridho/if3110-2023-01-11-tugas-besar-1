<?php
/** @var array $meta
 * @var array $data
 * @var int $currentPage ,
 * @var int $totalPage
 */


$meta['title'] = 'ListWibuKu - Home';
$meta['layout'] = 'withnavbar';

?>

<?php render_component('anime-list/filter'); ?>
<?php render_component('anime-list/list', [
    'data' => $data
]); ?>
<?php render_component('common/pagination', [
    'currentPage' => $currentPage,
    'totalPage' => $totalPage
]); ?>
