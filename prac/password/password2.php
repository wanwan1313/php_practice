<?php

$password = '123456';
$p1 = password_hash($password,PASSWORD_DEFAULT);
$p2 = password_hash($password,PASSWORD_DEFAULT);

echo "p1 = {$p1} <br>";
echo "p2 = {$p2} <br>";

echo password_verify('123457',$p1) ? 'true' : 'false';
echo "<br>";
echo password_verify($password,$p2) ? 'true' : 'false';



?>