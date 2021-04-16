<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON-decode</title>
</head>
<body>

    <?php

    $data_str = '{"name":"wanwan","age":"32","gender":"female"}';
    
    $data_obj = json_decode($data_str);
    print_r($data_obj); //轉成一個物件stdClass Object 

    // 要抓取stdClass Object的內容要使用$變數->key
    echo ("<br>{$data_obj->name}");
    echo ("<br>{$data_obj->age}");
    echo ("<br>{$data_obj->gender}");
    echo ('<br>-----------------------------------------<br>');

    $data_arr = json_decode($data_str,true);
    print_r($data_arr); //轉成php陣列
    echo ("<br> {$data_arr['name']}");
    echo ("<br> {$data_arr['age']}");
    echo ("<br> {$data_arr['gender']}");



    ?>
    
</body>
</html>