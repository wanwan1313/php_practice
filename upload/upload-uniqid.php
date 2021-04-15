<?php 

$output = [
    'success' => false,
    'filename' => '',
    'msg' => '沒有上傳成功',
    'file' => ''
];


//副檔名轉換
$exts = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',

];

if (isset($_FILES['picture'])) {

    //先判定檔案格式有沒有正確
    if (empty($exts[$_FILES['picture']['type']])) {
        $output['msg'] = '請上傳格式為PNG/JPG的檔案';
    }
    //代表檔案格式ok
    else {
        $output['file'] = $_FILES['picture'];
        $img_folder = __DIR__ . '/images/' ;
        $img_ext = $exts[$_FILES['picture']['type']];
        $img_name = uniqid(). rand(100,999). $img_ext;
        $output['filename']= $img_name;
        if( move_uploaded_file($_FILES['picture']['tmp_name'], $img_folder. $img_name)){
            $output['success'] = true;
            $output['msg'] = '檔案上傳成功';
        };
    }
}

header('Content-Type: application/json');
echo json_encode($output);

/*
-給用戶上傳檔案會有檔名重複的問題 -> 使用亂數
-檔案格式需要限定
*/

?>
