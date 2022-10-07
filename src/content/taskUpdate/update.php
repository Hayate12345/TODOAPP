<?php
require_once '/Applications/MAMP/htdocs/Enjoy/PHP-QUIZ/src/function/db.php';

$db = connect();

$id = filter_input(INPUT_POST, 'id');

// フォームの値を受け取る
$content = filter_input(INPUT_POST, 'content');
$name_tag = filter_input(INPUT_POST, 'name_tag');
$important = filter_input(INPUT_POST, 'important');
$category = filter_input(INPUT_POST, 'category');
$time = filter_input(INPUT_POST, 'time');
$state = filter_input(INPUT_POST, 'state');
$ster = filter_input(INPUT_POST, 'ster');

$sql = 'UPDATE `task_all` SET `content` = ?, `name_tag` = ?, situation = ?, `important` = ?, `category` = ?, `time` = ?, `ster` = ?  WHERE id = ?';
$stmt = $db->prepare($sql);
$arr = [];
$arr[] = $content;
$arr[] = $name_tag;
$arr[] = $state;
$arr[] = $important;
$arr[] = $category;
$arr[] = $time;
$arr[] = $ster;
$arr[] = $id;
$stmt->execute($arr);

header('Location: ../taskList/task.php');
