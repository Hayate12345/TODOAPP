<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タスクを登録する</title>
    <link rel="stylesheet" href="../../../public/assets/css/taskPush.css">
</head>

<body>

    <div class="header">
        <div class="header">
            <div class="img">
                <img src="../../../public/assets/img/名称未設定-3.png" alt="">
                <p>TaskFetch</p>
            </div>

            <div class="logout">
                <a href="../../login/logout.php">ログアウト</a>
            </div>
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
                <div class="forms">
                    <form action="./taskPush.php" method="post">
                        <div class="box">
                            <label for="" class="label-name">タスク内容</label>
                            <br>
                            <textarea required name="content" cols="30" rows="2"></textarea>
                        </div>

                        <div class="box">
                            <label class="label-name" for="">担当者</label>
                            <br>
                            <input id="radio1" required name="name_tag" type="radio" value="竹田颯" />　竹田颯

                            <input id="radio2" class="radiobutton1" name="name_tag" type="radio" value="竹中翔貴" />　竹中翔貴

                            <input id="radio3" class="radiobutton1" name="name_tag" type="radio" value="矢田桂都" />　矢田桂都

                            <input id="radio4" class="radiobutton1" name="name_tag" type="radio" value="山本恭輪" />　山本恭輪
                        </div>

                        <div class="box">
                            <label class="label-name" for="">優先度</label>
                            <br>
                            <input required id="radio1" name="important" type="radio" value="高" />　高

                            <input id="radio2" class="radiobutton1" name="important" type="radio" value="中" value="竹中翔貴" />　中

                            <input id="radio3" class="radiobutton1" name="important" type="radio" value="低" />　低
                        </div>



                        <div class="box">
                            <label for="" class="label-name">タスクカテゴリー</label>
                            <br>
                            <input required id="radio1" name="category" type="radio" value="企画" />　企画

                            <input id="radio1" class="radiobutton1" name="category" type="radio" value="設計" />　設計

                            <input id="radio1" class="radiobutton1" name="category" type="radio" value="プログラミング" />　プログラミング

                            <input id="radio1" class="radiobutton1" name="category" type="radio" value="テスト" />　テスト

                            <input id="radio1" class="radiobutton1" name="category" type="radio" value="運用・保守" />　運用・保守

                            <input id="radio1" class="radiobutton1" name="category" type="radio" value="発表" />　発表
                        </div>

                        <div class="box1">
                            <label for="" class="label-name">期限</label>
                            <br>
                            <input required type="date" name="time">
                        </div>

                        <input type="hidden" name="state" value="未完了">
                        <input type="hidden" name="ster" value="未マーク">

                        <button type="submit">タスク登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>