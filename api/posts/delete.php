<?php

require __DIR__ . '/../cors.php';

$postId = filter_var(
    $_REQUEST['post_id'] ?? null,
    FILTER_VALIDATE_INT,
    FILTER_NULL_ON_FAILURE
);

if (!$postId) {
    http_response_code(422);
    die('ID inválido');
}

file_put_contents('deleted_items.csv', $postId . PHP_EOL, FILE_APPEND);

die('Ok');
