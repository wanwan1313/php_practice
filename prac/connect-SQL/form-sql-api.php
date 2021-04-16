<?php include __DIR__ . '../../parts/comfig.php';

$output = [

    'success' => false,
    'code' => 0,
    'msg' => '註冊失敗'

];

if ( isset($_POST['name'])){

    // TODO:欄位資料檢查

    if( strlen($_POST['name']) < 2 ){
        $output['msg'] = '姓名格式錯誤';
        echo json_encode($output,JSON_UNESCAPED_UNICODE);
        exit; //離開這支php，不執行後面程式，也可以用die()

    };

    $email_reg = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';
    if( empty(preg_grep($email_reg,[$_POST['email']])) ){
        $output['msg'] = 'email格式錯誤';
        echo json_encode($output,JSON_UNESCAPED_UNICODE);
        exit; //離開這支php，不執行後面程式，也可以用die()

    };

    $moblie_reg = '/^09\d{2}-?\d{3}-?\d{3}$/';
    if(empty(preg_grep($moblie_reg,[$_POST['mobile']]))){
        $output['msg'] = '手機格式錯誤';
        echo json_encode($output,JSON_UNESCAPED_UNICODE);
        exit; //離開這支php，不執行後面程式，也可以用die()
    };





    // 新增到資料庫
    $R_SQL = " INSERT INTO `address_book2`(
        `name`, `email`, `mobile`, `address`, `birthday`, `create_at`) 
        VALUES (?,?,?,?,?,NOW())";
    
    $stmt = $pdo -> prepare($R_SQL);
    $stmt -> execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['mobile'],
        $_POST['address'] == "" ?  NULL:$_POST['address'],
        $_POST['birthday'] == "" ?  NULL:$_POST['birthday']
    ]);

    if( $stmt -> rowcount()){
        $output['success'] = true;
        $output['msg'] = '註冊成功';
    };

    

};

echo json_encode($output,JSON_UNESCAPED_UNICODE)








?>