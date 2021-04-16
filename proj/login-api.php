<?php include __DIR__ . '/parts/comfig.php';

$output = [

    'success' => false,
    'code' => 0,
    'msg' => '帳號或密碼錯誤'

];

if ( isset($_POST['email'])){

    // TODO:欄位資料檢查


    // 找email
    $find_sql = "SELECT * FROM `members` WHERE `email`=?";
    $find_stmt = $pdo -> prepare($find_sql);
    $find_stmt -> execute([$_POST['email']]);
    $row = $find_stmt -> fetch();

    // 沒有找到代表帳號不存在
    if( empty($row)){
        echo json_encode($output,JSON_UNESCAPED_UNICODE);
        exit; //離開這支php，不執行後面程式，也可以用die()
    }

    // 有找到下一步驗證密碼
    if( password_verify($_POST['password'],$row['password'])){
        unset($row['password']);
        unset($row['hash']);
        $_SESSION['user'] = $row;
        $output['success'] = true;
        $output['msg'] = '登入成功';
    }

};

echo json_encode($output,JSON_UNESCAPED_UNICODE)


?>