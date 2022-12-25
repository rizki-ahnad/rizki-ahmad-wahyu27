<?php
    session_start();
    if (($_SESSION['level']=="")){
        header("Location:index.php?pesan=gagal");
    }
?>
<?php
date_default_timezone_set('Asia/Jakarta');
include "koneksi.php";
$id = $_SESSION['id_user'];
$result = mysqli_query($con,"SELECT * FROM user WHERE id_user='$id'");
$user = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)===1){
  $nama = $user['nama'];
  $email = $user['email'];
}
$data_mhs = mysqli_query($con,"SELECT * FROM hasil_seleksi");
// $mhs = mysqli_($data_mhs);
$banyak_mhs = mysqli_num_rows($data_mhs);

$data_bayar = mysqli_query($con,"SELECT * FROM kode_akses");
while($data_saldo = mysqli_fetch_array($data_bayar)){
  $jumlah[] = $data_saldo['bayar_daftar'];
}
$jumlah_uang = array_sum($jumlah);
?>
<?php
$sql_lap = mysqli_query($con,"SELECT * FROM pendaftaran WHERE id_pengguna='$id'");
$query_lap = mysqli_fetch_assoc($sql_lap);
if(mysqli_num_rows($sql_lap)===1){
    
  $nisn = $query_lap['nisn'];
  $jk = $query_lap['jk'];
  $alamat = $query_lap['alamat'];
  $poto = $query_lap['poto_2'];
}
$sql_kartu = mysqli_query($con,"SELECT * FROM pendaftaran WHERE id_pengguna='$id'");
$query_kartu = mysqli_fetch_assoc($sql_kartu);
if(mysqli_num_rows($sql_kartu)===1){
    
  $tanggal = $query_kartu['tanggal'];
}
$sql_hasil = mysqli_query($con,"SELECT * FROM hasil_seleksi WHERE id_pengguna='$id'");
$queury_hasil = mysqli_fetch_assoc($sql_hasil);
$status1 = "Lulus";
if(mysqli_num_rows($sql_hasil)===1){
    $status = $queury_hasil['status'];
    if($status1 != $status){
        header("Location:kartu.php?pesan=kamu%tidak%memperoleh%kartu%cek%hasil%seleksi%kamu%di%halaman%home");
    }
    
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Cetak</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            align-items: center;
            font-size: 11px;
            font-weight: 100;
        }
        .judul{
            font-size: 20px;
            font-weight: 100;
        }
        .bg-kartu{
            background-image: url('gambar/kartu.jpg');
        }
    </style>
</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-sm-6 col-sm-3">
                    <div class="d-flex justify-content-center">
                        <div class="bg-kartu rounded mt-5" style="width:323px; height: 228px;">
                            <div class="p-3 d-flex mt-5">
                                <table>
                                    <tr>
                                        <td class="align-text-top" style="width:80px;">NISN</td>
                                        <td class="align-text-top" style="width:20px;"> :</td>
                                        <td style="width:150px;"> <?= $nisn; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="align-text-top" style="width:80px;">Nama</td>
                                        <td class="align-text-top" style="width:20px;"> :</td>
                                        <td style="width:150px;"> <?= $nama; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="align-text-top" style="width:80px;">Jenis Kelamin</td>
                                        <td class="align-text-top" style="width:20px;"> :</td>
                                        <td style="width:150px;"> <?= $jk; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="align-text-top" style="width:80px;">Alamat</td>
                                        <td class="align-text-top" style="width:20px;"> :</td>
                                        <td style="width:150px;"> <?= $alamat; ?></td>
                                    </tr>
                                </table>
                                <div class="p-2 mt-3">
                                    <img src="file/<?= $poto; ?>" alt="profile" style="width:60px; height:72px;">
                                    <center><?= $tanggal; ?></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.print();
        </script>
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

        <script src="js/sidebars.js"></script>
            
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

        <script src="js/sidebars.js"></script>
    </body>
</html>
