<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>設定時間</title>
</head>

<body>

    <div>

    <?php

    echo time().'<br>';
    echo date('Y/m/d H:i:s').'<br>';
    echo date('Y/m/d H:i:s', time()+2592000).'<br>'; //一個月後
    echo date('Y/m/d H:i:s', time()+61*24*60*60).'<br>'; //兩個月後

    $t = strtotime('2021/01/13 09:15:00');  //把字串轉乘時間格式
    echo date('Y/m/d H:i:s', $t);  

    ?>


    </div>

</body>

</html>