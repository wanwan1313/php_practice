<?php
session_start(); //啟用session,要放在所有html前面
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>設定session</title>
</head>
<body>
    
    <?php

    $_SESSION['SESS'] = 'My session';
    
    echo $_SESSION['SESS'].'<br>';
    // SESSION在SERVER端操作，所以第一次存取還是會有值
    echo $_COOKIE['my_cookie'].'<br>';
    echo $_COOKIE['my_cookie2'].'<br>';
    // COOKIE

    ?>

</body>
</html>