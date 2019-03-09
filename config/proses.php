<?php
session_start();
include_once 'class.php';

// instance objek db dan user
$user = new User();
$db = new Database();
$berita= new berita();
// koneksi ke MySQL via method
$db->connectMySQL();



$page = $_GET['page'];
// ############################################ MODULE USER ############################################################
// ## USER-LOGIN
if($page == "login"){

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $login=$user->cek_login($_POST['username'], $_POST['password']);
  if($login) {
    // login sukses, arahkan ke file master.php
    header("location:../users");
  }
  else {
  // login gagal, beri peringatan dan kembali ke file index.php
header("location:../login_error.php"); 
  }
}
}

// ## USER-INPUT
elseif($page == "input-user"){
$password=md5($_POST['pwd']);
$user->input_user($_POST['nama_users'],$_POST['username'],$password,$_POST['level']);
 	header("location:../users");
}

// ## USER-UPDATE
elseif($page == "update-user"){
$password=md5($_POST['pwd']);
$user->update_user($_POST['id_users'],$_POST['nama_users'],$_POST['username'],$password,$_POST['level']);
 	header("location:../users");
}


// ## USER-DELETE
elseif($page == "hapus-user"){
$user->hapus_user($_GET['id']);
 	header("location:../users");
}
// ############################################ END MODULE USER ############################################################

// ############################################ MODULE BERITA ################################################################

// ## BERITA-INPUT
elseif($page == "input-berita"){
  
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

 
$berita->UploadProduk($nama_file_unik);
$tanggal= $db->tanggal_sekarang();
$berita->input_berita($_POST['judul_berita'],$_POST['isi_berita'],$nama_file_unik,$tanggal,$_POST['publish']);
 	header("location:../berita");
}

// ## BERITA-UPDATE
elseif($page == "update-berita"){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file;

if (!empty($lokasi_file)){
  $berita->select_foto_to_trash($_POST['id_berita']);
  $berita->UploadProduk($nama_file_unik);	
  $berita->update_berita($_POST['id_berita'],$_POST['judul_berita'],$_POST['isi_berita'],$nama_file_unik,$_POST['publish']);
} else {
  $berita->update_berita_noupdatephoto($_POST['id_berita'],$_POST['judul_berita'],$_POST['isi_berita'],$_POST['publish']);
}
 	header("location:../berita");
}

// ## BERITA-DELETE
elseif($page == "delete-berita"){
$berita->select_foto_to_trash($_GET['id']);
$berita->delete_berita($_GET['id']);
 	header("location:../berita");
}
// ############################################ END MODULE BERITA ############################################################
?>