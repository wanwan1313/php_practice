<?php include __DIR__ . '/parts/comfig.php' ?>

<?php
$page_title = '商品ajax';

// 分類
$c_SQL = "SELECT * FROM `categories` WHERE `parent_sid`=0";
$total_cates = $pdo->query($c_SQL)->fetchAll();
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;

$where = ' WHERE 1 ';
if (empty($cate) == false) {
    $where .= " AND `category_sid` = $cate ";
}

?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<!-- 這裡插入要放在head的東西 -->


<?php include __DIR__ . '/parts/html-body.php' ?>

<?php include __DIR__ . '/parts/navber.php' ?>
<!-- 這裡插入要放在body的內容 -->

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="btn-group-vertical categories" role="group" style="width: 100%;">
                <button type="button" class="btn btn-outline-secondary" data-sid="0" onclick="changeCate(0)">全部商品</button>
                <?php foreach ($total_cates as $tc) : ?>
                    <button type="button" class="btn btn-outline-secondary" data-sid="<?= $tc['sid'] ?>" onclick="changeCate(<?= $tc['sid'] ?>)"><?= $tc['name'] ?></button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-lg-9 d-flex flex-wrap">
            <!-- 分頁按鈕 -->
            <div class="col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">

                    </ul>
                </nav>
            </div>

            <div class="col-12 p-list d-flex">
                
            </div>

            <!-- 商品 -->


        </div>
    </div>
</div>


<?php include __DIR__ . '/parts/scripts.php' ?>
<!-- 這裡插入jQuery或JS -->
<script>
    let cate = 0;
    let page = 1;
    let p_data = {};
    let btns_cate = $('.categories > button')
    let p_list = $('.p-list')
    let pagination = $('.pagination')


    // 改變分類btn選取狀態時的樣式
    btns_cate.on('click', function() {
        btns_cate.removeClass('active')
        $(this).addClass('active')
    })

    // 預設一進頁面就點籍第一個btn
    btns_cate.eq(0).click()

    // 設定一個產品介紹的字樣
    const productTpl = o => {
        return `
        <div class="col-md-3">
                <div class="card">
                    <img src="./imgs/small/${o.book_id}.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h6 class="card-title">${o.bookname}</h6>
                        <p><i class="fas fa-user-edit"></i>${o.author}</p>
                        <p><i class="fas fa-dollar-sign"></i>${o.price}</p>
                    </div>
                </div>
        </div>
        `
    }


    // 設定一個頁碼的字樣
    const pageTpl = n => {
        return`
        <li class="page-item ${ n === page ? 'active':''} "><a class="page-link" href="javascript: changePage(${n})">${n}</a></li>
        `
    }


    // ajax撈資料
    function getproductData() {
        $.get('product-list-api.php', {
            cate,
            page
        }, function(data) {
            p_data = data
            renderProducts()
            renderPages()
        }, 'json')
    }


    // 按分類按鈕時
    function changeCate(c){
        cate = c
        page = 1
        getproductData()
    }

    function changePage(p){
        page = p
        getproductData()
    }


    function renderProducts(){
        p_list.html('')
        if( p_data.rows && p_data.rows.forEach){
            p_data.rows.forEach(el => {
                p_list.append(productTpl(el))
            })
        }
    }

    function renderPages(){
        pagination.html('')
        for(let i = 1; i <= p_data.total_pages; i++){
            pagination.append(pageTpl(i))
        }
    }
</script>

<?php include __DIR__ . '/parts/html-foot.php' ?>