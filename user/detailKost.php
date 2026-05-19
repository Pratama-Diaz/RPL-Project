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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Detail Kost</title>

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/detailKost.css' ?>">
</head>

<body>

<div class="container">

  <!-- SIDEBAR -->
  <aside class="sidebar">

    <div class="logo">
      <img src="Media/logo 2.png" alt="logo">

      <div>
        <h2>kosin.id</h2>
        <p>Cari Kost, Tinggal Nyaman</p>
      </div>
    </div>

    <ul class="menu">

      <li>
        <a href="#">
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
          <i class="fa-solid fa-heart"></i>
          Favorit
        </a>
      </li>

      <li>
        <a href="#">
          <i class="fa-solid fa-clipboard-list"></i>
          Pesanan
        </a>
      </li>

      <li>
        <a href="#">
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

    <!-- HEADER -->
    <div class="detail-header">

      <div class="back">
        <i class="fa-solid fa-arrow-left"></i>
        <h2>Detail Kost</h2>
      </div>

    </div>

    <!-- CARD DETAIL -->
    <div class="detail-card">

      <!-- IMAGE -->
      <div class="gallery">

        <div class="main-image">
          <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1200&auto=format&fit=crop" alt="">
        </div>

        <div class="side-images">

          <img src="https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=1200&auto=format&fit=crop" alt="">

          <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1200&auto=format&fit=crop" alt="">

        </div>

      </div>

      <!-- INFO -->
      <div class="kost-info">

        <div class="title-price">

          <div>
            <h1>Kost Putri UTM 1</h1>

            <p class="location">
              <i class="fa-solid fa-location-dot"></i>
              Jl. Raya Telang, Kamal, Bangkalan
            </p>

            <p class="distance">
              450 m dari UTM Madura
            </p>
          </div>

          <div class="price">
            <h2>Rp 1.200.000</h2>
            <span>/ bulan</span>
          </div>

        </div>

        <!-- TAG -->
        <div class="tags">

          <span><i class="fa-solid fa-wifi"></i> Wi-Fi</span>

          <span><i class="fa-solid fa-snowflake"></i> AC</span>

          <span><i class="fa-solid fa-bath"></i> Kamar Mandi Dalam</span>

        </div>

        <!-- RATING -->
        <div class="rating">

          <i class="fa-solid fa-star"></i>

          <span>4.6</span>

          <p>(24 review)</p>

        </div>

        <!-- DESKRIPSI -->
        <div class="section">

          <h3>Deskripsi</h3>

          <p>
            Kost nyaman dan bersih khusus putri,
            lingkungan aman, dekat kampus dan fasilitas lengkap.
          </p>

        </div>

        <!-- FASILITAS -->
        <div class="section">

          <h3>Fasilitas</h3>

          <div class="facility-list">

            <div class="facility-item">
              <i class="fa-solid fa-wifi"></i>
              Wi-Fi
            </div>

            <div class="facility-item">
              <i class="fa-solid fa-utensils"></i>
              Dapur Bersama
            </div>

            <div class="facility-item">
              <i class="fa-solid fa-snowflake"></i>
              AC
            </div>

            <div class="facility-item">
              <i class="fa-solid fa-square-parking"></i>
              Parkir
            </div>

            <div class="facility-item">
              <i class="fa-solid fa-bath"></i>
              Kamar Mandi Dalam
            </div>

            <div class="facility-item">
              <i class="fa-solid fa-shield-halved"></i>
              Keamanan 24 Jam
            </div>

          </div>

        </div>

        <!-- BUTTON -->
        <div class="button-group">

          <button class="btn-primary">
            Ajukan Sewa
          </button>

          <button class="btn-outline">
            Hubungi Pemilik
          </button>

        </div>

      </div>

    </div>

  </main>

</div>

</body>
</html>