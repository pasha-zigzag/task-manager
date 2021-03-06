<?php
session_start();

if(!isset($_SESSION['user_id'])) {
  header('Location: login-form.php');
  exit;
}
?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">

    <title>Create Task</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
  </head>

  <body>
    <div class="form-wrapper text-center">
      <form class="form-signin" enctype="multipart/form-data" action="create.php" method="POST">
        <img class="mb-4" src="assets/img/bootstrap-solid.jpg" alt="" width="90" height="90">
        <h1 class="h3 mb-3 font-weight-normal">Добавить запись</h1>
        <label for="inputEmail" class="sr-only">Название</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Название" name="name">
        <label for="inputEmail" class="sr-only">Описание</label>
        <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Описание"></textarea>
        <input type="file" name="img">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>
        <a href="index.php">Вернуться к списку</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
      </form>
    </div>
  </body>
</html>
