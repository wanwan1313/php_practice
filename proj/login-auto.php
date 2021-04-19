<?php include __DIR__ . '/parts/comfig.php';

$auto_sql = "SELECT * FROM `members` WHERE `sid`= '1'";
$auto_stmt = $pdo -> query($auto_sql);
$row = $auto_stmt -> fetch();

$_SESSION['user'] = $row;
print_r($_SESSION['user'])

?>