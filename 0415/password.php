<?php

$password = '123456';
$md5 = md5($password);
$sha1 = sha1($password);

echo "md5 = {$md5} <br>";
echo "sha1 = {$sha1} <br>";
echo "password_hash = ". password_hash($password,PASSWORD_DEFAULT). '<br>' ;
echo "password_hash = ". password_hash($password,PASSWORD_DEFAULT). '<br>' ;


?>