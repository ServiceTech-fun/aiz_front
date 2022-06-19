<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>LAND's</title>
</head>

<body>
    @include('section.header')

    <div class=" sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6 xl:gap-8">
        <div class="flex flex-col bg-white border rounded-lg overflow-hidden">
            <a href='/land/<?= $abando_land['_id'] ?>'
                class="group h-48 md:h-64 block bg-gray-100 overflow-hidden relative">
                <img class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200"
                    src="<?= $abando_land['image'] ?>" alt="土地画像">
            </a>
            <div class="flex flex-col flex-1 p-4 sm:p-6">
                <h2 class="text-gray-800 text-lg font-semibold mb-2"><?= $abando_land['userid'] ?></h2>

                <p>放棄年数: <?= $abando_land['waive'] ?>年</p>
                <p>面積：
                    <?php
                    echo ($abando_land['vertical'] * $abando_land['horizontal']) / 100;
                    ?>
                    m<sup>2</sup>
                </p>
                <p>用途：
                    <?php
                    if ($abando_land['usage'] == 'Agriculture') {
                        echo '農業';
                    } elseif ($abando_land['usage'] == 'Home') {
                        echo '住居';
                    }
                    ?>
                </p>
                <span class="text-gray-500 mb-8">コメント：<?= $abando_land['comment'] ?></span>
                <div class="flex justify-between items-end mt-auto pt-6">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 shrink-0 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1586116104126-7b8e839d5b8c?auto=format&q=75&fit=crop&w=64"
                                loading="lazy" alt="Photo by peter bucks"
                                class="w-full h-full object-cover object-center" />
                        </div>
                        <span class="block text-indigo-500"><?= $abando_land['name'] ?></span>
                    </div>
                </div>

                <?php
                if ($abando_land['state'] == 'Available') {
                    echo '<span class="font-bold text-gray-800 text-sm border border-gray-800 rounded px-2 py-1">利用可能</span>';
                } elseif ($abando_land['state'] == 'Wanted') {
                    echo '<span class="text-yellow-600 text-sm border border-yellow-600 rounded px-2 py-1">利用予定</span>';
                } elseif ($abando_land['state'] == 'Ended') {
                    echo '<span class="text-gray-500 text-sm border rounded px-2 py-1">募集終了</span>';
                }
                ?>
            </div>

            <a style="margin: auto;" href="/charge">
                <button style="margin: auto; width:300px; height:100px; background-color:green; color: white; font-size:33px; margin-bottom:30px">借りる</button>
            </a>
        </div>

        @include('section.footer')

</body>

</html>
