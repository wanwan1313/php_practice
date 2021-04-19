<?php include __DIR__ . '/parts/comfig.php';

if( ! isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
};


$output = [

];

// 1.列表 2.加入 3.新增 4.刪除
// 1.list 2.add 3.update 4.delete

$action = isset($_GET['action']) ? $_GET['action']:'';
$p_sid = isset($_GET['psid']) ? intval($_GET['psid']):0;
$p_qty = isset($_GET['qty']) ? intval($_GET['qty']):0;


switch( $action ){
    case 'add' :
        $_SESSION['cart'][$p_sid] = $p_qty;
        break;
    case 'update' :
        break;
    case 'delete' :
        break;
    default:
    case 'list' :
        break;
};

$output['cart'] = $_SESSION['cart'];
echo json_encode($output,JSON_UNESCAPED_UNICODE)


?>