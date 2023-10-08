<?php
/** @var array $meta */
/** @var \App\Model\Review $review */

$meta['title'] = 'Edit Review';
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/editanime';

?>

<div class="animeeditor">
    <h1>Edit Review</h1>
    <form action="/review/edit/<?= $review->id?>" method="post">
        <input type="text" value="PUT" name="_method" hidden/>
        <table>
            <tbody>
            <tr>
                <td>
                    <label for="title">Review</label>
                </td>
                <td>
                    <textarea name="review" id="review" placeholder="Anime Review" rows="8" required><?= $review->review?></textarea>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="studio">Rating</label>
                </td>
                <td>
                    <input type="number" name="rating" id="rating" min="1" max="10" step="1" placeholder="Rate 1-10" value="<?= $review->rating?>" required>
                </td>
            </tr>
            </tbody>
        </table>

        <?php if (isset($error)): ?>
            <p class="text-danger"><?= $error ?></p>
        <?php endif ?>
        <input type="submit" value="Save Changes">
    </form>
</div>