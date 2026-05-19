<?php
require_once('../base.php');
require_once(BASE_PATH . '/function.php');
if (session_status() === PHP_SESSION_NONE){
    session_start();
}
if (!isset($_SESSION['role'])){
    header('Location: ' . BASE_URL . '/login/login.php');
    exit;
}
if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'pemkost'){
    header('Location: ' . BASE_URL . '/index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemkost</title>
</head>
<body>
    <p>Berhasil user</p>
</body>
</html>