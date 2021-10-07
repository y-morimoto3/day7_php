<?php

require_once('funcs.php');

$pdo = db_conn();

$shop_name = $_POST['shop_name'];
$shop_category = $_POST['shop_category'];
$prefecture = $_POST['prefecture'];
$address = $_POST['address'];
$info = $_POST['info'];
$id = $_POST['id'];

// 更新SQL テーブル名・セット・条件
$stmt = $pdo->prepare("UPDATE
                        gs_bm_table
                    SET
                        shop_name = :shop_name,
                        prefecture = :prefecture,
                        address = :address,
                        shop_category = :shop_category,
                        info = :info,
                        img = :img,
                        indate = sysdate()
                    WHERE
                        id = :id;");

// UPDATE `gs_bm_table` SET `id`='[value-1]',`shop_name`='[value-2]',`prefecture`='[value-3]',`address`='[value-4]',`shop_category`='[value-5]',`info`='[value-6]',`img`='[value-7]',`indate`='[value-8]' WHERE 1

// バインド変数
$stmt->bindValue(':shop_name', $shop_name, PDO::PARAM_STR);
$stmt->bindValue(':prefecture', $prefecture, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':shop_category', $shop_category, PDO::PARAM_STR);
$stmt->bindValue(':info', $info, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    redirect('sarch.php');
}