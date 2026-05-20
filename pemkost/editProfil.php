<?php 
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require_once('../base.php');
    require_once (BASE_PATH . '/function.php');
    require_once (BASE_PATH . '/validasi.php');

    $idPemkost = $_SESSION['id_pemkost'];
    $dataPemkost = dataPemkost($idPemkost);
    $error_username = $error_email = $error_no = $error_gender = $error_pass = $error_profil ='';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username']?? '';
        $email = $_POST['email'] ?? '';
        $no = $_POST['no'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $pass = $_POST['pass'] ?? '';
        $btn = $_POST['btn'] ?? '';
        

        if ($btn == 'simpan') {
            $succses = TRUE;
            
           if(!validasiGambar($_FILES['profil'])){
                $error_profil ="Tipe file tidak valid!";
                $succses = FALSE;
            }
            
            if(!wajib_isi($username)){
                $error_username = 'Username wajib di isi';
                $succses = FALSE;
            }elseif(!Alfabet($username)){
                $error_username = 'username hanya alfabet';
                $succses = FALSE;
                $username = '';
            }
            
            //validasi email
            if(!wajib_isi($email)){
                $error_email = 'Email wajib di isi';
                $succses = FALSE;
            }elseif(!Email($email)){
                $error_email = 'Masukkan format email dengan benar';
                $succses = FALSE;
                $email = '';
            }
            
            // validasi telephone
            if(!wajib_isi($no)){
                $error_no = 'no wajib di isi';
                $succses = FALSE;
            }elseif(!maxtlp($no)){
                $error_no = 'no minimal 12 angka';
                $succses = FALSE;
                $no = '';
            }

            //validasi password
             if(!wajib_isi($pass)){
                $error_pass = 'password wajib di isi';
                $succses = FALSE;
            }elseif(!Password($pass)){
                $error_pass = 'password minimal 8 angka';
                $succses = FALSE;
                $pass = '';
            }
            
            if($succses == TRUE){
                if (!empty($_FILES['profil']['name'])) {
                    updateProfile($idPemkost);
                }
                updatePemkost($idPemkost, $_POST);
                header('location:'.BASE_URL.'/pemkost/profilePem.php');
            }
        }elseif ($btn == 'batal') {
            header('location:'.BASE_URL.'/pemkost/profilePem.php');
        }
    };

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data</title>

  <!-- Font Awesome ICON -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/editProfil.css' ?>">
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

        <li class="#">
         <a href="<?= BASE_URL . '/pemkost/dataPenyewa.php' ?>">
            <i class="fas fa-users"></i>
            Data Penyewa
          </a>
        </li>

        <li class="active">
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
            <h1>Edit Profil</h1>
            <p>Perbarui profil Anda di sini.</p>
        </div>

        <div class="input-container">
            <form action="<?= BASE_URL.'/pemkost/editProfil.php'?>" method="POST" enctype="multipart/form-data">

                <label>Photo Profil:</label>
                <input type="file" name="profil" value="<?= $dataPemkost['gambar_pemkost']; ?>">
                <p class="error"><?= $error_profil?></p>

                <label>Username:</label>
                <input type="text" name="username" value="<?= $dataPemkost['username_pemkost']; ?>">
                <p class="error"><?= $error_username?></p>

                <label>Email:</label>
                <input type="email" name="email" value="<?= $dataPemkost['email_pemkost']; ?>">
                <p class="error"><?= $error_email?></p>

                <label>No. Telephone:</label>
               <input type="text" name="no" value="<?= $dataPemkost['telepon_pemkost']; ?>">
                <p class="error"><?= $error_no?></p>

               <label>Gender:</label>
                    <select name="gender">
                        <option value="pilih">-----Pilih-----</option>

                        <option value="perempuan"
                        <?= ($dataPemkost['gender_pemkost'] == 'perempuan') ? 'selected' : ''; ?>>
                        Perempuan
                        </option>

                        <option value="laki"
                        <?= ($dataPemkost['gender_pemkost'] == 'laki') ? 'selected' : ''; ?>>
                        Laki-Laki
                        </option>
                    </select>

                    <p class="error"><?= $error_gender ?></p>

                <label>Password:</label>
                <input type="password" name="pass" value="<?= $dataPemkost['password_pemkost']; ?>">
                <p class="error"><?= $error_pass?></p>
            

                <div class="btn">
                    <button type="submit" name="btn" value="simpan">Simpan</button>
                    <button type="submit" name="btn" value="batal">Batal</button>
                </div>
            </form>
        </div>
  </main>

</div>

</body>
</html>