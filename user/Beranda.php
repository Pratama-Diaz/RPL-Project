<?php
require_once('../base.php');
require_once (BASE_PATH . '/function.php');

// $kosts = getAllKost();
// // var_dump($kosts);
// // die;

if (isset($_POST['submit'])){
    $kosts = getAllKostWithSeacrh($_POST['search']);
    // $kategori = $_POST['kategori'];
} else {
    $kosts = getAllKost();
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kosin.id</title>

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/landing.css' ?>">
</head>
<body>
    
  <!-- HEADER -->
  <header class="navbar">
    <div class="logo">
      <img src="<?= BASE_URL . '/assets/img/logo 2.png' ?>" alt="logo">
      <div>
        <h2>kosin.id</h2>
        <p>Cari Kost, Tinggal Nyaman</p>
      </div>
    </div>

    <nav class="menu">
      <a href="#" class="active">
        <i class="fa-solid fa-house"></i>
        <span>Beranda</span>
      </a>

      <a href="<?= BASE_URL . '/user/cariKost.php' ?>">
        <i class="fa-solid fa-magnifying-glass"></i>
        <span>Cari Kost</span>
      </a>

      <a href="#">
        <i class="fa-solid fa-clipboard-list"></i>
        <span>Pesanan</span>
      </a>
    </nav>

    <a href="<?= BASE_URL . '/user/profile.php' ?>">
    <div class="topbar-right">
      <img src="<?= BASE_URL . '/assets/img/profile.png' ?>"
          alt="profile">
    </div>
    </a>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-text">
      <h1>Temukan Kost Nyaman <br> di Sekitar UTM Madura</h1>
      <p>
        Cari kost terbaik, dekat kampus, harga <br>
        terjangkau dan fasilitas lengkap.
      </p>

      <div class="search-box">
        <i class="fa-solid fa-magnifying-glass"></i>
        <form method="post">
            <input type="text" placeholder="Cari kost..." name="search">
            <button type="submit" name="submit">Cari</button> 
        </form>
      </div>
    </div>

    <div class="hero-image">
      <img src="<?= BASE_URL . '/assets/img/kota.png' ?>" alt="city">
    </div>
  </section>

  <!-- FEATURES -->
  <section class="features">
    <div class="feature-item">
      <i class="fa-solid fa-cart-shopping"></i>
      <div>
        <h4>100+</h4>
        <p>Kost Terverifikasi</p>
      </div>
    </div>

    <div class="feature-item">
      <i class="fa-solid fa-location-dot"></i>
      <div>
        <h4>Lokasi Strategis</h4>
        <p>Dekat Kampus</p>
      </div>
    </div>

    <div class="feature-item">
      <i class="fa-solid fa-wallet"></i>
      <div>
        <h4>Harga Terjangkau</h4>
        <p>Sesuai Budget</p>
      </div>
    </div>

    <div class="feature-item">
      <i class="fa-solid fa-gift"></i>
      <div>
        <h4>Fasilitas Lengkap</h4>
        <p>Kenyamanan Terjamin</p>
      </div>
    </div>
  </section>

  <!-- REKOMENDASI -->
  <section class="recommendation">

    <div class="section-title">
      <h2>Rekomendasi Kost</h2>
      <a href="#">Lihat Semua ></a>
    </div>

    <div class="card-container">
    <?php foreach($kosts as $kost): ?>
      <!-- CARD 1 -->
      <div class="card">
        <div class="card-image">
          <img src="<?= BASE_URL . '/assets/img/' . $kost['gambar_kost'] ?>" alt="kost">
        </div>

        <div class="card-content">
          <h3><?= $kost['nama_kost'] ?></h3>

          <p class="location">
            <i class="fa-solid fa-location-dot"></i>
            <?= $kost['alamat_kost'] ?>
          </p>

          <h4><?= $kost['harga'] ?> <span>/ bulan</span></h4>

          <div class="facility">
            <span><i class="fa-solid fa-wifi"></i> Wi-fi</span>
            <span><i class="fa-solid fa-snowflake"></i> AC</span>
          </div>

          <div class="card-footer">
            <span><i class="fa-solid fa-star"></i> 4.6 (24)</span>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </section>
</body>
</html>