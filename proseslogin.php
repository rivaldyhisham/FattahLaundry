<?php
session_start();
include 'koneksi.php';
// $konek="root";
// function antiinjection($data){
// 	$konek="root";
//   $filter_sql = mysqli_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
//   return $filter_sql;
// }
// $konek = mysqli_connect($server,$konek,$password) or die (mysql_error());
$user = $_POST['username'];
$pass     = md5($_POST['password']);
echo $user;
echo $pass;
$cekuser = mysqli_query($konek, "SELECT * FROM pengguna WHERE username = '$user'");
$jumlah = mysqli_num_rows($cekuser);
$hasil = mysqli_fetch_array($cekuser);
if ( $jumlah == 0 ) {
//header('location:login.php?userfail');
} else {
    if ( $pass <> $hasil['password'] ) {
//header('location:login.php?passwordfail');
    } else {
        $_SESSION['username'] = $user;
        header('location:index.php');
    }
}
?>