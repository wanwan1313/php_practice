<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array陣列</title>
</head>

<body>
    <?php

    $ar1 = array(2, 3, 4, 5, 'a', 'b', 'c');
    $ar2 = [6, 7, 8, 9, 'd', 'e', 'f'];

    // echo $$ar1; //印不出陣列

    print_r($ar1); //print_array的意思
    print '<br>';
    var_dump($ar1); //更囉嗦的陣列印出格式
    print '<br>';
    print_r($ar2); 
    print '<br>';
    var_dump($ar2); 
    print '<br>';

    ?>

    <!-- 想要印出程式碼的格式，使用pre -->
    <pre>
    <?php

    $ar1 = array(2, 3, 4, 5, 'a', 'b', 'c');
    $ar2 = [6, 7, 8, 9, 'd', 'e', 'f'];

    print '<br>';
    print_r($ar1); //print_array的意思
    print '<br>';
    var_dump($ar1); //更囉嗦的陣列印出格式
    print '<br>';
    print_r($ar2); 
    print '<br>';
    var_dump($ar2); 

    ?>
    </pre>

    <?php

    // count = JS的lenght
    $ar3 = [ 12, 68, 78, 231, 510];
    for($i=0; $i<count($ar3); $i++){
        $index = intval($i) +1;
        echo ("第{$index}個:$ar3[$i]<br>");
    };
    ?>

</body>

</html>