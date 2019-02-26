<?php
//Получение данных от пользователя из $_POST
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

//Проверка данных
foreach($_POST as $data) {
    if (empty($data)) {
        include 'errors.php';
        exit;
    }
}

//Проверка на существующего пользователя
$pdo = new PDO('mysql:host=localhost;dbname=task-manager', 'root', '');
$sql = 'SELECT id FROM users WHERE email=:email';
$stmt = $pdo->prepare($sql);
$stmt->execute([':email' => $email]);
$user = $stmt->fetchColumn();
if($user) {
    $errorMessage = 'Пользователь с таким e-mail уже существует!';
    include 'errors.php';
    exit;
}

//Хеширование пароля
$password = md5($password);

//Запрос на сохранение данных в базу
$sql = 'INSERT INTO users (username, email, password) VALUES (:username, :email, :password)';
$stmt = $pdo->prepare($sql);
$result = $stmt->execute([':username' => $username, ':email' => $email, ':password' => $password]);
if(!$result) {
    $errorMessage = 'Ошибка регистрации!';
    include 'errors.php';
    exit;
}

//Редирект на авторизацию
header('Location: login-form.php');
exit;