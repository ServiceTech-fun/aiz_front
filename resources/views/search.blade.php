<?php
$api_server = 'http://34.168.149.138:5000/';
$search_method = $_GET['method'];
/**
 * $search_method
 * city: 都道府県 
 */

$abandonment_lands = json_decode(file_get_contents($api_server), true);
// print_r($abandonment_lands);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>LAND's</title>
</head>

<body>
    <h1>検索結果ページ</h1>
    <p>GETメソッドを使って、検索方法や検索ワードを取得し、検索APIを走らせて表示させる</p>
    <?php
    foreach ($abandonment_lands as $land) {
    ?>
        <div>
            <div>userid: <?= $land['userid'] ?></div>
            <div>name: <?= $land['name'] ?></div>
            <div>waive: <?= $land['waive'] ?></div>
            <div>vertical: <?= $land['vertical'] ?></div>
            <div>horizotal: <?= $land['horizontal'] ?></div>
            <div>comment: <?= $land['comment'] ?></div>
            <div>image: <?= $land['image'] ?></div>
            <div>stage: <?= $land['state'] ?></div>
            <div>usage: <?= $land['usage'] ?></div>
        </div>
    <?php
    }
    ?>
</body>

</html>