<?php
/** @var array $meta */
/** @var int $id anime_id */

$meta['title'] = 'Add Review';
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/editanime';

?>
<!-- todo: styling -->
<div class="animeeditor">
    <h1>Add Review</h1>
    <form action="/review/add/<?= $id?>" method="post">
        <table>
            <tbody>
            <tr>
                <td>
                    <label for="title">Review</label>
                </td>
                <td>
                    <textarea name="review" id="review" placeholder="Anime Review" rows="8" required></textarea>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="studio">Rating</label>
                </td>
                <td>
                    <input type="number" name="rating" id="rating" min="1" max="10" step="1" placeholder="Rate 1-10" required>
                </td>
            </tr>
            </tbody>
        </table>

        <?php if (isset($error)): ?>
            <p class="text-danger"><?= $error ?></p>
        <?php endif ?>
        <input type="submit" value="Add Review">
    </form>
</div>