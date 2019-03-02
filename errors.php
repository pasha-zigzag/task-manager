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

    <title>Errors</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>

  <body>
    <div class="container text-center mt-5">
      <?php if (isset($errorMessage)) { ?>
        <p><?= $errorMessage ?> </p>
      <?php } else {?>
        <p>Заполните все поля.</p>
      <?php } ?>
      
      <a href="<?= $_SERVER['HTTP_REFERER']?>">Назад</a>
    </div>
  </body>
</html>
