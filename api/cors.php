<?php

declare(strict_types=1);

// date_default_timezone_set('America/Sao_Paulo');

$origin = $_SERVER['HTTP_ORIGIN'] ?? '*';

$_headers = [
    'Access-Control-Allow-Credentials' => 'true',
    'Access-Control-Allow-Headers' => implode(', ', [
        'Accept',
        'Content-Type',
        'Authorization',
        'X-Requested-With',
        'X-Request-Id',
        'X-Product-Id',
    ]),
    // 'Access-Control-Allow-Origin' => '*',
    'Access-Control-Allow-Origin' => $origin,

    // 'Access-Control-Allow-Methods' => '*',
    'Access-Control-Allow-Methods' => 'GET,HEAD,PUT,OPTIONS,PATCH,POST,DELETE',

    // 'Content-Type' => 'application/json; charset=utf-8',
];

foreach($_headers as $key => $value) {
    header("{$key}: {$value}");
}
