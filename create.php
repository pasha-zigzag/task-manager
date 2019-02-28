<?php
session_start();

//Получаем данные
$name = $_POST['name'];
$description = $_POST['description'];

//Валидация
if(!$name) {
    $errorMessage = 'Напишите название задачи!';
    include 'errors.php';
    exit;
} elseif (!$description) {
    $errorMessage = 'Напишите описание задачи!';
    include 'errors.php';
    exit;
}

$image = 'assets/img/no-image.jpg';
if($_FILES['img']['error'] == 0) {
    $uploadsDir = 'assets/img';
    $imgTmpName = $_FILES['img']['tmp_name'];
    $imgName = $_FILES['img']['name'];
    $image = "$uploadsDir/$imgName";
    move_uploaded_file($imgTmpName, $image);
}

//Сохранение данных
$pdo = new PDO('mysql:host=localhost;dbname=task-manager;charset=UTF8', 'root', '');
$sql = 'INSERT INTO tasks (task_name, description, image, email) VALUES (:task_name, :description, :image, :email)';
$stmt = $pdo->prepare($sql);
$stmt->execute([':task_name'    => $name, 
                ':description'  => $description, 
                ':image'        => $image, 
                ':email'        => $_SESSION['email']]);

header('Location: index.php');

