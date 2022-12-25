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
$id_lap = 7;
$sql_lap = mysqli_query($con,"SELECT * FROM laporan WHERE id_laporan='$id_lap'");
$query_lap = mysqli_fetch_assoc($sql_lap);
if(mysqli_num_rows($sql_lap)===1){
    $tgl_awal = $query_lap['tanggal_awal'];
    $tgl_akhir = $query_lap['tanggal_akhir'];
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
       table{
    border-collapse:collapse;
    font:normal normal 12px Verdana,Arial,Sans-Serif;
    color:#333333;
        }
        /* Mengatur warna latar, warna teks, ukruan font dan jenis bold (tebal) pada header tabel */
        table th {
            background:rgb(197, 195, 197);
            color:#000;
            font-weight:bold;
            font-size:12px;
        }
        /* Mengatur border dan jarak/ruang pada kolom */
        table th,
        table td {
            vertical-align:top;
            padding:5px 10px;
            border:1px solid #696969;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        /* Mengatur warna baris */
        table tr {
            background:#F5FFFA;
        }
        /* Mengatur warna baris genap (akan menghasilkan warna selang seling pada baris tabel) */
        table tr:nth-child(even) {
            background:#F0F8FF;
        }
        @media print{
            .title {
                display: none;
            }
        }
    </style>    
</head>

  <body>
    <div class="container">
            <div style="display:flex;">
                <div style="margin-left:80px; margin-top:0px;">
                    <img src="gambar/logo.png" alt="logo" class="mb-3 img-fluid">
                </div>
                <div style="width:100%;">
                <center>
                <p style="font-size:18px;"><b> DATA PEMBAYARAN DAFTAR ULANG <br>
                    AMIK PURNAMA NIAGA INDRAMAYU<br>
                    TAHUN AJARAN <?php echo date('Y')?> <br></b> </p>
                </center>
                </div>
            </div>
        </div>
        <div class="bg-secondary" style="width:100%; height:5px;"></div>
        <hr style="margin-top:2px;">
            <div style="margin-top:0px;">
            <table border="1" width="99%" style="margin-left:5px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Biaya Bangunan</th>
                            <th>Biaya Pakaian</th>
                            <th>Biaya Kemahasiswaan</th>
                            <th>Biaya Semester Awal</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Tanggal Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        //jika tanggal dari dan tanggal ke ada maka
                        error_reporting(0);
                        $cari = $_GET['cari'];
                        $dari = $tgl_awal;
                        $ke = $tgl_akhir;
                            // var_dump($cari, $dari, $ke);
                        if($ke && $dari){ 
                            // tampilkan data yang sesuai dengan range tanggal yang dicari        
                            $data = mysqli_query($con,"SELECT * FROM daftar_ulang WHERE tanggal BETWEEN '".$dari."' and '".$ke."'");
                        }
                        if($cari){
                            $data = mysqli_query($con,"SELECT * FROM daftar_ulang WHERE nama like '%".$cari."%' OR nim like '%".$cari."%' OR status like '%".$cari."%' OR tanggal like '%".$cari."%' OR semester like '%".$cari."%'");    
                        }
                        // $no digunakan sebagai penomoran 
                        $no = 1;
                        // while digunakan sebagai perulangan data 
                        while($d = mysqli_fetch_array($data)){
                            $jlh[] = $d['jlh_bayar'];
                            $jlh_bangunan[] = $d['bangunan'];
                            $jlh_pakaian[] = $d['pakaian'];
                            $jlh_kemahaiswaan[] = $d['kemahasiswaan'];
                            $jlh_semester[] = $d['biaya_semester'];
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nim']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['bangunan']; ?></td>
                            <td><?php echo $d['pakaian']; ?></td>
                            <td><?php echo $d['kemahasiswaan']; ?></td>
                            <td><?php echo $d['biaya_semester']; ?></td>
                            <td><?php echo $d['jlh_bayar']; ?></td>
                            <td><?php echo $d['status']; ?></td>
                            <td><?php echo $d['tanggal']; ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align:right;">Total Saldo:</td>
                            <td><?php $saldo1 = array_sum($jlh_bangunan); echo $saldo1; ?></td>
                            <td><?php $saldo2 = array_sum($jlh_pakaian); echo $saldo2; ?></td>
                            <td><?php $saldo3 = array_sum($jlh_kemahaiswaan); echo $saldo3; ?></td>
                            <td><?php $saldo4 = array_sum($jlh_semester); echo $saldo4; ?></td>
                            <td><?php $saldo5 = array_sum($jlh); echo $saldo5; ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <footer>
                <?php include "koneksi.php"; 
                $jabatan = "Dirut";
                $sql1 = "SELECT * FROM pegawai WHERE jabatan='$jabatan'";
                $query1 = mysqli_query($con, $sql1);
                $hasil1 = mysqli_fetch_assoc($query1);

                if ($hasil1['jabatan']==='Dirut'){
                    $nama = $hasil1['nama'];
                    $jbtn = $hasil1['jabatan'];
                }
                ?>
                <div style="display:flex;">
                    <div style="margin-top:16px; margin-left: 700px;">
                        <label>Mengetahui/Menyetujui</label><br>
                        <label>Direktur Amik Purnama Niaga Indramayu</label><br><br>
                        <div style="margin-left:-65px; position: absolute; margin-top:-80px;">
                            <img src="gambar/cap.png" alt="cap">
                        </div><br><br>
                        <label><u><?php echo $nama?></u></label><br>
                        <label><?php echo $jbtn?></label><br>
                    </div>
                </div>
                </footer>
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
