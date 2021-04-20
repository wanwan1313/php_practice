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

// echo json_encode([
//     'total_rows' => $total_rows,
//     'total_pages' => $total_pages,
//     'rows' => $rows
// ], JSON_UNESCAPED_UNICODE)

?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<!-- 這裡插入要放在head的東西 -->


<?php include __DIR__ . '/parts/html-body.php' ?>

<?php include __DIR__ . '/parts/navber.php' ?>
<!-- 這裡插入要放在body的內容 -->

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="btn-group-vertical" role="group" style="width: 100%;">
                <a type="button" class="btn btn<?= empty($cate) ? '-':'-outline-'?>secondary" href="?">全部商品</a>
                <?php foreach( $total_cates as $tc): ?>
                <a type="button" class="btn btn<?= $cate == $tc['sid'] ? '-':'-outline-'?>secondary" href="?cate=<?= $tc['sid']?>"><?= $tc['name']?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-lg-9 d-flex flex-wrap">
            <div class="col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <!-- 前一頁 -->
                        <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>"><a class="page-link" 
                        href="?<?php $qs['page'] = $page-1 ; echo http_build_query($qs)?>">Previous</a></li>
                        <!-- 頁碼 -->
                        <?php for ($i = $page-2; $i <= $page+2; $i++) : 
                              if( $i >= 1 and $i<= $total_pages ):
                                $qs['page'] = $i
                            ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?> "><a class="page-link" 
                            href="?<?= http_build_query($qs)?>"><?= $i ?></a></li>

                        <?php endif; ?>
                        <?php endfor; ?>
                        <!-- 後一頁 -->
                        <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>"><a class="page-link " href="?<?php $qs['page'] = $page+1 ; echo http_build_query($qs)?>">Next</a></li>
                    </ul>
                </nav>
            </div>

            <?php foreach ($rows as $r) : ?>
            <div class="col-md-3">
                <div class="card" data-sid="<?= $r['sid'] ?>">
                    <img src="./imgs/small/<?= $r['book_id'] ?>.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h6 class="card-title"><?= $r['bookname'] ?></h6>
                        <p><i class="fas fa-user-edit"></i><?= $r['author'] ?></p>
                        <p><i class="fas fa-dollar-sign"></i><?= $r['price'] ?></p>
                        <select class="form-control" >
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button class="btn btn-secondary add-to-cart"><i class="fas fa-shopping-cart"></i></button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php include __DIR__ . '/parts/scripts.php' ?>
<!-- 這裡插入jQuery或JS -->
<script>

    let addToCartBtns = $('.add-to-cart')

    addToCartBtns.on('click',function(){
        let card = $(this).closest('.card')
        let psid = card.attr('data-sid')
        let qty = card.find('select').val()

        $.get('cart-api.php',{'action':'add','psid':psid, 'qty':qty },function(data){
            // console.log(data)
            showCartCount(data) //更新購物車小字
        }, 'json')
    })


</script>

<?php include __DIR__ . '/parts/html-foot.php' ?>