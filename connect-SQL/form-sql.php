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
                <h5 class="card-title">新增表單</h5>
                <div class="col-md-6">
                    <form name="login" method="post">
                        <div class="form-group">
                            <label for="username">會員帳號</label>
                            <input type="text" class="form-control" id="username" name="username">

                        </div>
                        <div class="form-group">
                            <label for="userpassword">會員密碼</label>
                            <input type="password" class="form-control" id="userpassword" name="userpassword">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '../../parts/scripts.php' ?>
<!-- 這裡插入jQuery或JS -->
<script>

</script>

<?php include __DIR__ . '../../parts/html-foot.php' ?>