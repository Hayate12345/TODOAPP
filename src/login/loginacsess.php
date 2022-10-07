<?php

require_once '/Applications/MAMP/htdocs/Enjoy/PHP-QUIZ/src/function/db.php';

$db = connect();

$key = filter_input(INPUT_POST, 'project');

$password = filter_input(INPUT_POST, 'project123');

$sql = "SELECT password FROM login_sample WHERE name = ?";
$stmt = $db->prepare($sql);
$arr = [];
$arr[] = $key;
$stmt->execute($arr);
$result = $stmt->fetch();

if($password === $result['password']){
    session_start();
    $_SESSION['check'] = $password;
    header('Location: ../content/taskList/task.php');
}else{
    header('Location: ./login.php');
}