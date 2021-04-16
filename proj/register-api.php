<?php include __DIR__ . '/parts/comfig.php';

$output = [

    'success' => false,
    'code' => 0,
    'msg' => '註冊失敗'

];

if ( isset($_POST['email'])){

    // TODO:欄位資料檢查


    // 找email有沒有重複
    $find_sql = "SELECT `email` FROM `members` WHERE `email`=?";
    $find_stmt = $pdo -> prepare($find_sql);
    $find_stmt -> execute([$_POST['email']]);

    if( $find_stmt -> rowcount()){
        $output['msg'] = 'email重複註冊';
        echo json_encode($output,JSON_UNESCAPED_UNICODE);
        exit; //離開這支php，不執行後面程式，也可以用die()
    }

    // 檢查email格式
    $email_reg = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';
    if( empty(preg_grep($email_reg,[$_POST['email']])) ){
        $output['msg'] = 'email格式錯誤';
        echo json_encode($output,JSON_UNESCAPED_UNICODE);
        exit; //離開這支php，不執行後面程式，也可以用die()

    };




    // 新增到資料庫
    $R_SQL = " INSERT INTO `members`(
        `email`, `password`, `mobile`, `address`, `birthday`, `hash`, `nickname`, `created_at`) 
        VALUES (?,?,?,?,?,?,?,NOW())";

    $hash = sha1($_POST['email']. uniqid());
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    
    $stmt = $pdo -> prepare($R_SQL);
    $stmt -> execute([
        $_POST['email'],
        $password,
        $_POST['mobile'] == "" ?  NULL:$_POST['mobile'],
        $_POST['address'] == "" ?  NULL:$_POST['address'],
        $_POST['birthday'] == "" ?  NULL:$_POST['birthday'],
        $hash,
        $_POST['nickname']
    ]);

    // 抓資料庫最後一筆資料的sid =自己
    $COUNT_SQL = "SELECT `sid` FROM `members` ORDER BY `members`.`sid` DESC LIMIT 1";
    $sid = $pdo -> query($COUNT_SQL) -> fetch(PDO::FETCH_NUM)[0];
    if( $stmt -> rowcount()){
        $_SESSION['user'] = [
            "sid" => $sid,
            "email" => $_POST['email'],
            "mobile" => $_POST['mobile'] == "" ?  NULL:$_POST['mobile'],
            "address" => $_POST['address'] == "" ?  NULL:$_POST['address'],
            "birthday" => $_POST['birthday'] == "" ?  NULL:$_POST['birthday'],
            "nickname" => $_POST['nickname']
        ];
        $output['success'] = true;
        $output['msg'] = '註冊成功';

    }else {
        $output['msg'] = '註冊發生錯誤';
    };

};

echo json_encode($output,JSON_UNESCAPED_UNICODE)








?>