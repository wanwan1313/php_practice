<?php

$persons = [
    [
        'name' => 'wanwan',
        'age' => '32',
        'gender' => 'female'
    ],
    [
        'name' => 'andrew',
        'age' => '31',
        'gender' => 'male'
    ],
    [
        'name' => '子恩',
        'age' => '25',
        'gender' => 'female'
    ],
    [
        'name' => 'jack',
        'age' => '28',
        'gender' => 'male'
    ],
];


echo json_encode([
    'get' => $_GET,
    'persons' => $persons
], JSON_UNESCAPED_UNICODE);




?>
