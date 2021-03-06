<?php include __DIR__ . '/parts/comfig.php' ?>

<?php
$page_title = '購物車';


?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<!-- 這裡插入要放在head的東西 -->


<?php include __DIR__ . '/parts/html-body.php' ?>

<?php include __DIR__ . '/parts/navber.php' ?>
<!-- 這裡插入要放在body的內容 -->

<div class="container">
    <div class="row">
        <?php if (empty($_SESSION['cart'])) : ?>
            <div class="alert alert-danger" role="alert">
                購物車是空的喔!
            </div>
        <?php else : ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">delete</th>
                        <th scope="col">封面</th>
                        <th scope="col">書名</th>
                        <th scope="col">單價</th>
                        <th scope="col">數量</th>
                        <th scope="col">小記</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($_SESSION['cart'] as $v) : ?>
                        <tr class="product" data-sid="<?= $v['sid'] ?>">
                            <td>
                                <a href="javascript: " onclick="deleteItem(event)"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            <td>
                                <img style="width:100px" src="./imgs/small/<?= $v['book_id'] ?>.jpg" alt="">
                            </td>
                            <td><?= $v['bookname'] ?></td>
                            <td class="price" data-price="<?= $v['price'] ?>"></td>
                            <td>
                                <select class="form-control quantity" data-qty="<?= $v['quantity'] ?>">
                                    <?php for ($i = 1; $i <= 10; $i++) : ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>

                                </select>
                            </td>
                            <td class="sub-totalPrice"></td>
                        </tr>
                    <?php endforeach; ?>

                    <tr>
                        <td colspan="5" style="text-align: right;">總計</td>
                        <td id="totalPrice"></td>
                    </tr>
                </tbody>
            </table>


        <?php endif; ?>


    </div>
    <div class="row">
        <div class="col">
            <?php if( isset($_SESSION['user'])): ?>
                <a href="cart-confirm.php" class="btn btn-success check">結帳</a>
            <?php else: ?>
                <div class="alert alert-danger" role="alert">
                請先登入會員
            </div>
            <?php endif; ?>
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
        console.log(qty,psid)
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