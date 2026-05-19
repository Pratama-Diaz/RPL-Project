<?php
require_once ('base.php');
require_once (BASE_PATH . '/conn.php');

// require_once (BASE_PATH . '/validate.php');

function getAllKost(){
    global $DBH;
  $stmt = $DBH->prepare("SELECT * FROM data_kost");
  $stmt->execute();
  $kost = $stmt->fetchAll();
  return $kost;
}

function getAllKostWithSeacrh($name){
  global $DBH;
  $stmt = $DBH->prepare("SELECT * FROM data_kost WHERE nama_kost LIKE :name");
  $stmt->execute([':name' => $name . '%']);
  $kost = $stmt->fetchAll();
  return $kost;
}

// login logic
function getUsername($data){
  global $DBH;
  
  // Cek user
  $stmnt1 = $DBH->prepare("SELECT *, 'user' AS `role` FROM user WHERE username_user = :username");
  $stmnt1->execute([':username' => $data]);
  $user = $stmnt1->fetch(PDO::FETCH_ASSOC);
  if ($user) return $user;

  // Cek admin
  $stmnt2 = $DBH->prepare("SELECT *, 'admin' AS `role` FROM admin WHERE username_admin = :username");
  $stmnt2->execute([':username' => $data]);
  $admin = $stmnt2->fetch(PDO::FETCH_ASSOC);
  if ($admin) return $admin;

  // Cek role baru, misal pemkost
  $stmnt3 = $DBH->prepare("SELECT *, 'pemkost' AS `role` FROM pemkost WHERE username_pemkost = :username");
  $stmnt3->execute([':username' => $data]);
  $pemkost = $stmnt3->fetch(PDO::FETCH_ASSOC);
  if ($pemkost) return $pemkost;

  return false; // tidak ditemukan di semua tabel
}

function insertUser($data){
    global $DBH;
    $stmt = $DBH->prepare("
        INSERT INTO user (username_user, password_user, email_user, telepon_user, gender_user)
        VALUES (:username_user, :password_user, :email_user, :telepon_user, :gender_user)
    ");

    $stmt->execute([
        ':username_user' => $data['username'],
        ':password_user' => $data['password'],
        ':email_user'    => $data['email'],
        ':telepon_user'         => $data['telepon'],
        ':gender_user'      => $data['gender'],
    ]);
}

// untuk profile
function dataUser($id_user){
  global $DBH;
  $stmnt = $DBH->prepare("SELECT * FROM user WHERE id_user = :id_user");
  $stmnt->execute([':id_user' => $id_user]);
  $user = $stmnt->fetch(PDO::FETCH_ASSOC);
  return $user;
}

// untuk pemkost
function dataPemkost($id_pemkost){
  global $DBH;
  $stmnt = $DBH->prepare("SELECT * FROM pemkost WHERE id_pemkost = :id_pemkost");
  $stmnt->execute([':id_pemkost' => $id_pemkost]);
  $pemkost = $stmnt->fetch(PDO::FETCH_ASSOC);
  return $pemkost;
}

?>