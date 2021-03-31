<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL-encoded</title>
</head>
<body>

    <?php

        // http://192.168.21.4/php%20prac/0331/get.php?a=10&b=20
        // 如果沒有GET參數，則會出現Notice表示a與b沒有定義
        echo $_GET['a']+$_GET['b'] ;//輸出30
        echo "<br>";
        echo $_GET['a'],$_GET['b'] ;//輸出1020
        echo "<br>";

        // -------------------------------------------------------------------------------------------//

        // http://192.168.21.4/php%20prac/0331/get.php?a=10&b=20&c=wanwan&d=snowcake
        // 避免出現Notice的寫法
        
        // 三元運算子寫法：利用boolean判斷，賦予GET參數或0
        // $c = isset($_GET['c']) ? $_GET['c']:0 ;
        // $d = isset($_GET['d']) ? $_GET['d']:0 ;

        // php7開始，三元運算子可以簡寫成以下寫法
        $c = $_GET['c'] ?? 0 ;
        $d = $_GET['d'] ?? 0 ;

        echo "{$c},{$d}";  //輸出wanwan,snowcake
        // echo $c + $d ; //　Ｗarning-在php字串無法用+相加
        echo "<br>";
        echo $c,$d ; //字串相加
        echo "<br>";



        //---------------------------------------------------------------------------------------------//
        // http://192.168.21.4/php%20prac/0331/get.php?a=10&b=20&c=wanwan&d=snowcake&e=15.123&f=bbc
        
        // isset > 判斷有沒有給值
        // $e = isset($_GET['e']) ? intval($_GET['e']):0 ;
        // $f = isset($_GET['f']) ? intval($_GET['f']):0 ;
        
        // empty > 判斷是不是空值
        $e = empty($_GET['e']) ? 0: intval($_GET['e']) ;
        $f = empty($_GET['f']) ? 0: intval($_GET['f']);

        // f是字串，e+f會出現warning
        // intval($_GET['f'])=0，就不會出現warning
        echo $e + $f;


        



    ?>
    
</body>
</html>