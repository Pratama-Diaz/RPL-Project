<?php
require_once('../base.php');
require_once (BASE_PATH . '/function.php');
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <div class="card">
        <h2>Konfirmasi Logout</h2>
        <p>Apakah Anda yakin ingin Logout dari website ini?</p>
        <form method="POST">
            <div class="btn-group">
                <button class="btn-pinjam btn-delete" type="submit" name="yes">Yes</button>
                <button class="btn-pinjam" type="submit" name="no">No</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php 
if (isset($_POST['yes'])){
    session_destroy();
    header('Location: ' . BASE_URL . '/login/login.php');
    exit;
} elseif (isset($_POST['no'])) {
    if ($_SESSION['role'] === 'user'){
        header('Location: ' . BASE_URL . '/user/beranda.php');
        exit;
    }elseif ($_SESSION['role'] === 'admin'){
        header('Location: ' . BASE_URL . '/admin/admin.php');
        exit;
    }elseif ($_SESSION['role'] === 'pemkost'){
        header('Location: ' . BASE_URL . '/pemkost/pemkost.php');
        exit;
    }
}
?>