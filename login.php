<?php
include 'config/config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "select * from users where id='$username' AND password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0)
{
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:admin/index.php");
}
else
{
    header("location:index.php?pesan=gagal");
}
?>