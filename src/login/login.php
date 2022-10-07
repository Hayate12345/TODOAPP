<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="../../public/assets/css/login.css">
</head>

<body>
    <div class="header">
        <div class="header">
            <div class="img">
                <img src="../../public/assets/img/名称未設定-3.png" alt="">
                <p>TaskFetch</p>
            </div>
        </div>
    </div>

    <div class="content">
        <form action="./loginacsess.php" method="POST">
            <div class="tag">
                <p>開始する</p>
            </div>

            <div class="box">
                <input type="text" name="project" required placeholder="ログインキー">
            </div>

            <div class="box">
                <input type="text" name="project123" required placeholder="ログインパスワード">
            </div>

            <button type="submit">ログイン</button>
        </form>
    </div>
</body>

</html>