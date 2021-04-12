<?php include __DIR__.'../../parts/comfig.php' ?> 

<?php 
    $page_title = '從資料庫抓資料' ;

    // require __DIR__.'../../parts/__connect_db.php'; 寫在config裡

    $stmt = $pdo ->query('SELECT * FROM address_book2 ');
    // $row = $stmt ->fetch(); ->抓一筆
    // $rows = $stmt ->fetchAll(); ->抓全部
    //  fetch()在__connect_db的設定裡，預設為PDO::FETCH_ASSOC(關聯式陣列)
    //  PDO::FETCH_NUM(一般陣列)
    //  PDO::FETCH_BOTH(一般陣列+關聯式陣列)
    // echo json_encode($row)

    while($row = $stmt ->fetch()){
        echo "編號:{$row['sid']}；姓名:{$row['name']}；生日:{$row['birthday']}<br>";
    };
?>

<!-- <?php include __DIR__.'../../parts/html-head.php' ?> -->

