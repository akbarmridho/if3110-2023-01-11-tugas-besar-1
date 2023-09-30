<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?? "No title" ?></title>
    <link rel="stylesheet" href="<?= css("style.css") ?>">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
<main>
    {content}
</main>
<script src="<?= js("index.js") ?>" defer></script>
</body>
</html>