<?php
$host = 'localhost';
$usr = 'root';
$pass = '';
$db = 'db_diskominfo';
// $host = 'localhost'; 
// $user = 'root'; 
// $password = ''; 
// $database = 'db_diskominfo'; 

$koneksi = mysqli_connect($host, $usr, $pass, $db);

// if ($koneksi) {
//     echo 'nyambung coy';
// } else {
//     echo "kagak";
// }

// Mengecek koneksi
// if(!$koneksi){
//     die("Koneksi Gagal:" . mysqli_connect_error());
// } else {
//     echo "Koneksi Berhasil";
// }
