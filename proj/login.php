<?php include __DIR__ . '/parts/comfig.php' ?>

<?php
$page_title = '登入';

?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<!-- 這裡插入要放在head的東西 -->


<?php include __DIR__ . '/parts/html-body.php' ?>

<?php include __DIR__ . '/parts/navber.php' ?>
<!-- 這裡插入要放在body的內容 -->

<div class="container">
    <div class="row">
        <div class="col-8 card">
            <div class="card-body">
                <h5 class="card-title">會員登入</h5>
                <div class="col-md-6">
                    <form name="form1" method="post" novalidate onsubmit="checkform(); return false;">
                        <div class="form-group">
                            <label for="email">*信箱/帳號</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <small class="form-text" style="color: red;"> </small>
                        </div>
                        <div class="form-group">
                            <label for="password">*密碼</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <small class="form-text" style="color: red;"> </small>
                        </div>


                        <button type="submit" class="btn btn-primary">登入</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '/parts/scripts.php' ?>
<!-- 這裡插入jQuery或JS -->
<script>

    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    // const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    let email = $('#email');
    let password = $('#password')
    let form_arr = [email, ,password]


    // 前端檢查表格
    function checkform() {

        let isPass = true;

        // 先把錯誤格式回復
        form_arr.forEach(el => {
            el.css('border', '1px solid #cccccc')
            el.next().text('')
        })


        if ( email_re.test(email.val()) == false) {
            isPass = false;
            email.css('border', '1px solid red')
            email.next().text('錯誤!請輸入正確的信箱')
        }
        if ( password.val() == '') {
            isPass = false;
            password.css('border', '1px solid red')
            password.next().text('錯誤!請輸入正確的密碼')
        }


        if(isPass){
            $.post(
                'login-api.php',
                $(document.form1).serialize(),
                function(data){

                    if(data.success){
                        alert(data.msg);
                        location.href = './basic_page.php'
                    }else {
                        alert(data.msg);
                    }
                },
                'json'
            )
        }
 

    }
</script>

<?php include __DIR__ . '/parts/html-foot.php' ?>