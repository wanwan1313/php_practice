<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>設定時區</title>
</head>
<body>
    
    <?php

    // 改變單支php的時區
    // date_default_timezone_set('Asia/Taipei');
    echo date('Y-m-d H:i:s');

    //如果要整個php的時區設定，需要到php.ini設定
    // 尋找date.timezone -> 改成Asia/Taipei

    ?>
</body>
</html>