<?php
    session_start();
    if (($_SESSION['level']=="")){
        header("Location:index.php?pesan=gagal");
    }
?>
<?php
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "koneksi.php";
$id = $_SESSION['id_user'];
$result = mysqli_query($con,"SELECT * FROM user WHERE id_user='$id'");
$user = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)===1){
  $username = $user['nama'];
  $email = $user['email'];
}

$result1 = mysqli_query($con,"SELECT * FROM kode_akses WHERE id_pengguna='$id'");
$user1 = mysqli_fetch_assoc($result1);
if(mysqli_num_rows($result1)===1){
    $nama = $user1['nama'];
    $email = $user1['email'];
    $nohp = $user1['nohp'];
    $bayar = $user1['bayar_daftar'];
    $status = $user1['status'];
    $tanggal = $user1['tanggal'];
}else{
    echo "<script>alert('Kamu Belum Melakukan Pembayaran, Bayar sekarang!');window.location.href='halaman_mahasiswa.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Hasil Seleksi</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">

    

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        body{
            padding: 30px;
            font-size: 2vw;
            font-weight: 100;
            line-height:1.5;
        }
        h1, h2, h3, h4, h5, h6, {
            font-size: 3vw;
            line-height: 1.1;
        }
        p {
            font-size: 2vw;
        }
        @media (max-width: 900px;){
            body{
                font-size: 14px;
            }
        }
        @media (min-width: 600px;){
            body{
                font-size: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex">
            <div class="mt-4" style="width:100px; height:100px;">
                <img src="gambar/logo.png" alt="logo amik">
            </div>
            <div class="mt-2 ms-5">
                <h4>BUKTI PEMBAYARAN PENDAFTARAN ONLINE CALON MAHASISWA</h4>
                <h4>TAHUN <?php echo date('Y')?></h4>
                <h4>AMIK PURNAMA NIAGA INDRAMAYU</h4>
                <p>Jalan Ir. H. Djuanda No. 256 Singaraja Indramayu</p>
            </div>
        </div>
    <div class="mt3">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-sm-6 col-sm-3">
                <div class="thumbnail">
                    <div class="bg-secondary" style="width:100%; height:5px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <div class="text-end">
            <p>Indramayu, <?php echo date('d M Y')?></p>
        </div>
        
        </div>
        <div class="mt-3" style="text-align: justify; text-justify: newspaper">
        <span class="mb-5">
            Sesuai dengan kebijakan dari Direktur Utama AMIK PURNAMA NIAGA INDRAMAYU, telah menetapkan biaya pendaftaran online yakni sebesar, Rp. 200.000,- pembayaran ini ditujukan agar calon mahasiswa bisa mendapatkan kode akses untuk bisa melakukan tahap selanjutnya berikut adalah rinician bukti pembayarannya:
        </span>
            <center><h5 class="mt-3"><u>RINCIAN PEMBAYARAN</u></h5></center>
            <div class="mt-3">
                <center>
                    <table>
                        <tr>
                            <td style="width:80px;">
                                Nama
                            </td>
                            <td style="width:20px;">
                                :
                            </td>
                            <td>
                            <?php echo $username ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-text-top" style="width:80px;">
                                Email
                            </td>
                            <td class="align-text-top" style="width:20px;">
                                :
                            </td>
                            <td style="width:100px;">
                            <?php echo $email ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-text-top" style="width:80px;">
                                No HP
                            </td>
                            <td class="align-text-top" style="width:20px;">
                                :
                            </td>
                            <td style="width:100px;">
                            <?php echo $nohp ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-text-top" style="width:180px;">
                                Jumlah Pembayaran
                            </td>
                            <td class="align-text-top" style="width:20px;">
                                :
                            </td>
                            <td style="width:100px;">
                            <?php echo $bayar ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-text-top" style="width:80px;">
                                Tanggal Bayar
                            </td>
                            <td class="align-text-top" style="width:20px;">
                                :
                            </td>
                            <td style="width:100px;">
                            <?php echo $tanggal ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-text-top" style="width:80px;">
                                Status
                            </td>
                            <td class="align-text-top" style="width:20px;">
                                :
                            </td>
                            <td style="width:100px;">
                            <?php echo $status ?>
                            </td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>
    </div>
    <div>
    <footer>
        <?php include "koneksi.php"; 
            $jabatan = "Dirut";
            $sql_p = "SELECT * FROM pegawai WHERE jabatan='$jabatan'";
            $query_p = mysqli_query($con, $sql_p);
            $hasil_p = mysqli_fetch_assoc($query_p);

            if ($hasil_p['jabatan']==='Dirut'){
                $nama_p = $hasil_p['nama'];
                $jbtn = $hasil_p['jabatan'];
            }
            ?>
            <div class="mt-5">
                <div class="text-start">
                    <label>Mengetahui/Menyetujui</label><br>
                    <label>Direktur Amik Purnama Niaga Indramayu</label><br><br>
                    <div style="margin-left:-65px; position: absolute; margin-top:-80px;">
                        <img src="gambar/cap.png" class="img-fluid" alt="cap">
                    </div><br><br>
                    <label><u><?php echo $nama_p?></u></label><br>
                    <label><?php echo $jbtn?></label><br>
                </div>
            </div>
            </footer>
    </div>
    </div>
    </div>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.print();
</script>
<script src="js/sidebars.js"></script>
</body>
</html>