<?php include __DIR__ . '../../parts/comfig.php' ?>

<?php
$page_title = '修改表單';

$sid = intval($_GET['sid']);
$come_from = $_SERVER['HTTP_REFERER'] ?? 'table-sql.php' ;

if( empty($sid)){
    header('Location: table-sql.php');
    exit;
};

$edit_SQL = "SELECT * FROM `address_book2` WHERE `sid`= $sid ";
$row = $pdo->query($edit_SQL)->fetch();


?>

<?php include __DIR__ . '../../parts/html-head.php' ?>
<!-- 這裡插入要放在head的東西 -->


<?php include __DIR__ . '../../parts/html-body.php' ?>

<?php include __DIR__ . '../../parts/navber.php' ?>
<!-- 這裡插入要放在body的內容 -->

<div class="container">
    <div class="row">
        <div class="col-8 card">
            <div class="card-body">
                <h5 class="card-title">修改會員資料</h5>
                <div class="col-md-6">
                    <form name="form1" method="post" novalidate onsubmit="checkform(); return false;">

                        <!-- 新增一個隱形的input >> 目的是把sid值傳回去給SERVER，才知道是改哪一筆資料 -->
                        <input type="hidden" name="sid" value="<?=$row['sid']?>">
                        <div class="form-group">
                            <label for="name">*姓名</label>
                            <input type="text" class="form-control" id="name" name="name" required value="<?= htmlentities($row['name'])?>">
                            <small class="form-text" style="color: red;"> </small>
                        </div>
                        <div class="form-group">
                            <label for="email">*信箱</label>
                            <input type="email" class="form-control" id="email" name="email" required value="<?= htmlentities($row['email'])?>">
                            <small class="form-text" style="color: red;"> </small>
                        </div>
                        <div class="form-group">
                            <label for="mobile">*手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" value="<?= htmlentities($row['mobile'])?>">
                            <small class="form-text" style="color: red;"> </small>
                        </div>
                        <div class="form-group">
                            <label for="address">住址</label>
                            <textarea class="form-control" name="address" id="address" cols="40" rows="3"><?= htmlentities($row['address'])?></textarea>
                            <small class="form-text" style="color: red;"> </small>
                        </div>
                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" required value="<?= htmlentities($row['birthday'])?>">
                            <small class="form-text" style="color: red;"> </small>
                        </div>



                        <button type="submit" class="btn btn-primary">修改</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '../../parts/scripts.php' ?>
<!-- 這裡插入jQuery或JS -->
<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    let name = $('#name');
    let email = $('#email');
    let mobile = $('#mobile');
    let address = $('#address');
    let birthday = $('#birthday')
    let form_arr = [name, email, mobile, address, birthday]


    // 前端檢查表格
    function checkform() {

        let isPass = true;

        // 先把錯誤格式回復
        form_arr.forEach(el => {
            el.css('border', '1px solid #cccccc')
            el.next().text('')
        })


        if ( name.val().length < 2) {
            isPass = false;
            name.css('border', '1px solid red')
            name.next().text('錯誤!請輸入正確的姓名')
        }

        if ( email_re.test(email.val()) == false) {
            isPass = false;
            email.css('border', '1px solid red')
            email.next().text('錯誤!請輸入正確的信箱')
        }

        if ( mobile_re.test(mobile.val()) == false) {
            isPass = false;
            mobile.css('border', '1px solid red')
            mobile.next().text('錯誤!請輸入正確的手機號碼')
        }

        if(isPass){
            $.post(
                'table-edit-api.php',
                $(document.form1).serialize(),
                function(data){

                    if(data.success){
                        alert(data.msg);
                    }else {
                        alert(data.msg);
                    }
                },
                'json'
            )
        }

        location.href = '<?=$come_from?>'

    }

</script>

<?php include __DIR__ . '../../parts/html-foot.php' ?>