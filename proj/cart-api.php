<?php include __DIR__ . '/parts/comfig.php';

if( ! isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
};


// $output = [];

// 1.列表 2.加入 3.新增 4.刪除
// 1.list 2.add 3.update 4.delete

$action = isset($_GET['action']) ? $_GET['action']:'';
$p_sid = isset($_GET['psid']) ? intval($_GET['psid']):0;
$p_qty = isset($_GET['qty']) ? intval($_GET['qty']):0;


switch( $action ){
    case 'update' :
    case 'add' :

        // 先判斷有沒有商品sid
        if(! empty($p_sid)){

            // 判斷購物車內有沒有此項商品
            if( ! empty($_SESSION['cart'][$p_sid])){
                
                //代表購物車內有此商品只需要改數量
                // 判斷有沒有數量
                if( ! empty($p_qty)){
                    $_SESSION['cart'][$p_sid]['quantity'] = $p_qty; 
                }
                
            }
            // 代表是新加入的商品
            else{

                // 判斷有沒有數量
                if( ! empty($p_qty)){

                    $F_SQL = "SELECT * FROM `products` WHERE `sid` = $p_sid";
                    $row = $pdo -> query($F_SQL) -> fetch();

                // 判斷有沒有從資料庫抓到商品資料
                    if(! empty($row)){
                        $_SESSION['cart'][$p_sid] = $row;
                        $_SESSION['cart'][$p_sid]['quantity'] = $p_qty;
                    }

                }else {
                    unset( $_SESSION['cart'][$p_sid]);
                };
                
            }
            

        };


        break;

    case 'delete' :
        if(! empty($p_sid)) {
            unset($_SESSION['cart'][$p_sid]);
        }

        break;
    default:
    case 'list' :
};

// $output['cart'] = $_SESSION['cart'];
echo json_encode($_SESSION['cart'],JSON_UNESCAPED_UNICODE)


?>