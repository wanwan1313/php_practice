<?php include __DIR__.'../../0401/parts/comfig.php' ?> 

<!-- 需要置換的變數們 -->
<?php 

    $page_title = 'form' ;
    // $mycss = 'common.css'

?>

<?php include __DIR__.'../../0401/parts/html-head.php' ?>
<!-- 這裡插入要放在head的東西 -->


<?php include __DIR__.'../../0401/parts/html-body.php' ?>

<?php include __DIR__.'../../0401/parts/navber.php' ?>
<!-- 這裡插入要放在body的內容 -->

<div class="container">
    <div class="row">
        <pre> <?php print_r($_POST)?> </pre>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form name="form1" method="post">
                <div class="form-group">
                    <label for="useremail">Email address</label>
                    <input type="email" class="form-control" id="useremail" name="useremail" value=" <?= empty($_POST['useremail']) ? '': htmlentities($_POST['useremail']) ?>" >
                    <!--  htmlentities >> 跳脫html字元-->

                </div>
                <div class="form-group">
                    <label for="userpassword">Password</label>
                    <input type="password" class="form-control" id="userpassword" name="userpassword" value="<?= empty($_POST['userpassword']) ? '': htmlentities($_POST['userpassword']) ?>">
                    <!--  htmlentities >> 跳脫html字元-->
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="check1" name="check1">
                    <label class="form-check-label" for="check1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


        </div>
    </div>
</div>


<?php include __DIR__.'../../0401/parts/scripts.php' ?>
<!-- 這裡插入jQuery或JS -->
<script>

</script>

<?php include __DIR__.'../../0401/parts/html-foot.php' ?>