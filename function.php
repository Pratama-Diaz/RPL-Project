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

// Untuk mengedit biodata pemkost di edit profile pemkost
function updatePemkost(int $id, array $data) {
	$stmnt = DBH->prepare('UPDATE pemkost SET Username_Pemkost = :username_pemkost, Email_Pemkost = :email_pemkost, Telepon_Pemkost = :telepon_pemkost,Gender_Pemkost = :gender_pemkost,Password_Pemkost = :password_pemkostWHERE id_pemkost = :id_user');
	$stmnt->execute([
		':username_pemkost' => $data['username'],
		':email_pemkost' => $data['email'],
    ':telepon_pemkost' => $data['no'],
    ':gender_pemkost' => $data['gender'],
    ':password_pemkost' => $data['pass'],
		':id_user'=>$id,
	]);
}

//untuk mengupdate foto profile pemkost
function updateProfile(int $id){
	#menghapus foto sebelumnya
	$profil = DBH->prepare('SELECT Profil FROM pemkost WHERE id_pemkost = :id');
	$profil->execute([
		':id' => $id
	]);
	$user = $profil->fetch();
	if(!empty($user['gambar_pemkost']) && file_exists(BASE_PATH."/assets/img/".$user['gambar_pemkost'])){
		unlink(BASE_PATH."/assets/img/".$user['gambar_pemkost']);
	}


	#menambahkan foto baru
	$namaFile = time() . "_" . $_FILES['profil']['name'];
	$tmpFile = $_FILES['profil']['tmp_name'];
	$_SESSION['foto_profile'] = $namaFile;

	move_uploaded_file($tmpFile, BASE_PATH."/assets/img/" . $namaFile);
	$query = DBH->prepare("UPDATE pemkost SET Profil = :profil WHERE id_pemkost = :id");
	$query->execute([
		':profil' => $namaFile,
		':id' => $id
	]);
}

function getAllDataKost(){
    global $DBH;
    $stmt = $DBH->prepare("SELECT * FROM tambah_dataKost");
    $stmt->execute();
    $kost = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $kost;
}

// Dipakai di tambah data untuk menambah data kost baru
function addDataKost(array $data){
  global $DBH;
  $stmt = $DBH->prepare("
    INSERT INTO tambah_dataKost(nama_kost, harga, periode, lokasi, fasilitas, gambar_kost)VALUE(:Nama_Kost, :Harga, :Periode, :Lokasi, :Fasilitas, :Gambar_Kost)");
    $namaFile = time() . "_" . $_FILES['gambar_kost']['name'];
    $tmpFile = $_FILES['gambar_kost']['tmp_name'];
    $fasilitas = isset($data['fasilitas'])
      ? implode(', ', $data['fasilitas'])
      : '';

    $stmt->execute([
      ':Nama_Kost' => $data['namaKost'],
      ':Harga' => $data['harga'],
      ':Periode' => $data['periode'],
      ':Lokasi' => $data['lokasi'],
      ':Fasilitas' => $fasilitas,
      ':Gambar_Kost' => $namaFile,
    ]);
    move_uploaded_file(
        $tmpFile,BASE_PATH . "/assets/img/" . $namaFile
    );
}

// Dipakai untuk menghapus data kost
function deleteKost(int $id){
	global $DBH;
	$gambar = $DBH->prepare('SELECT gambar_kost FROM tambah_dataKost WHERE id_kost = :id');
	$gambar->execute([
    ':id' => $id
	]);
	$kost = $gambar->fetch(PDO::FETCH_ASSOC);
	if(!empty($kost['gambar_kost'])){
		unlink(BASE_PATH."/assets/img/".$kost['gambar_kost']);
	}
	$stmnt = $DBH->prepare('DELETE FROM tambah_dataKost WHERE id_kost = :id');
	$stmnt->execute([
		':id' => $id
	]);
}

// untuk mengedit data kost
function editDataKost(int $id, array $data) {
	$stmnt = DBH->prepare("UPDATE tambah_dataKost  SET Nama_Kost = :nama_kost, Harga = :harga, Periode = :periode, Lokasi = :lokasi, Fasilitas = :fasilitas WHERE ID_Kost = :id_kost");
	$stmnt->execute([
		':Nama_Kost' => $data['nama_kost'],
		':Harga' => $data['harga'],
    ':Periode' => $data['periode'],
    ':Lokasi' => $data['lokasi'],
		':Fasilitas' => $data['fasilitas'],
		':id_Kost' => $id,
	]);
}

// untuk mengubah gambar kost
function editGambar(int $id){
	#menghapus foto sebelumnya
	$gambar = DBH->prepare('SELECT gambar_kost FROM buku WHERE id_kost = :id');
	$gambar->execute([
		':id' => $id
	]);
	$kost = $gambar->fetch();
	unlink(BASE_PATH."/assets/img/".$kost['gambar_kost']);

	#menambahkan foto baru
	$namaFile = time() . "_" . $_FILES['gambar_kost']['name'];
	$tmpFile = $_FILES['gambar_kost']['tmp_name'];

	move_uploaded_file($tmpFile, BASE_PATH."/assets/img/" . $namaFile);
	$query = DBH->prepare("UPDATE tambah_datakost SET Gambar_Kost = :gambar_kost WHERE id_kost = :id");
	$query->execute([
		':gambar_kost' => $namaFile,
		':id' => $id
	]);
}

?>