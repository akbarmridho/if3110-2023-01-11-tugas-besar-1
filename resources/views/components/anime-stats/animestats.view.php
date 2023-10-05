<?php if (isset($user_anime)) : ?>
    <!-- todo: delete and add from list -->
    <a href='#' class='btn btn-primary btn-small'>Delete from list</a>
    <select name="select-watch-status" id="select-watch-status" class="select-stats">
        <?php foreach(array('WISHLIST', 'WATCHING', 'WATCHED') as $watchStatus) : ?>
            <!-- todo: update on selection update -->
            <option value='<?= $watchStatus?>' <?= $user_anime->status == $watchStatus ? 'selected' : '' ?>><?= ucfirst(strtolower($watchStatus))?></option>
        <?php endforeach ?>
    </select>
<? else: ?>
    <a href='#' class='btn btn-primary btn-small'>Add to list</a>
<? endif ?> 
<select name="select-rating" id="select-rating" class="select-stats" <?= isset($user_anime) ? '' : 'disabled'?>>
    <!-- todo: update on selection update -->
    <option value="0">Select Rating</option>
    <?php for ($i=1; $i <= 10; $i++) : ?>
        <option value='<?= $i?>' <?= isset($review) ? ($review->rating == $i ? 'selected' : '') : ''?> ><?= $i?> / 10</option>
    <?php endfor ?>
</select>
