<?php 
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require_once('../base.php');
    require_once (BASE_PATH . '/function.php');

    $id = $_GET['id_tambahData'];
    if (isset($_POST['delete'])){
        $delete = $_POST['delete'];
        if ($delete == 'hapus') {
            deleteKost($id);
            header('location:'.BASE_URL.'/pemkost/dataKost.php');
        }elseif ($delete == 'cancel') {
            header('location:'.BASE_URL.'/pemkost/dataKost.php');
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL.'/assets/css/dataKost.css'?>">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="container-validasi">
        <h1>Yakin?</h1>
        <form method="POST">
            <button name="delete" value="hapus" class="simpan">Hapus</button>
            <button name="delete" value="cancel" class="cancel">Batal</button>
        </form>
        </div>
    </main>
    
</body>
</html>