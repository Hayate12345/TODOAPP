<?php
session_start();
require_once '/Applications/MAMP/htdocs/Enjoy/PHP-QUIZ/src/function/login_check.php';
// ログインチェック
$result = login_check::checkLogin();
if (!$result) {
    header('Location: ../../login/login.php');
}
require_once '/Applications/MAMP/htdocs/Enjoy/PHP-QUIZ/src/function/db.php';

$db = connect();

$id = filter_input(INPUT_GET, 'id');

$sql = 'UPDATE `task_all` SET `situation` = ?  WHERE id = ?';
$stmt = $db->prepare($sql);
$arr = [];
$arr[] = '完了';
$arr[] = $id;
$stmt->execute($arr);

header('Location: ./finish.php');
