<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}
require_once('../base.php');
require_once (BASE_PATH . '/function.php');

$data = dataUser($_SESSION['id_user']);
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

  <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/profile.css' ?>">
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

        <li>
          <a href="<?= BASE_URL . '/user/cariKost.php' ?>">
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

        <li class="active">
          <a href="#">
            <i class="fa-solid fa-user"></i>
            Profil
          </a>
        </li>

      </ul>

      <div class="logout">
        <a href="<?= BASE_URL . '/login/logout.php' ?>">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          Keluar
        </a>
      </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        <!-- PROFILE DATA -->
<div class="profile-section">

    <div class="profile-box">

        <h2>Data Diri</h2>

        <div class="profile-image">
            <?php if ($data['gambar_user'] !== null): ?>
                <div class="avatar"><img src="<?= BASE_URL . '/assets/img/' . $data['gambar_user'] ?>" alt="Gambar User"></div>
            <?php else: ?>
                <div class="avatar"><img src="<?= BASE_URL . '/assets/img/profil.jpg' ?>" alt="Gambar Default"></div>
            <?php endif; ?>
            
            <label for="upload" class="upload-btn">
                Choose File
            </label>
            <input type="file" id="upload">
        </div>

        <form method="post">

            <div class="input-group">
                <label>Username:</label>
                <input type="text" name="username" value="<?= $data['username_user'] ?>">
            </div>


            <div class="input-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?= $data['email_user'] ?>">
            </div>

            <div class="input-group">
                <label>No. Telephone:</label>
                <input type="text" name="telepon" value="<?= $data['telepon_user'] ?>">
            </div>

            <div class="select-group">
                <label for="gender">Gender:</label>
                <select name="gender">
                    <option value="L" <?php if($data['gender_user']=="L") echo "selected"; ?>>L</option>
                    <option value="P" <?php if($data['gender_user']=="L") echo "selected"; ?>>P</option>
                </select>
            </div>

            <!-- <div class="input-group">
                <label>Password:</label>
                <input type="password" name="password" value="<?= $data['email_user'] ?>">
            </div>   -->

            <div class="btn-group">
                <button type="submit" name="submit">Simpan</button>
            </div>
        </form>

    </div>

</div>

    </main>

  </div>

</body>
</html>