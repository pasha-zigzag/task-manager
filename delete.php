<?php
session_start();

//Получаем данные
$id = $_GET['id'];

//Подключаемся к базе и выполняем запрос
$pdo = new PDO('mysql:host=localhost;dbname=task-manager;charset=UTF8', 'root', '');
$sql = "SELECT image FROM tasks WHERE id=$id";
$stmt = $pdo->query($sql);
$img = $stmt->fetch(PDO::FETCH_ASSOC)[image];
unlink($img);

$sql = "DELETE FROM tasks WHERE id=$id";
$pdo->query($sql);

header('Location: index.php');