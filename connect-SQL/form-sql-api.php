<?php include __DIR__ . '../../parts/comfig.php';

$output = [

    'success' => false,
    'code' => 0,
    'msg' => '註冊失敗'

];

if ( isset($_POST['name'])){

    $R_SQL = " INSERT INTO `address_book2`(
        `name`, `email`, `mobile`, `address`, `birthday`, `create_at`) 
        VALUES (?,?,?,?,?,NOW())";
    
    $stmt = $pdo -> prepare($R_SQL);
    $stmt -> execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['mobile'],
        $_POST['address'],
        $_POST['birthday']
    ]);

    if( $stmt -> rowcount()){
        $output['success'] = true;
        $output['msg'] = '註冊成功';
    };

};

echo json_encode($output,JSON_UNESCAPED_UNICODE)








?>