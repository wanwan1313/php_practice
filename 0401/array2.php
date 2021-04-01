<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array陣列2</title>
</head>
<body>

    <?php

    $ar = [];

    for($i=1; $i<=42; $i++){
        $ar[] = $i;  //push寫法
    };

    shuffle($ar); //把array順序弄亂
    echo implode('-',$ar); //把陣列轉成字串，相當於JS的array.join()



    ?>
    
</body>
</html>