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
                    <tr class="produst" data-sid="<?= $v['sid'] ?>" data-tprice="<?= $v['price'] * $v['quantity'] ?>">
                        <td>
                            <a href="javascript: " onclick="deleteItem(event)"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        <td>
                            <img style="width:100px" src="./imgs/small/<?= $v['book_id'] ?>.jpg" alt="">
                        </td>
                        <td><?= $v['bookname'] ?></td>
                        <td>$<?= $v['price'] ?></td>
                        <td><?= $v['quantity'] ?></td>
                        <td>$<?= $v['price'] * $v['quantity'] ?></td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <td colspan="5" style="text-align: right;">總計</td>
                    <td id="total_p">$</td>
                </tr>
            </tbody>
        </table>

        <?php endif; ?>


    </div>
</div>


<?php include __DIR__ . '/parts/scripts.php' ?>
<!-- 這裡插入jQuery或JS -->

<script>
    function deleteItem(event) {
        let del = $(event.currentTarget)
        let psid = del.closest('tr').attr('data-sid')

        $.get('cart-api.php', {action: 'delete',psid}, function(data) {
            
            console.log(data) //console.log回傳的資料以方便除錯
            del.closest('tr').remove() //從資料庫刪除後再從前端刪除
            showCartCount(data)

            if( $('.produst').length < 1  ){
                location.reload()
            }
        }, 'json')

    }

    let total_price = 0
    let pros = $('.produst')
    for(let i = 0; i>pros.length; i++){
        let tprice = pros.attr('data-tprice')
        total_price += tprice
    }

    $('#total_p').text(total_price)



</script>


<?php include __DIR__ . '/parts/html-foot.php' ?>