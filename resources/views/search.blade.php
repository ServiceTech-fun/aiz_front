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

<body class="">
    @include('section.header')
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto pt-20">
        <div class="mb-10 md:mb-16">
            <h1 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">検索結果ページ</h1>
            <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">GETメソッドを使って、検索方法や検索ワードを取得し、検索APIを走らせて表示させる</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6 xl:gap-8">
            <?php
                foreach ($abandonment_lands as $land) {
            ?>
            <div class="flex flex-col bg-white border rounded-lg overflow-hidden">
                <a href="#" class="group h-48 md:h-64 block bg-gray-100 overflow-hidden relative">
                    <img class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" src="<?= $land['image'] ?>" alt="土地画像">
                </a>
                <div class="flex flex-col flex-1 p-4 sm:p-6">
                    <h2 class="text-gray-800 text-lg font-semibold mb-2"><?= $land['userid'] ?></h2>
                    
                    <p>放棄年数: <?= $land['waive'] ?>年</p>
                    <p>面積：
                    <?php
                        echo $land['vertical'] * $land['horizontal'] / 100 
                    ?>
                    m<sup>2</sup>
                    </p>
                    <p>利用状況：
                        <?php
                    if($land['state'] == "Available"){
                        echo '利用可能';
                    }elseif($land['state'] == "Wanted"){
                        echo '利用予定';
                    }elseif($land['state'] == "Ended"){
                        echo '募集終了';
                    }
                    ?>
                    </p>
                    <span class="text-gray-500 mb-8">コメント：<?= $land['comment'] ?></span>
                    <div class="flex justify-between items-end mt-auto pt-6">
                        <div class="flex items-center gap-2">
                            <div class="w-10 h-10 shrink-0 bg-gray-100 rounded-full overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1586116104126-7b8e839d5b8c?auto=format&q=75&fit=crop&w=64" loading="lazy" alt="Photo by peter bucks" class="w-full h-full object-cover object-center" />
                            </div>
                            <div>
                                <span class="block text-indigo-500"><?= $land['name'] ?></span>
                            </div>
                        </div>
                        <span class="text-gray-500 text-sm border rounded px-2 py-1">
                        <?php
                        if($land['usage'] == "Agriculture"){
                           echo '農業';
                        }elseif($land['usage'] == "Home"){
                          echo '住居';
                        }
                        ?>
                        </span>
                    </div> 
                </div>   
            </div>       
            <?php
            }
            ?>
        </div>
    </div>
    @include('section.footer')
</body>

</html>