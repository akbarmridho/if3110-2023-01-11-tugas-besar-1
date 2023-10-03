<?php
/** @var array $meta */

$meta['title'] = 'ListWibuKu - Home';
$meta['layout'] = 'withnavbar';

?>

<?php render_component('anime-list/filter'); ?>
<?php render_component('anime-list/list'); ?>
<!--<div class="mx-auto">-->
<?php render_component('common/pagination'); ?>
<!--</div>-->

