<?php

function random_string(int $length): string
{
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

function move_uploaded_to_storage(string $source, string $filename, bool $randomizeFilename = true): string
{
    $baseDestination = __DIR__ . '/../../storage/';

    if ($randomizeFilename) {
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $filename = random_string(15) . '.' . $extension;
    }

    $destination = $baseDestination . $filename;

    move_uploaded_file($source, $destination);

    return $filename;
}

function remove_uploaded_file(string $filename): string
{
    $baseDestination = __DIR__ . '/../../storage/';

    $destination = $baseDestination . $filename;

    unlink($destination);

    return $filename;
}