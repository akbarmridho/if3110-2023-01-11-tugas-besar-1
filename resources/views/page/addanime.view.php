<?php
/** @var array $meta */

$meta['title'] = 'ListWibuKu - Add Anime';
$meta['layout'] = 'withnavbar';
$meta['css'][] = 'page/editanime';

?>

<div class="animeeditor">
    <h1>Add Anime</h1>
    <form action="/addanime" method="post">
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="title">Anime Title</label>
                    </td>
                    <td>
                        <input type="text" name="title" placeholder="Title" id="title" required>
                    </td>
                </tr>
    
                <tr>
                    <td>
                        <label for="studio">Studio</label>
                    </td>
                    <td>
                        <input type="text" name="studio" placeholder="Studio Name" id="studio">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="genre">Genre</label>
                    </td>
                    <td>
                        <input type="text" name="genre" placeholder="Genre" id="genre">
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label for="description">Summary</label>
                    </td>
                    <td>
                        <input type="text" name="description" placeholder="Description" id="description">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="episode_count">Episode Count</label>
                    </td>
                    <td>
                        <input type="number" name="episode_count" id="episode_count" min="1" step="1">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="air_date_start">Air Date Start</label>
                    </td>
                    <td>
                        <input type="datetime-local" name="air_date_start" id="air_date_start">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="air_date_end">Air Date End</label>
                    </td>
                    <td>
                        <input type="datetime-local" name="air_date_end" id="air_date_end">
                    </td>
                </tr>
            </tbody>
        </table>
        
        <?php if (isset($error)): ?>
            <p class="text-danger"><?= $error ?></p>
        <?php endif ?>
        <input type="submit" value="Add Anime">
    </form>
</div>