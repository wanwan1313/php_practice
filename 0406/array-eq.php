<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array [=] 設定</title>
</head>
<body>

    <?php
    
    $p1 = [
        'name' => 'wanwan',
        'age' => 32
    ];

    $p2 = $p1;
    $p3 = &$p1; //設定參數，會同步資料
    $p1['name'] = 'momo';

    echo '$p1';
    echo json_encode($p1,JSON_UNESCAPED_UNICODE) . "<br>";
    echo '$p2';
    echo json_encode($p2,JSON_UNESCAPED_UNICODE) . "<br>";
    echo '$p3';
    echo json_encode($p3,JSON_UNESCAPED_UNICODE) . "<br>";


    ?>
    
</body>
</html>