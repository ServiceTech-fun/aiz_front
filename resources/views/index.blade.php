<!DOCTYPE html class="text-gray-900 antialiased leading-tight">
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>LAND's</title>
</head>
<body class="min-h-screen bg-gray-100">
    {{-- ヘッダーナビゲーション --}}
    @include('section.header')
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto pt-20">
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


    </div>
    {{-- メンバー紹介セクション --}}
    @include('section.member')



    {{-- フッターナビゲーション --}}
    @include('section.footer')
</body>
</html>