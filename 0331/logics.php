<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>邏輯運算子</title>
</head>
<body>


    <?php

        // php的邏輯運算子只會算出布林值，不會給值，所以true=1;false=""
        echo 5 || 7;  //true = 1
        echo "<br>";

        echo 5 or 7;  //true = 1
        echo "<br>";

        echo 5 && 7;  //true = 1
        echo "<br>";

        echo 5 and 7; //true = 1
        echo "<br>";

        echo 0 || 7;  //true = 1
        echo "<br>";

        echo 0 or 0;  //false = ""
        echo "<br>";

        echo 0 && 7;
        echo "<br>";  //false = ""

        echo 0 and 0;  //false = ""
        echo "<br>";

        $kk = 5;
        $hh = 7;

        echo $kk || $hh;
        echo $kk,$hh;
        echo "<br>";




        $a = 5 or $b = 6;  // or的權重比=低，所以=先執行，把5給a。因or已判斷完畢，所以b沒有值
        $c = 5 || $d = 6;  // ||的權重比=高，所以||先執行，$c = 5判斷為true，所以是true(值1)覆蓋給c，因||已判斷完畢，所以b沒有值
        echo "a=${a} ; b=${b} <br>";
        echo "c=${c} ; d=${d} <br>";
        echo "<br>";

        $a = 0 or $b = 6;  // or的權重比=低，所以=先執行，把0給a。因a是false，所以執行b把6給b
        $c = 0 || $d = 6;  // ||的權重比=高，所以||先執行，$c=0判斷為flase，再判斷 d=6 ，所以是true(值1)覆蓋給c
        echo "a=${a} ; b=${b} <br>";
        echo "c=${c} ; d=${d} <br>";
        echo "<br>";


        $e = 5 and $f = 6;  // and的權重比=低，所以=先執行，把5給e，把6給f
        $g = 5 && $h = 6;  // &&的權重比=高，所以&&先執行，$g = 5判斷為true，$h =6判斷為true，所以是true(值1)覆蓋給g
        echo "e=${e} ; f=${f} <br>";
        echo "g=${g} ; h=${h} <br>";
        echo "<br>";

        $e = 5 and $f = 0;  // and的權重比=低，所以=先執行，把5給e，把0給f
        $g = 5 && $h = 0;  // &&的權重比=高，所以&&先執行，$g = 5判斷為true，$h =0判斷為false，所以是false('空字串')覆蓋給g
        echo "e=${e} ; f=${f} <br>";
        echo "g=${g} ; h=${h} <br>";
        echo "<br>";








    ?>
    
</body>
</html>