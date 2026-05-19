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

    <!-- Header -->
    <div class="header">
      <h1>Data Kost</h1>
      <p>Kelola dan pantau seluruh aset kost Anda dengan mudah.</p>
    </div>

    <!-- Cards -->
    <div class="card-container">

      <div class="kost-card">
        <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85" alt="">
        <div class="card-body">
          <h3>Kost Putri UTM 1</h3>
          <p><i class="fas fa-map-marker-alt"></i> Jl. Raya Telang, Kamal</p>
          <h4>Rp 1.200.000 <span>/ bulan</span></h4>

          <div class="facility">
            <span>📶 Wi-Fi</span>
            <span>❄ AC</span>
          </div>

          <div class="rating">
            ⭐ 4.6 (24)
            <span>450m</span>
          </div>
        </div>
      </div>

      <div class="kost-card">
        <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688" alt="">
        <div class="card-body">
          <h3>Kost Putri UTM 2</h3>
          <p><i class="fas fa-map-marker-alt"></i> Jl. Raya Telang, Kamal</p>
          <h4>Rp 1.400.000 <span>/ bulan</span></h4>

          <div class="facility">
            <span>📶 Wi-Fi</span>
            <span>❄ AC</span>
          </div>

          <div class="rating">
            ⭐ 4.6 (24)
            <span>450m</span>
          </div>
        </div>
      </div>

      <div class="kost-card">
        <img src="https://images.unsplash.com/photo-1484154218962-a197022b5858" alt="">
        <div class="card-body">
          <h3>Kost Putri UTM 3</h3>
          <p><i class="fas fa-map-marker-alt"></i> Jl. Raya Telang, Kamal</p>
          <h4>Rp 1.000.000 <span>/ bulan</span></h4>

          <div class="facility">
            <span>📶 Wi-Fi</span>
            <span>❄ AC</span>
          </div>

          <div class="rating">
            ⭐ 4.6 (24)
            <span>450m</span>
          </div>
        </div>
      </div>

    </div>

    <!-- Floating Button -->
    <button class="add-btn">
      <i class="fas fa-plus" onclick="window.location.href='tambahData.html'"></i>
    </button>

  </main>

</div>

</body>
</html>