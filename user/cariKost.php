<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}
require_once('../base.php');
require_once (BASE_PATH . '/function.php');

$kosts = getAllKost();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Cari Kost</title>

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/cariKost.css' ?>">
</head>
<body>

  <div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">

      <div class="logo">
        <img src="<?= BASE_URL . '/assets/img/logo 2.png' ?>" alt="logo">
        <div>
          <h2>kosin.id</h2>
          <p>Cari Kost, Tinggal Nyaman</p>
        </div>
      </div>

      <ul class="menu">

        <li>
          <a href="<?= BASE_URL . '/user/Beranda.php' ?>">
            <i class="fa-solid fa-house"></i>
            Beranda
          </a>
        </li>

        <li class="active">
          <a href="#">
            <i class="fa-solid fa-magnifying-glass"></i>
            Cari Kost
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fa-solid fa-clipboard-list"></i>
            Pesanan
          </a>
        </li>

        <li>
          <a href="<?= BASE_URL . '/user/profile.php' ?>">
            <i class="fa-solid fa-user"></i>
            Profil
          </a>
        </li>

      </ul>

      <div class="logout">
        <a href="#">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          Keluar
        </a>
      </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">

      <!-- TOPBAR -->
      <div class="topbar">

        <div class="search-box">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Cari Lokasi, nama kost, atau fasilitas...">
        </div>


      </div>

      <!-- TITLE -->
      <div class="title">
        <h1>Cari Kost</h1>
        <p>Temukan kost terbaik sesuai kebutuhan dan budgetmu</p>
      </div>

      <!-- FILTER -->
      <div class="filter-container">

        <div class="filter-box">
          <label>Lokasi</label>

          <div class="filter-select">
            <span>UTM Madura, Bangkalan</span>
            <i class="fa-solid fa-chevron-down"></i>
          </div>
        </div>

        <div class="filter-box">
          <label>Tipe Kost</label>

          <div class="filter-select">
            <span>Semua Tipe</span>
            <i class="fa-solid fa-chevron-down"></i>
          </div>
        </div>

        <div class="filter-box">
          <label>Harga</label>

          <div class="filter-select">
            <span>Rp 0 - Rp 2.500.000+</span>
            <i class="fa-solid fa-chevron-down"></i>
          </div>
        </div>

        <div class="filter-box">
          <label>Harga</label>

          <div class="filter-select">
            <span>Semua Fasilitas</span>
            <i class="fa-solid fa-chevron-down"></i>
          </div>
        </div>

      </div>

      <!-- CARD 1 -->
    <?php foreach($kosts as $kost): ?>
      <div class="kost-card">

        <img src="<?= BASE_URL . '/assets/img/' . $kost['gambar_kost'] ?>"
        alt="kost">

        <div class="card-content">

          <h2><?= $kost['nama_kost'] ?></h2>

          <p class="location">
            <i class="fa-solid fa-location-dot"></i>
            <?= $kost['alamat_kost'] ?>
          </p>

          <!-- <div class="facility">

            <span><i class="fa-solid fa-wifi"></i> Wi-Fi</span>
            <span><i class="fa-solid fa-snowflake"></i> AC</span>
            <span><i class="fa-solid fa-kitchen-set"></i> Dapur Bersama</span>
            <span><i class="fa-solid fa-bath"></i> Kamar Mandi dalam</span>

          </div> -->

          <!-- <div class="rating">
            <i class="fa-solid fa-star"></i>
            4.6 <span>(24)</span>
          </div> -->

        </div>

        <div class="price-section">

          <div class="price">
            <h3><?= $kost['harga'] ?></h3>
            <p>/ bulan</p>
          </div>

        </div>

      </div>
      <?php endforeach; ?>


      <!-- PAGINATION -->
      <div class="pagination">

        <button><i class="fa-solid fa-chevron-left"></i></button>
        <button class="active-page">1</button>
        <button>2</button>
        <button>3</button>
        <button>...</button>
        <button><i class="fa-solid fa-chevron-right"></i></button>

      </div>

    </main>

  </div>

</body>
</html>