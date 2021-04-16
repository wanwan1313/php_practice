<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>isset & empty</title>
</head>
<body>

    <?php

    $a = 0; 
    echo empty($a) ? 'a=0 是空的':'a=0 不是空的';
    echo '<br>';
    echo isset($a) ? 'a=0 有值':'a=0 沒有值';
    echo '<br>';
    echo '<br>';

    $a = null; 
    echo empty($a) ? 'a=null 是空的':'a=null 不是空的';
    echo '<br>';
    echo isset($a) ? 'a=null 有值':'a=null 沒有值';
    echo '<br>';
    echo '<br>';

    $a = []; 
    echo empty($a) ? 'a=[] 是空的':'a=[] 不是空的';
    echo '<br>';
    echo isset($a) ? 'a=[] 有值':'a=[] 沒有值';
    echo '<br>';
    echo '<br>';

    // $b = 0; 
    echo empty($b) ? 'b=undefined 是空的':'b=undefined 不是空的';
    echo '<br>';
    echo isset($b) ? 'b=undefined 有值':'b=undefined 沒有值';
    echo '<br>';
    echo '<br>';


    // empty判斷的是 是不是空值，所以必須要有意義的value如數字或字串，所以0/[]/null/undefined都是空值
    // isset判斷的是 有沒有設值，所以0/[]是有設值的，而null/undefined沒有設值


    ?>
    
</body>
</html>