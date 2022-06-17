<!DOCTYPE html class="text-gray-900 antialiased leading-tight">
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>LAND's</title>
</head>
<header>
    @include('section.header')
</header>
<body class="min-h-screen bg-gray-100">
    <p>トップページ</p>
    <ul>
        <li>
            <a href="/login">ログイン</a>
        </li>
        <li>アカウント新規作成</li>
    </ul>
    <ul>
        <li>検索→地名から</li>
        <li>検索→駅名から</li>
        <li>など</li>
    </ul>
</body>
<footer>
    @include('section.footer')
</footer>
</html>