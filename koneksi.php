<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_mahasiswa";

$koneksi = mysqli_connect('localhost', 'root', '', 'db_mahasiswa');
$con = mysqli_connect($server, $username, $password, $database);
// if(isset($con)){
//     echo"berhasil terkoneksi";
// }else{
//     echo"gagal terkoneksi";
// }
?>