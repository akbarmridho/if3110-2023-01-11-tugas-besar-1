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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap"
          rel="stylesheet">
</head>
<body>
<main>
    <?= $meta['content'] ?>
</main>
<script src="<?= js("index.js") ?>" type="module" defer></script>
<?php foreach ($meta['js'] as $js) : ?>
    <script src="<?= js($js) ?>.js" type="module" defer></script>
<?php endforeach ?>
</body>
</html>