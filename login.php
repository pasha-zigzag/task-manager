<?php

//Получение данных от пользователя из $_POST
$email = $_POST['email'];
$password = $_POST['password'];

//Проверка данных
foreach($_POST as $data) {
    if (empty($data)) {
        include 'errors.php';
        exit;
    }
}

//Получение пользователя
$pdo = new PDO('mysql:host=localhost;dbname=task-manager', 'root', '');
$sql = 'SELECT email, password FROM users WHERE email=:email';
$stmt = $pdo->prepare($sql);
$stmt->execute([':email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if($user) {
    if($user['password'] === md5($password)) {
        session_start();
        $_SESSION['email'] = $email;
        header('Location: index.php');
    } else {
        $errorMessage = 'Неверный e-mail или пароль!';
        include 'errors.php';
        exit;
    }
}

//Нет совпадения
$errorMessage = 'Неверный e-mail или пароль!';
include 'errors.php';
exit;