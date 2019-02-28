<?php
session_start();

//Получаем данные
$id = $_GET['id'];

//Подключаемся к базе и выполняем запрос
$pdo = new PDO('mysql:host=localhost;dbname=task-manager;charset=UTF8', 'root', '');
$sql = "SELECT * FROM tasks WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">

    <title>Edit Task</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>
    <div class="form-wrapper text-center">
      <form class="form-signin" enctype="multipart/form-data" action="edit.php" method="POST">
        <input type="hidden" name="id" value=<?= $id ?>>
        <img class="mb-4" src="assets/img/bootstrap-solid.jpg" alt="" width="90" height="90">
        <h1 class="h3 mb-3 font-weight-normal">Изменить запись</h1>
        <label for="inputName" class="sr-only">Название</label>
        <input type="text" id="inputName" class="form-control" placeholder="Название" value="<?= $task['task_name'] ?>" name="name">
        <label for="inputEmail" class="sr-only">Описание</label>
        <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Описание"><?= $task['description'] ?></textarea>
        <input type="file" name="img">
        <img src="<?= $task['image'] ?>" alt="" width="300" class="mb-3">
        <button class="btn btn-lg btn-success btn-block" type="submit">Редактировать</button>
        <a href="index.php">Вернуться к списку</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
      </form>
    </div>
  </body>
</html>
