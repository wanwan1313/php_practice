<?php include __DIR__ . '../../parts/comfig.php';

$sid = intval($_GET['sid']);

$come_from = $_SERVER['HTTP_REFERER'] ?? 'table-sql.php' ;

if( empty($sid) == false){

    $del_sql = "DELETE FROM `address_book2` WHERE `sid`= $sid ";
    $pdo->query($del_sql);
};

header("Location: {$come_from}");

?>