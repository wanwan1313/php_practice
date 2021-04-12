<?php

// 防呆
if(isset($page_title) == false){
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
                <li class="nav-item ">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?= $page_title=='我的表格'? 'active':'' ?>">
                    <a class="nav-link " href="table-sql.php">表格</a>
                </li>
                <li class="nav-item <?= $page_title=='我的新增表單'? 'active':'' ?>">
                    <a class="nav-link" href="form-sql.php">新增</a>
                </li>

            </ul>

        </div>
    </div>
</nav>