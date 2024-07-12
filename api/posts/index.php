<?php

require __DIR__ . '/../cors.php';

$posts = [];
$deletedPosts = [];

$validPostId = fn($id) => filter_var(
    $id,
    FILTER_VALIDATE_INT,
    FILTER_NULL_ON_FAILURE
);

if (is_file('deleted_items.csv')) {
    $deletedPosts = array_filter(
        explode(PHP_EOL, file_get_contents('deleted_items.csv')),
        $validPostId,
    ) ?: [];
}

for ($id = 1; $id <= 50; $id++) {
    if (in_array($id, $deletedPosts)) {
        continue;
    }

    $posts[] = [
        'id' => $id,
        'title' => "Title of My Post #{$id}",
        'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa impedit voluptatum molestiae deleniti, magni ratione.',
    ];
}

http_response_code(200);
header('Content-Type: application/json');

die(json_encode($posts, 64));
