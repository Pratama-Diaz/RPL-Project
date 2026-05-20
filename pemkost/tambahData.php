<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}
require_once('../base.php');
require_once (BASE_PATH . '/function.php');
require_once (BASE_PATH . '/validasi.php');

$namaKost = $harga = $lokasi ='';
    $error_namaKost = $error_harga= $error_lokasi =$error_gambar ='';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $namaKost = $_POST['namaKost'];
        $harga = $_POST['harga'];
        $lokasi = $_POST['lokasi'];
    
        if (isset($_POST['btn'])) {
            if ($_POST['btn']=='tambah') {
                $succses = TRUE;
                if(empty($_FILES['gambar_kost']['name'])){
                    $error_gambar ='wajib di isi';
                    $succses = FALSE;
                }elseif(!validasiGambar($_FILES['gambar_kost'])){
    				$error_gambar ="Tipe file tidak valid! Hanya boleh JPG, JPEG, PNG, WEBP.";
                    $succses = FALSE;
				}
    
                if(!wajib_isi($namaKost)){
                    $error_namaKost = 'Wajib di isi';
                    $succses = FALSE;
                }elseif(!Alfanumerik($namaKost)){
                    $error_namaKost = 'Judul Tidak Valid';
                    $succses = FALSE;
                    $namaKost = '';
                }
                
                if(!wajib_isi($harga)){
                    $succses = FALSE;
                    $error_harga = "Wajib di isi";
                }elseif(!harga($harga)){
                    $error_harga = "Harga berupa numerik";
                    $succses = FALSE;
                    $harga = '';
                }

                if(!wajib_isi($lokasi)){
                    $succses = FALSE;
                    $error_lokasi = "Wajib di isi";
                }elseif(!Lokasi($lokasi)){
                    $error_lokasi = "lokasi berupa alfabet";
                    $succses = FALSE;
                    $lokasi = '';
                }
                
                
                if ($succses == TRUE) {
                    addDataKost($_POST);
                    header('location:'.BASE_URL.'/pemkost/dataKost.php');
                    exit();
                }
            }elseif ($_POST['btn'] == 'kembali') {
                header('location:'.BASE_URL.'/pemkost/dataKost.php');
                exit();
            }
            
        }
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data Kost</title>

  <!-- Font Awesome ICON -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/tambahData.css' ?>">
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

        <li class="#">
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
            <h1>Tambah Data Kost</h1>
            <p>Tambah kos baru ke sistem Anda.</p>
        </div>

        <div class="input-container">
            <form method="POST" enctype="multipart/form-data">
                <label>Nama:</label>
                <input type="text" name="namaKost" value="<?=$namaKost?>">
                <div class="error"><?=$error_namaKost?></div>

                <label>Harga:</label>
                <input type="text" name="harga" value="<?=$harga?>">
                <div class="error"><?=$error_harga?></div>

                <label>Periode:</label>
                    <select name="periode">
                        <option value="pilih">-----Pilih-----</option>
                        <option value="bulan">Bulan</option>
                        <option value="tahun">Tahun</option>
                        <option value="minggu">Minggu</option>
                    </select>

                <label>Lokasi:</label>
                <input type="text" name="lokasi" value="<?=$lokasi?>">
                <div class="error"><?=$error_lokasi?></div>

                <label>Fasilitas:</label>
                    <div class="fasilitas-box">
                        <label>
                            <input type="checkbox" name="fasilitas[]" value="WiFi">
                            WiFi
                        </label>
                        <label>
                            <input type="checkbox" name="fasilitas[]" value="AC">
                            AC
                        </label>
                        <label>
                            <input type="checkbox" name="fasilitas[]" value="Dapur">
                            Dapur Bersama
                        </label>
                        <label>
                            <input type="checkbox" name="fasilitas[]" value="Kamar Mandi Dalam">
                            Kamar Mandi Dalam
                        </label>
                        <label>
                            <input type="checkbox" name="fasilitas[]" value="Parkir">
                            Parkir
                        </label>

                    </div>

                <label>Gambar:</label>
                <input type="file" name="gambar_kost">
                <div class="error"><?=$error_gambar?></div>

                <div class="btn">
                    <button type="submit" name="btn" value="tambah">Simpan</button>
                    <button name="btn" value='kembali'>Batal</button>
                </div>
            </form>
        </div>
  </main>

</div>

</body>
</html>