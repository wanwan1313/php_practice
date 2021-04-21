<?php include __DIR__ . '/parts/comfig.php' ?>

<?php
$page_title = '訂購完成';

if (!isset($_SESSION['user']) or empty($_SESSION['cart'])) {
    header('Location: product-list.php');
    exit;
} else {
    $total = 0;
    foreach ($_SESSION['cart'] as $c) {
        $total += $c['price'] * $c['quantity'];
    };

    $o_SQL = "INSERT INTO `orders`
        (`sid`, `member_sid`, `amount`, `order_date`) 
        VALUES 
        (NULL,?,?,NOW())";

    $o_stmt = $pdo->prepare($o_SQL);
    $o_stmt->execute([
        $_SESSION['user']['sid'],
        $total
    ]);

    $order_sid =  $pdo->lastInsertId();

    $d_SQL = "INSERT INTO `order_details`
            (`order_sid`, `product_sid`, `price`, `quantity`) 
            VALUES 
            (?,?,?,?)";
    $d_stmt = $pdo ->prepare($d_SQL);
    
    foreach($_SESSION['cart'] as $c){
        $d_stmt -> execute([
            $order_sid,
            $c['sid'],
            $c['price'],
            $c['quantity']
        ]);
    };

    unset($_SESSION['cart']);
}






?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<!-- 這裡插入要放在head的東西 -->


<?php include __DIR__ . '/parts/html-body.php' ?>

<?php include __DIR__ . '/parts/navber.php' ?>
<!-- 這裡插入要放在body的內容 -->

<div class="container">
    <div class="row">
        <div class="col">
            <div class="alert alert-info" role="alert">
                感謝訂購!
            </div>
        </div>

    </div>

</div>


<?php include __DIR__ . '/parts/scripts.php' ?>
<!-- 這裡插入jQuery或JS -->

<script>
    let price = $('.price')
    let quantity = $('.quantity')



    // 金額轉換, 加逗號
    const dallorCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };


    // 刪除資料
    const deleteItem = function(event) {
        let del = $(event.currentTarget)
        let psid = del.closest('tr').attr('data-sid')

        $.get('cart-api.php', {
            action: 'delete',
            psid
        }, function(data) {

            console.log(data) //console.log回傳的資料以方便除錯
            del.closest('tr').remove() //從資料庫刪除後再從前端刪除
            showCartCount(data) //更新購物車小字
            calcprice() //重新計算價格

            if ($('.product').length < 1) {
                location.reload()

            }
        }, 'json')
    }

    // 更改數量
    quantity.on('change', function() {
        let qty = $(this).val()
        let psid = $(this).closest('.product').attr('data-sid')
        console.log(qty, psid)
        $.get('cart-api.php', {
            action: 'add',
            psid,
            qty
        }, function(data) {

            console.log(data) //console.log回傳的資料以方便除錯
            showCartCount(data) //更新購物車小字
            calcprice() //重新計算價格


        }, 'json')
    })



    // 建立計算價格的func
    const calcprice = function() {
        let total = 0
        // 算小計
        $('.product').each(function() {
            let p = $(this).find('.price').attr('data-price')
            let q = $(this).find('.quantity').val()
            $(this).find('.sub-totalPrice').text('$ ' + dallorCommas(p * q))
            total += p * q
        })
        // 算總計
        $('#totalPrice').text('$ ' + dallorCommas(total))

    }


    // document.ready寫法，現在已可省略
    $(function() {
        // 呈現數量
        quantity.each(function() {
            let qty = $(this).attr('data-qty') * 1
            $(this).val(qty)
        })
        // 呈現單價
        price.each(function() {
            let p = $(this).attr('data-price') * 1
            $(this).text('$ ' + dallorCommas(p))
        })
        // 計算價格
        calcprice()
    })
</script>


<?php include __DIR__ . '/parts/html-foot.php' ?>