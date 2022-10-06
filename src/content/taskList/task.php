<?php

require_once '/Applications/MAMP/htdocs/Enjoy/PHP-QUIZ/src/function/db.php';

$db = connect();

// 完了のステータスを判定
$key = '未完了';

// GETで現在のページ数を取得する（未入力の場合は1を挿入）
if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
} else {
    $page = 1;
}

// スタートのポジションを計算する
if ($page > 1) {
    // 例：２ページ目の場合は、『(2 × 10) - 10 = 10』
    $start = ($page * 10) - 10;
} else {
    $start = 0;
}

// postsテーブルから10件のデータを取得する
$sql = "SELECT * FROM task_all order by id desc LIMIT {$start}, 10";
$posts = $db->prepare($sql);
$posts->execute();
$result = $posts->fetchAll(PDO::FETCH_ASSOC);

// postsテーブルのデータ件数を取得する
$page_num = $db->prepare('SELECT COUNT(*) id FROM task_all');
$page_num->execute();
$page_num = $page_num->fetchColumn();

// ページネーションの数を取得する
$pagination = ceil($page_num / 10);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タスク一覧</title>
    <link rel="stylesheet" href="../../../public/assets/css/menu.css">
</head>

<body>
    <div class="header">
        <div class="logo">
            logo
        </div>

        <div class="list">
            <ul>
                <li>icon</li>
                <li>颯</li>
            </ul>

            <a href="#">ログアウト</a>
        </div>
    </div>

    <div class="wrap">
        <div class="main">
            <div class="main_content">
                <?php include '/Applications/MAMP/htdocs/Enjoy/PHP-QUIZ/public/template/menu.html' ?>
            </div>
        </div>

        <div class="side">
            <div class="side_content">
                <div class="tasks">
                    <?php foreach ($result as $row) : ?>
                        <?php if ($row['situation'] === $key) : ?>
                            <div class="task">
                                <?php
                                // 今日の日付の取得
                                $objDateTime = new DateTime();
                                $time = $objDateTime->format('Y-m-d');

                                // タスク期限を計算
                                $time1 = new DateTime($row['time']);
                                $time2 = new DateTime($time);
                                $diff = $time1->diff($time2);
                                $limit = $diff->format('あと%a日');
                                ?>

                                <div class="content-menu">
                                    <?php if ($limit === 'あと1日') : ?>
                                        <p class="limit-check"><?php echo $limit ?></p>
                                    <?php else : ?>
                                        <p class="limit"><?php echo $limit ?></p>
                                    <?php endif; ?>

                                    <label class="open" for="pop-up"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAABAklEQVRoge2ZQQ6CMBBFfzyF4okEruA17FrisdQNS72M4MYVLlpiJJhMG0uH8F/SdME0+a8QZjEAISSUEsAFwBNAl3i1LkvhK3FSEP7XqqQSpTvwAnAAkPneQgQyAAY2Uwcglxy6umITL1cwBjbbWVLcuuJNzESBrGGzNZLi/lvUymi+VYIgUaCINiiijRCRGvG7dz2FyBT85ffPPpISimiDItpYtAgbogdsiLOHItqgiDYWLcKG6AEb4uyhiDYooo0xkdbtGkZuQ7ZufwwfjInc3L6PFiecPtNdUlzgMww10PFmhsPQnfRghTSjZ8k6+t5CDjs9bRSEb1wW8ZsghHzzBhsrDRhqsjoQAAAAAElFTkSuQmCC"></label>
                                    <input type="checkbox" id="pop-up">
                                    <div class="overlay">
                                        <div class="window">
                                            <label class="close" for="pop-up"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAABl0lEQVRoge2ZTU7DQAyFH9yBKJQT0fYKHAAOQNatOBZwAVjRBecgYcMqXcQRNJpGtucnFvKTRhMpdvK+TDLjaACXy6XVFsALgG8A/cKtIy8bKcSTAfPn2p4LsaWEHwCPAFbSp5BBKwANBk89gDUn6ZWCm3y+1GoweHvmBHcUfJ3TkVI1Bm8tJ3h8F60q6O9yASNZ5CDW5CDWlALkHkAVkV/RNZJLMv0+UOwBOpiKcnu6FkdsfxKQKwAfFP8J2SI6za2ZeVlAQoY4MFoIkT/Nyi6BiYEQ+dOWKByYWAiRv5haaw4mBYTIX2zRGIJJBSHyl6L6/TutHibHMWsOUBgEOB2FFCMxykQZf1HyZv5qkUIfdkwFoPaXcvqtZ85pYYoviKEPOwVM0RJlbnaKhSlWNHKm2BiYImW8ZJ3QwmQB+Tc/VkD5X93iJUoumShRsslBrMlBrCkE0lFvYcttqhvqv6YnQiBv1N9ls6PX6OmdE7zB72ZoAxsjM90MveUm7nF+e3jptpM+hTWG3dPWgPmWvLBHwuVyneoI9StbelnG+CQAAAAASUVORK5CYII="></label>
                                            <div class="action">
                                                <?php $id = $row['id']; ?>
                                                <a href="#">編集</a>
                                                <a href="../taskDelete/delete.php?id=<?php echo $id; ?>">削除</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 担当者ごとに表示を切り替える -->
                                <div class="area">
                                    <?php if ($row['name_tag'] === '竹田颯') : ?>
                                        <div class="staff1">
                                            <p>T_HAYATE</p>
                                        </div>
                                    <?php elseif ($row['name_tag'] === '竹中翔貴') : ?>
                                        <div class="staff2">
                                            <p>T_SHOKI</p>
                                        </div>
                                    <?php elseif ($row['name_tag'] === '矢田桂都') : ?>
                                        <div class="staff3">
                                            <p>Y_KEITO</p>
                                        </div>
                                    <?php else : ?>
                                        <div class="staff4">
                                            <p>Y_KYOSUKE</p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($row['category'] === '企画') : ?>
                                        <p class="category1"><?php echo $row['category'] ?></p>
                                    <?php endif; ?>

                                    <?php if ($row['category'] === '設計') : ?>
                                        <p class="category2"><?php echo $row['category'] ?></p>
                                    <?php endif; ?>

                                    <?php if ($row['category'] === 'プログラミング') : ?>
                                        <p class="category3"><?php echo $row['category'] ?></p>
                                    <?php endif; ?>

                                    <?php if ($row['category'] === 'テスト') : ?>
                                        <p class="category4"><?php echo $row['category'] ?></p>
                                    <?php endif; ?>

                                    <?php if ($row['category'] === '運用・保守') : ?>
                                        <p class="category5"><?php echo $row['category'] ?></p>
                                    <?php endif; ?>

                                    <?php if ($row['category'] === '発表') : ?>
                                        <p class="category6"><?php echo $row['category'] ?></p>
                                    <?php endif; ?>

                                    <?php if ($row['important'] === '高') : ?>
                                        <p class="category7"><?php echo $row['important'] ?></p>
                                    <?php endif; ?>

                                    <?php if ($row['important'] === '中') : ?>
                                        <p class="category8"><?php echo $row['important'] ?></p>
                                    <?php endif; ?>

                                    <?php if ($row['important'] === '低') : ?>
                                        <p class="category9"><?php echo $row['important'] ?></p>
                                    <?php endif; ?>
                                </div>

                                <p class="task_content"><?php echo $row['content'] ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- <?php for ($x = 1; $x <= $pagination; $x++) { ?>
            <a href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
        <?php } ?> -->
</body>

</html>