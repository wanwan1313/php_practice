<?php include __DIR__.'../../parts/comfig.php' ?> 

<!-- 需要置換的變數們 -->
<?php 

    $page_title = 'LOGIN' ;

    // 判斷有沒有送出登入資料

    if( isset($_POST['username']) and isset($_POST['userpassword'])){

        // 判斷帳號密碼輸入是否正確
        if( $_POST['username'] == 'wanwan' and $_POST['userpassword'] == '123456'){
            $_SESSION['login'] = $_POST['username'];
        }
        else {
            $msg = '帳號或密碼錯誤';
        }
    }

?>

<?php include __DIR__.'../../parts/html-head.php' ?>
<!-- 這裡插入要放在head的東西 -->


<?php include __DIR__.'../../parts/html-body.php' ?>

<?php include __DIR__.'../../parts/navber.php' ?>
<!-- 這裡插入要放在body的內容 -->

<div class="container">
    <!-- <div class="row">
        <pre> <?php print_r($_POST)?> </pre>
    </div> -->


    <!-- 輸入表單後有錯誤訊息 -->
    <div class="row">
    <?php if(isset($msg)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $msg ?>
        </div>
    <?php endif; ?>

    </div>

    <!-- 成功登入 -->
    <div class="row">
    <?php if( isset($_SESSION['login'])): ?>
        <div class="alert alert-success" role="alert">
            <?= "Hello,{$_SESSION['login']}" ?>
        </div>
        <a href="logout.php">登出</a>
    <!-- 未成功登入 -->
    <?php else: ?>
        <div class="col-md-6">
            <form name="login" method="post">
                <div class="form-group">
                    <label for="username">會員帳號</label>
                    <input type="text" class="form-control" id="username" name="username" >

                </div>
                <div class="form-group">
                    <label for="userpassword">會員密碼</label>
                    <input type="password" class="form-control" id="userpassword" name="userpassword" >
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    <?php endif; ?>

    </div>
</div>


<?php include __DIR__.'../../parts/scripts.php' ?>
<!-- 這裡插入jQuery或JS -->
<script>

</script>

<?php include __DIR__.'../../parts/html-foot.php' ?>