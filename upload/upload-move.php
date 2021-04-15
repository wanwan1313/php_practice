<?php include __DIR__.'../../parts/comfig.php';

    $page_title = '上傳檔案-搬移' ;

    $output = [];

    if(isset($_FILES['picture'])){
        $output['file'] = $_FILES['picture'];
        $img_folder = __DIR__. '/images/'. $_FILES['picture']['name'];
        $output['m']= move_uploaded_file($_FILES['picture']['tmp_name'], $img_folder);
        echo json_encode($output);
    }

/*
-給用戶上傳檔案會有檔名重複的問題 -> 使用亂數
-檔案格式需要限定
*/

?>

<?php include __DIR__ . '../../parts/html-head.php' ?>