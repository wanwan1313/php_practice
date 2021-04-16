<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>讀取Cookie</title>
</head>
<body>

    <?php

    echo $_COOKIE["my_cookie2"] ?? '沒有設定my_cookie2';

    ?>
</body>
</html>