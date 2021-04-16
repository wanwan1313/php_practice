<?php

$num1 = 66;
$num2 = '22';
$str = 'abc';

// php運算子只做數值運算，不做字串相加，所以可以同時運算數字和字串不會出錯
echo $num1 + $num2;
echo '<br>';
echo $num1 * $num2;
echo '<br>';
echo $num1 + $str; //等於66，但是會有警告不能相加
echo '<br>';
echo '<br>';

$name = 'wanwan';
$$name = 'wanwan wu'; //可以用變數值當變數名，但不好維護，少用

echo $$name ;
echo '<br>';

echo 'Hello $name <br>';  //單引號不能辨識變數
echo "Hello $name <br>";  //雙引號可以辨識變數
echo "Hello {$name}0113 <br>"; //樣板字符寫法
echo "Hello ${name}0113 <br>"; //樣板字符寫法


?>