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

// 把php的陣列轉成JSON格式 -> json_encode
// 把JSON格式轉成php的陣列 -> json_decode

header('Content-Type: application-json');
//把預設的文字格式轉成陣列格式
echo json_encode($persons, JSON_UNESCAPED_UNICODE);
// JSON_UNESCAPED_UNICODE ->保持中文不轉換成UNICODE


?>
