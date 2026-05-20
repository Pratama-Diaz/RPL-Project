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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Data Penyewa Kost</title>

  <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/dataPenyewa.css' ?>">
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

        <li class="active">
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

    <!-- MAIN CONTENT -->
    <main class="main-content">

      <!-- CONTENT -->
      <div class="content">

        <h1>Data Penyewa Kost Anda</h1>
        <p>Daftar semua penyewa kost Anda.</p>

        <div class="table-container">

          <table>
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No.Hp</th>
                <th>Unit Kos & No. Kamar</th>
                <th>Tanggal Masuk</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1.</td>
                <td>Erika Sintiasari</td>
                <td>0871234518976</td>
                <td>Kost UTM 1 - 1A</td>
                <td>07-12-2026</td>
              </tr>

              <tr>
                <td>2.</td>
                <td>Wulandari</td>
                <td>0871234518976</td>
                <td>Kost UTM 2 - 2B</td>
                <td>07-12-2026</td>
              </tr>

              <tr>
                <td>3.</td>
                <td>Dianatrurofiah</td>
                <td>0871234518976</td>
                <td>Kost UTM 3 - 3C</td>
                <td>07-12-2026</td>
              </tr>

              <tr>
                <td colspan="5"></td>
              </tr>

              <tr>
                <td colspan="5"></td>
              </tr>

            </tbody>
          </table>

        </div>

      </div>

    </main>

  </div>

</body>
</html>