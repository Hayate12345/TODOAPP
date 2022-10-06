<?php
require_once '/Applications/MAMP/htdocs/Enjoy/PHP-QUIZ/src/function/db.php';

$db = connect();

$id = filter_input(INPUT_GET, 'id');

$sql = 'DELETE FROM `task_all` WHERE id = ?';
$stmt = $db->prepare($sql);
$arr = [];
$arr[] = $id;
$stmt->execute($arr);

header('Location: ../taskList/task.php');