<?php include __DIR__ . '../../parts/comfig.php' ?>

<?php
$page_title = '我的新增表單';

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
                <h5 class="card-title">會員註冊</h5>
                <div class="col-md-6">
                    <form name="form1" method="post" novalidate onsubmit="checkform(); return false;">
                        <div class="form-group">
                            <label for="name">*姓名</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <small class="form-text" style="color: red;"> </small>
                        </div>
                        <div class="form-group">
                            <label for="email">*信箱</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <small class="form-text" style="color: red;"> </small>
                        </div>
                        <div class="form-group">
                            <label for="mobile">*手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}">
                            <small class="form-text" style="color: red;"> </small>
                        </div>
                        <div class="form-group">
                            <label for="address">住址</label>
                            <textarea class="form-control" name="address" id="address" cols="40" rows="3"></textarea>
                            <small class="form-text" style="color: red;"> </small>
                        </div>
                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" required>
                            <small class="form-text" style="color: red;"> </small>
                        </div>



                        <button type="submit" class="btn btn-primary">送出</button>
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
                'form-sql-api.php',
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

        location.href = 'table-edit.php'


    }
</script>

<?php include __DIR__ . '../../parts/html-foot.php' ?>