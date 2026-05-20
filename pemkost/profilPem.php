<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}
require_once('../base.php');
require_once (BASE_PATH . '/function.php');

$data = dataPemkost($_SESSION['id_pemkost']);

$foto = !empty($data['gambar_pemkost'])
    ? BASE_URL . '/uploads/' . $data['gambar_pemkost']
    : BASE_URL . '/assets/img/download.png';

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil</title>

  <!-- Font Awesome ICON -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/profilPem.css' ?>">
</head>
<body>

<div class="container">

  <!-- Sidebar -->
  <aside class="sidebar">
     <div class="logo">
       <img src="<?= BASE_URL . '/assets/img/logo 2.png' ?>" alt="logo">
        <div>
            <h1>kosin.id</h1>
            <p>Cari Kost, Tinggal Nyaman</p>
        </div>
      </div>
    
    <ul class="menu">
        <li class="#">
          <a href="<?= BASE_URL . '/pemkost/dataKost.php' ?>">
            <i class="fas fa-clipboard-list"></i>
            Data Kost
          </a>
        </li>

        <li class="#">
          <a href="<?= BASE_URL . '/pemkost/dataPenyewa.php' ?>">
            <i class="fas fa-users"></i>
            Data Penyewa
          </a>
        </li>

        <li class="active">
          <a href="<?= BASE_URL . '/pemkost/profilPem.php' ?>">
            <i class="fa-solid fa-user"></i>
            Profil
          </a>
        </li>
      </ul>

    <div class="logout">
      <a href="#"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>
  </aside>

  <!-- Main -->
  <main class="main-content">
    <div class="header">
      <h1>Profil</h1> 
       <p>Lihat dan perbarui profil Anda.</p>
       </div>
       <div class="box-biodata">
         <div class="box">        
           <img src="<?= $foto ?>" class="circle" alt="">
         </div>

     <div class="biodata">
        <form action="#">
          <label>Username :</label>
        <p><?= $data['username_pemkost']; ?></p>

        <label>Email :</label>
        <p><?= $data['email_pemkost']; ?></p>

        <label>Telephone :</label>
        <p><?= $data['telepon_pemkost']; ?></p>

        <label>Gender :</label>
        <p><?= $data['gender_pemkost']; ?></p>

        <label>Password :</label>
        <p><?= $data['password_pemkost']; ?></p>
       </div>
       </div>

        <div class="btn">
            <a href="<?=BASE_URL.'/pemkost/editProfil.php'?>" class="btn edit">Edit</a>
        </div>
        </form>
            
    </div>

       
  </main>

</div>

</body>
</html>