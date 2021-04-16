<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>關聯式陣列</title>
</head>
<body>

    <?php
    // 關聯式陣列相當於JS的物件

    $data = [
        'name' => 'wanwan',
        'age' => 32,
        'gender' => 'female'
    ];

    $ar = [1, 2, 3, 4];

    // 相當於JS的(for-in/for-of),JQ的(each)
    foreach( $data as $k=>$v){
        echo ("{$k}:{$v}<br>");
    };

    echo ('--------------------------------<br>');

    foreach( $ar as $k=>$v){
        echo ("{$k}:{$v}<br>");
    };

    ?>
</body>
</html>