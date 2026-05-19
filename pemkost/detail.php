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
  <title>Detail Kost</title>
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/detail.css' ?>">
</head>
<body>

<div class="container">

    <!-- Header -->
    <div class="header">
        <a href="#"><i class="fa-solid fa-arrow-left"></i></a>
        <h2>Detail Kost</h2>
    </div>

    <!-- Gallery -->
    <div class="gallery">
        <div class="main-image">
            <img src="https://images.unsplash.com/photo-1484154218962-a197022b5858" alt="">
        </div>

        <div class="side-images">
            <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688" alt="">
            <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85" alt="">
        </div>
    </div>

    <!-- Detail -->
    <div class="detail-top">
        <div>
            <h1>Kost Putri UTM 1</h1>
            <p><i class="fa-solid fa-location-dot"></i> Jl. Raya Telang, Kamal, Bangkalan</p>
            <span>450 m dari UTM Madura</span>
        </div>

        <div class="price">
            Rp 1.200.000
            <span>/ bulan</span>
        </div>
    </div>

    <!-- Badge -->
    <div class="badges">
        <span><i class="fa-solid fa-wifi"></i> Wi-Fi</span>
        <span><i class="fa-regular fa-snowflake"></i> AC</span>
        <span><i class="fa-solid fa-bath"></i> Kamar Mandi dalam</span>
    </div>

    <!-- Rating -->
    <div class="rating">
        ⭐ 4.6 <span>(24 review)</span>
    </div>

    <hr>

    <!-- Deskripsi -->
    <section>
        <h3>Deskripsi</h3>
        <p class="desc">
            Kost nyaman dan bersih khusus putri, lingkungan aman,
            dekat kampus dan fasilitas lengkap
        </p>
    </section>

    <hr>

    <!-- Fasilitas -->
    <section>
        <h3>Fasilitas</h3>

        <div class="facility-list">
            <div><i class="fa-solid fa-wifi"></i> Wi-Fi</div>
            <div><i class="fa-solid fa-utensils"></i> Dapur Bersama</div>
            <div><i class="fa-regular fa-snowflake"></i> AC</div>
            <div><i class="fa-solid fa-square-parking"></i> Parkir</div>
            <div><i class="fa-solid fa-bath"></i> Kamar mandi dalam</div>
            <div><i class="fa-solid fa-shield-halved"></i> Keamanan 24 jam</div>
        </div>
    </section>

    <button class="edit-btn" type="button" onclick="window.location.href='editData.html'">
        Edit
    </button>

</div>

</body>
</html>