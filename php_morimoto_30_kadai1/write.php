<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <title></title>

    <link rel="icon" href="">
    <link rel="stylesheet" href="css/post.css">
    <link rel="stylesheet" href="css/reset.css">

</head>
<body>

<?php

// DB接続格納


$shop_name = $_POST['shop_name'];
$shop_category = $_POST['shop_category'];
$prefecture = $_POST['prefecture'];
$address = $_POST['address'];
$info = $_POST['info'];
$img = $_POST['img'];

// 登録日
date_default_timezone_set('Asia/Tokyo');
$date = date("Y/m/d");

// echo $date;
// echo $shop_name;



require_once('funcs.php');
$pdo = db_conn();



// DB接続はfunc
//３．データ登録SQL作成
// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, shop_name, prefecture, address, shop_category, info, img, indate)
                                         VALUES(NULL, :shop_name, :prefecture, :address, :shop_category, :info, :img, sysdate())");



// 参考
// $stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, name, email, content, date)
//                                         VALUES(NULL, :name, :email, :content, sysdate())");

//  2. バインド変数を用意
$stmt->bindValue(':shop_name', $shop_name, PDO::PARAM_STR);
$stmt->bindValue(':prefecture', $prefecture, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':shop_category', $shop_category, PDO::PARAM_STR);
$stmt->bindValue(':info', $info, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:" . $error[2]);
} 



?>


<div id="wapper">

<p id="title">下記内容で登録いたしました。</p>

<!-- <form method="POST" action="kakunin.php"> -->

<!-- imgもセット -->
    <div class="flex">
        <p>店舗名 :</p><p class=input ><?= h($shop_name); ?></p>
    </div >
    <div class="flex">
        <p>住所 :</p><p class=input ><?= h($prefecture). h($address); ?></p>
    </div>
    <div class="flex">
        <p>店舗形態 :</p><p class=input ><?= h($shop_category); ?></p>
    </div>
    
    <div class="flex">
        <p>店舗情報 :</p><p class=input ><?= h($info); ?></p>
    </div>
   
   
    <div class="flex2">
        <div><input type="submit" value="TOP" class="button" name="sarch" onclick="location.href='index.php'"></div>
        
    </div>

<!-- </form> -->
</div>
    



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>