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
<div id="wapper">

<p id="title">店舗情報</p>

<!-- ドラック -->
                <div id="dragDropArea">
                    <div class="drag-drop-inside">
                        <p class="drag-drop-info">未実装：写真を入れる</p>
                        <p>または</p>
                        <p class="drag-drop-buttons">
                            <input id="fileInput" type="file" accept="image/*" value="写真を選ぶ" name="img" onChange="photoPreview(event)">
                        </p>
                        <div id="previewArea"></div>
                    </div>
                </div>


<form method="POST" action="write.php">
    <div class="flex">
        <p>店舗名 :</p><input type="text" name="shop_name" class=input >
    </div >
    <div class="flex">
        <p>店舗形態 :</p><input type="text" name="shop_category" class=input placeholder="物販 or 飲食">
    </div>
    
    <div class="flex">
        <p>住所/都道府県 :</p><input type="text" name="prefecture" class=input placeholder="東京都">
    </div>
    <div class="flex">
        <p>住所/市区町村以下 :</p><input type="text" name="address" class=input placeholder="港区青山1-2-3">
    </div>

    <div class="flex">
        <p>店舗情報 :</p><textarea type="text" name="info" class=text placeholder="近隣環境など店舗情報を記載ください" rows="5"></textarea>
    </div>

    
    <input type="submit" value="登録" class="button">


</form>
</div>




    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>