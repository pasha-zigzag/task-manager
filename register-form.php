<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
  </head>

  <body>
    <div class="form-wrapper text-center">
      <form class="form-signin" action="register.php" method="POST">
        <img class="mb-4" src="assets/img/bootstrap-solid.jpg" alt="" width="90" height="90">
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
        <label for="inputName" class="sr-only">Имя</label>
        <input type="name" id="inputName" class="form-control" placeholder="Имя" autofocus name="username">
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" name="email">
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" name="password">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
        <a href="login-form.php">Войти</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
      </form>
    </div>
  </body>
</html>
