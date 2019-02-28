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

    <title>Show</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>

  <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">О проекте</h4>
              <p class="text-muted">Менеджер задач - мое первое приложение, написанное на чистом PHP. Здесь можно создавать, редактировать и удалять задачи. Спасибо Рахиму Муратову за предоставленную верстку и возможность обучаться по лучшей методике на реальном проекте.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white"><?= $_SESSION['email'] ?></h4>
              <ul class="list-unstyled">
                <li><a href="logout.php" class="text-white">Выйти</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="index.php" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Tasks</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <div class="form-wrapper text-center">
      <img src="<?= $task['image'] ?>" alt="" width="400">
      <h2><?= $task['task_name']?></h2>
      <p>
        <?= $task['description']?>
      </p>
      <div class="btn-group">
        <a href="edit-form.php?id=<?= $task['id'] ?>" class="btn btn-sm btn-outline-secondary">Изменить</a>
        <a href="delete.php?id=<?= $task['id'] ?>" class="btn btn-sm btn-outline-secondary" onclick="confirm('are you sure?')">Удалить</a>
      </div>
      <div class="container">
        <a href="index.php">Вернуться к списку</a>
      </div>
      
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
