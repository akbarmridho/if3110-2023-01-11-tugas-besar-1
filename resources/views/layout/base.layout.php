<?php /** @var array $meta */ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $meta['title'] ?></title>
    <link rel="stylesheet" href="<?= css("style.css") ?>">
    <?php foreach ($meta['css'] as $css) : ?>
        <link rel="stylesheet" href="<?= css($css) ?>.css">
    <?php endforeach ?>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
<main>
    <?= $meta['content'] ?>
</main>
<script src="<?= js("index.js") ?>" defer></script>
<?php foreach ($meta['js'] as $js) : ?>
    <script src="<?= js($js) ?>.js" defer></script>
<?php endforeach ?>
</body>
</html>