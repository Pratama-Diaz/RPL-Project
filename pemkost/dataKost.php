<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}
require_once('../base.php');
require_once (BASE_PATH . '/function.php');

$dataKost = getAllDataKost();


?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Kost</title>

  <!-- Font Awesome ICON -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/dataKost.css' ?>">
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

  <!-- Header -->
  <div class="header">
    <h1>Data Kost</h1>
    <p>Kelola dan pantau seluruh aset kost Anda dengan mudah.</p>
  </div>
  <!-- Cards -->
  <div class="card-container">
    <?php foreach($dataKost as $kost): ?>
      <div class="kost-card">
        <img src="<?= BASE_URL . '/assets/img/' . $kost['gambar_kost']; ?>" alt="">

        <div class="card-body">
          <h3><?= $kost['nama_kost']; ?></h3>
            <p>
              <i class="fas fa-map-marker-alt"></i> <?= $kost['lokasi']; ?>
            </p>
          <h4>Rp <?= number_format($kost['harga']); ?>
            <span>/ <?= $kost['periode']; ?></span>
          </h4>  
          <div class="facility">
            <?php
              $fasilitas = !empty($kost['fasilitas'])
              ? explode(',', $kost['fasilitas']): [];
              foreach($fasilitas as $item):
            ?>
            <span><?= trim($item); ?></span>
            <?php endforeach; ?>
            <div class="btn-kost">
              <a href="<?=BASE_URL.'/pemkost/deleteData.php'?>?id_kost=<?= $kost['id_kost']?>" class="btn-hapus">Hapus</a>
              <a href="<?=BASE_URL.'/pemkost/editData.php'?>?id_kost=<?= $kost['id_kost']?>" class="btn-edit">Edit</a>
            </div>
          </div>
        </div>

      </div>
    <?php endforeach; ?>
  </div>
    <!-- Floating Button -->
    <button class="add-btn"onclick="window.location.href='tambahData.php'">
      <i class="fas fa-plus"></i>
    </button>

  </main>

</div>

</body>
</html>