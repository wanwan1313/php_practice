<?php include __DIR__ . '../../parts/comfig.php' ?>

<?php
$page_title = '我的表格';


// 算有幾筆資料
$page_num = 5; //每一頁要出現的筆數
$page_num_sql = "SELECT COUNT(1) FROM address_book2"; //數SQL的筆數數量
$page_row_total = $pdo->query($page_num_sql)->fetch(PDO::FETCH_NUM)[0]; //從SQL抓出來
$pages = ceil($page_row_total / $page_num); //算頁數


// 從資料庫抓資料
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; //抓出目前所在頁數
//防呆
if ($page < 1) {
    $page = 1;
} elseif ($page > $pages) {
    $page = $pages;
};

//從資料庫抓資料的規則(從哪一個index開始,抓幾筆資料)
$sql = sprintf("SELECT * FROM address_book2 ORDER BY sid DESC LIMIT %s ,%s ", ($page - 1) * $page_num, $page_num);
$rows = $pdo->query($sql)->fetchAll(); //全部抓出來，為一個陣列

?>

<?php include __DIR__ . '../../parts/html-head.php' ?>
<?php include __DIR__ . '../../parts/navber.php' ?>

<div class="container">

    <!-- <div> <?= $page_row_total ?> </div>
    <div> <?= $pages ?> </div> -->

    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a></li>
                    <?php for ($i = 1; $i <= $pages; $i++) : ?>
                        <li class="page-item <?= $page == $i ? 'active' : '' ?> "><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item <?= $page >= $pages ? 'disabled' : '' ?>"><a class="page-link " href="?page=<?= $page + 1 ?>">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Delete</th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Address</th>
                <th scope="col">Birthday</th>
                <th scope="col">修改</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr class="person">
                    <td class="delete">
                        <a href="javascript:delete_item(<?= $r['sid'] ?>)">
                            <i class="fas fa-trash-alt">
                            </i>
                        </a>
                    </td>
                    <td><?= $r['sid'] ?></td>
                    <td><?= strip_tags($r['name']) ?></td>
                    <!-- strip_tags()跳脫標籤的字元，會把標籤刪除-->
                    <td><?= $r['email'] ?></td>
                    <td><?= $r['mobile'] ?></td>
                    <td><?= htmlentities($r['sid']) ?></td>
                    <!-- htmlentities()跳脫標籤的字元，會把標籤直接顯示出來-->
                    <td><?= $r['birthday'] ?></td>
                    <td class="edit">
                        <a href="table-edit.php?sid=<?= $r['sid'] ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include __DIR__ . '../../parts/scripts.php' ?>

<script>
    function delete_item(sid) {
        if (confirm(`確定要刪除編號${sid}的資料嗎?`)) {

            location.href = `table-delete-api.php?sid=${sid}`
        }
    }

    // $('.delete').on('click', function() {
    //     $(this).parent('.person').remove()
    // })
</script>
<?php include __DIR__ . '../../parts/html-foot.php' ?>