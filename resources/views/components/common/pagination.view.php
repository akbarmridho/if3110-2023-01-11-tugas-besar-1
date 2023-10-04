<?php
/**
 * @var int $currentPage
 * @var int $totalPage
 */

$query = $_GET;

if (!array_key_exists('page', $query)) {
    $query['page'] = 1;
}
?>


<div class="pagination">
    <a href="?<?= http_build_query(array_merge($_GET, ['page' => 1])) ?>" class="pagination-link">
        &lt;
    </a>
    <?php if ($totalPage < 5) : ?>
        <?php for ($i = 1; $i <= $totalPage; $i++): ?>
            <a href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"
               class="pagination-link <?= $currentPage === $i ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor ?>
    <?php else : ?>
        <?php for ($i = -2; $i <= 2; $i++): ?>
            <a href="?<?= http_build_query(array_merge($_GET, ['page' => $currentPage - $i])) ?>"
               class="pagination-link <?= $currentPage === ($currentPage - $i) ? 'active' : '' ?>"><?= $currentPage - $i ?></a>
        <?php endfor ?>
    <?php endif ?>
    <a href="?<?= http_build_query(array_merge($_GET, ['page' => $totalPage])) ?>" class="pagination-link">
        &gt;
    </a>
</div>