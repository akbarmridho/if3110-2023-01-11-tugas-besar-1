<?php if (isset($user_anime)) : ?>
    <!-- todo: delete and add from list -->
    <a href='#' class='btn btn-primary btn-small'>Delete from list</a>
    <select name="select-watch-status" id="select-watch-status" class="select-stats">
        <option value="WISHLIST">Wishlist</option>
        <option value="WATCHING">Watching</option>
        <option value="WATCHED">Watched</option>
        <!-- 'WISHLIST', 'WATCHING', 'WATCHED' -->
    </select>
<? else: ?>
    <a href='#' class='btn btn-primary btn-small'>Add to list</a>
<? endif ?> 
<select name="select-rating" id="select-rating" class="select-stats">
    <!-- todo: disable select when anime not in list -->
    <option selected="selected" value="0">Select</option>
    <option value="10">(10) Masterpiece</option>
    <option value="9">(9) Great</option>
    <option value="8">(8) Very Good</option>
    <option value="7">(7) Good</option>
    <option value="6">(6) Fine</option>
    <option value="5">(5) Average</option>
    <option value="4">(4) Bad</option>
    <option value="3">(3) Very Bad</option>
    <option value="2">(2) Horrible</option>
    <option value="1">(1) Appalling</option>
</select>
