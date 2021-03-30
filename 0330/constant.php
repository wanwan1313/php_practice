<!doctype html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    
    <?php


        // 系統常數
        // __DIR__>> 檔案位置
        echo __DIR__;
        echo "<br>";
        // __FILE__>> 檔案位置+檔名
        echo __FILE__;
        echo "<br>";
        // __LINE__>> 輸出行數
        echo __LINE__;
        echo "<br>";

        // 定義自訂常數 >> key通常用全大寫,value可以是數字或字串，但不可改變
        define('MY_CONST', 3.14159);
        define('MY_NAME', 'wanwan');

        echo MY_CONST;
        echo "<br>";
        echo MY_NAME;


    ?>
</body>

</html>