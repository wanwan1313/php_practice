<?php include __DIR__.'../../parts/comfig.php';

    $page_title = '上傳檔案' ;

    if(isset($_FILES['picture'])){
        echo json_encode($_FILES['picture']);
    }


/*


//上傳的圖檔會暫存在tmp資料夾，要使用還需要搬移檔案
{
    "name": "nook.jpg",
    "type": "image/jpeg",
    "tmp_name": "C:\\xampp\\tmp\\phpB014.tmp",
    "error": 0,
    "size": 156934
}

$_FILES['picture']['name']



//上傳多個檔案
{
    "name": [
        "1.png",
        "2.png",
        "3.png"
    ],
    "type": [
        "image/png",
        "image/png",
        "image/png"
    ],
    "tmp_name": [
        "C:\\xampp\\tmp\\php8BC5.tmp",
        "C:\\xampp\\tmp\\php8BC6.tmp",
        "C:\\xampp\\tmp\\php8BC7.tmp"
    ],
    "error": [
        0,
        0,
        0
    ],
    "size": [
        49648,
        41099,
        39472
    ]
}


*/
?>

<?php include __DIR__ . '../../parts/html-head.php' ?>

