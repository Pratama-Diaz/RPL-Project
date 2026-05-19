<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}
require_once('../base.php');
require_once (BASE_PATH . '/function.php');


?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data</title>

  <!-- Font Awesome ICON -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/editData.css' ?>">
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
        <li class="active">
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

        <li>
          <a href="<?= BASE_URL . '/pemkost/profil.php' ?>">
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
        <!-- Topbar -->
        <div class="topbar">
        <i class="far fa-bell"></i>
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="profile">
        </div>
        <div class="header">
        <h1>Edit</h1>
        <p>Perbarui dan kelola data kos anda di sini.</p>
        </div>

        <div class="input-container">
            <form action="<?= BASE_URL.'/pemkost/editprofil.php'?>" method="POST" enctype="multipart/form-data">
                <label for="id">Nama:</label>
                <input type="text">

                <label for="nama">Harga:</label>
                <input type="text">

                <label for="no">Lokasi:</label>
                <input type="text">

                <label for="bukti">Gambar:</label>
                <div class="bukti">
                    <img src="" alt="">
                </div>

                <div class="btn">
                    <button type="submit">Simpan</button>
                </div>
            </form>
        </div>
  </main>

</div>

</body>
</html>