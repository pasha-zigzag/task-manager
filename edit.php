<?php
session_start();
//Подключение к базе
$pdo = new PDO('mysql:host=localhost;dbname=task-manager;charset=UTF8', 'root', '');

//Получаем данные
$id = $_POST['id'];
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

if($_FILES['img']['error'] == 0) {
    $uploadsDir = 'assets/img';
    $imgTmpName = $_FILES['img']['tmp_name'];
    $imgName = $_FILES['img']['name'];
    $image = "$uploadsDir/$imgName";
    move_uploaded_file($imgTmpName, $image);
} else {
    $sql = 'SELECT image FROM tasks WHERE id=?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $image = $stmt->fetch(PDO::FETCH_ASSOC)[image];
}

//Выполнение запроса
$sql = 'UPDATE tasks SET task_name=:task_name, description=:description, image=:image WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->execute([':task_name'   => $name, 
                ':description' => $description, 
                ':image'       => $image,
                ':id'          => $id]);

header("Location: show.php?id=$id");