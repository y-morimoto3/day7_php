<?php
// XSS対策
function h($val){
    return htmlspecialchars($val,ENT_QUOTES);
}

function db_conn(){
try {
    //ID:'root', Password: 'root'
        $db_name = 'shop_db';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = 'root';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host,$db_id,$db_pw);

    return $pdo;
} catch (PDOException $e) {
    exit('DB Connect Error:' . $e->getMessage());
}

}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name) {
    header('Location: ' . $file_name);
    exit();
}


?>