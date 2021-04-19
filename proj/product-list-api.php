<?php include __DIR__ . '/parts/comfig.php' ?>

<?php
$page_title = '商品列表';

// 分類
$c_SQL = "SELECT * FROM `categories` WHERE `parent_sid`=0";
$total_cates = $pdo -> query($c_SQL) -> fetchAll();
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;

$where = ' WHERE 1 ';
if( empty($cate) == false){
    $where .= " AND `category_sid` = $cate ";
}

$qs = [];
if( ! empty($cate) ){
    $qs['cate'] = $cate;
}




// 抓資料庫的產品資料
// 設定每頁幾筆資料, 取得總頁數, 取得現在頁數, 放入資料

$page_p = 4; //每頁放4筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$t_SQL = "SELECT COUNT(1) FROM `products` $where ";
$total_rows = $pdo->query($t_SQL)->fetch(PDO::FETCH_NUM)[0];
$total_pages = ceil($total_rows / $page_p);

if ($page < 1) {
    $page = 1;
} elseif ($page > $total_pages) {
    $page = $total_pages;
};

$s_SQL = sprintf("SELECT * FROM `products` $where ORDER BY `sid` LIMIT %s,%s", ($page - 1) * $page_p, $page_p);
$rows = $pdo->query($s_SQL)->fetchAll();

echo json_encode([
    'cate' => $cate,
    'page' => $page,
    'page_p' => $page_p,
    'total_rows' => $total_rows,
    'total_pages' => $total_pages,
    'rows' => $rows,
    'qs' => $qs
], JSON_UNESCAPED_UNICODE)

?>
