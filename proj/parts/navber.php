<?php

// 防呆
if (isset($page_title) == false) {
    $page_title = '';
};

?>


<style>
    nav .nav-item.active {
        background-color: #aaf;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $page_title == '商品列表' ? 'active' : '' ?>">
                    <a class="nav-link " href="product-list.php">商品列表</a>
                </li>
                <li class="nav-item <?= $page_title == '商品ajax' ? 'active' : '' ?>">
                    <a class="nav-link " href="product-list3.php">商品ajax</a>
                </li>
                <li class="nav-item <?= $page_title == '購物車' ? 'active' : '' ?>">
                    <a class="nav-link" href="cart-list.php">購物車<span class="badge badge-danger cart-count">0</span></a>
                    
                </li>
            </ul>
            <ul class="navbar-nav ">

                <?php if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item ">
                        <a class="nav-link ">Hello,<?= htmlentities($_SESSION['user']['nickname'])?></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="logout.php">登出</a>
                    </li>

                <?php else : ?>
                    <li class="nav-item <?= $page_title == '登入' ? 'active' : '' ?>">
                        <a class="nav-link " href="login.php">登入</a>
                    </li>
                    <li class="nav-item <?= $page_title == '註冊' ? 'active' : '' ?>">
                        <a class="nav-link" href="register.php">註冊</a>
                    </li>
                <?php endif; ?>

            </ul>

        </div>
    </div>
</nav>