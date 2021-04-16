<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>if判斷</title>
    <style>
        .pic {
            width: 300px;
            overflow: hidden;
        }

        img {
            width: 100%;
        }
    </style>
</head>

<body>

<h2><?= isset($_GET['age']) ? "年齡：{$_GET['age']}" : "不知道幾歲喔"  ?> </h2>


<?php /*
    <?php

            if ( isset($_GET['age']) &&  $_GET['age'] < 18) {
                echo '<div class="pic"><img src="../imgs/GettyImages-588935825.jpg" alt=""></div>';
            }
            if ( isset($_GET['age']) &&  $_GET['age'] >= 18) {
                echo '<div class="pic"><img src="../imgs/great-dane-giant-dog-breeds.jpg" alt=""></div>';
            }
            else {
                echo '<div class="pic"><img src="../imgs/21715845113479_395.png" alt=""></div>';
            }
    
    ?>
*/ ?>


<?php /*
    <!-- <?php
    if (isset($_GET['age']) &&  $_GET['age'] < 18) {  
    ?>
        <div class="pic"><img src="../imgs/GettyImages-588935825.jpg" alt=""></div>
    <?php
    }
    if (isset($_GET['age']) &&  $_GET['age'] >= 18) {
    ?>
        <div class="pic"><img src="../imgs/great-dane-giant-dog-breeds.jpg" alt=""></div>
        
    <?php
    }
    else {
    ?>
        <div class="pic"><img src="../imgs/21715845113479_395.png" alt=""></div>

    <?php
    }
    ?> -->
*/ ?>


<?php if(isset($_GET['age']) &&  $_GET['age'] < 18): ?>
    <div class="pic"><img src="../imgs/GettyImages-588935825.jpg" alt=""></div>
<?php elseif(isset($_GET['age']) &&  $_GET['age'] >= 18): ?>
    <div class="pic"><img src="../imgs/great-dane-giant-dog-breeds.jpg" alt=""></div>
<?php else: ?>
    <div class="pic"><img src="../imgs/21715845113479_395.png" alt=""></div>
<?php endif; ?>





</body>

</html>