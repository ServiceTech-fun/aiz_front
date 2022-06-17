<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAND's</title>
</head>
<body>
    <h1>土地の詳細紹介ページ</h1>
    <div>userid: {{ $abando_land['userid'] }}</div>
    <div>name: {{ $abando_land['name'] }}</div>
    <div>waive: {{ $abando_land['waive'] }}</div>
    <div>vertical: {{ $abando_land['vertical'] }}</div>
    <div>horizontal: {{ $abando_land['horizontal'] }}</div>
    <div>comment: {{ $abando_land['comment'] }}</div>
    <div>image: {{ $abando_land['image'] }}</div>
    <div>state: {{ $abando_land['state'] }}</div>
    <div>usage: {{ $abando_land['usage'] }}</div>
    <button>借りる</button>
</body>
</html>