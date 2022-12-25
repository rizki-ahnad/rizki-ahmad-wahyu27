
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
  $nohp = $user['nohp'];
}

$result1 = mysqli_query($con,"SELECT * FROM pendaftaran WHERE id_pengguna='$id'");
$user1 = mysqli_fetch_assoc($result1);
if(mysqli_num_rows($result1)===1){
    $nisn = $user1['nisn'];
    $no_daftar = $user1['nomor_daftar'];
    $nama = $user1['nama'];
    $alamat = $user1['alamat'];
    $jk = $user1['jk'];
    $agama = $user1['agama'];
    $ayah = $user1['ayah'];
    $ibu = $user1['ibu'];
    $tanggal = $user1['tanggal'];
}else{
    echo "<script>alert('Kamu Belum Melakukan Pembayaran Daftar Online, Bayar sekarang!');window.location.href='halaman_mahasiswa.php'</script>";
}

$nama_jadwal = "Seleksi";
$data_jadwal = mysqli_query($con,"SELECT * FROM jadwal WHERE nama_jadwal='$nama_jadwal'");
$q_data = mysqli_fetch_assoc($data_jadwal);
if(mysqli_num_rows($data_jadwal)===1){
    $hari_a = $q_data['hari_awal'];
    $hari_k = $q_data['hari_akhir'];
    $tgl_m = $q_data['tgl_mulai'];
    $tgl_s = $q_data['tgl_selesai'];
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
    <div class="container ">
        <div class="d-flex ms-5">
            <div class="mt-2" style="width:100px; height:100px;">
                <img src="gambar/logo.png" class="img-fluid" alt="logo amik">
            </div>
            <div class="mt-2 ms-5">
                <h6>BUKTI PENDAFTARAN ONLINE CALON MAHASISWA</h6>
                <h6>TAHUN <?php echo date('Y')?></h6>
                <h6>AMIK PURNAMA NIAGA INDRAMAYU</h6>
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
    <div class="mt-3 ">
        <div class="text-end">
            <p>Indramayu, <?php echo date('d M Y')?></p>
        </div>
        <div class="mt-3" style="text-align: justify; text-justify: newspaper">
            <center><h6 class="mt-3"><u>PROFILE CALON MAHASISWA</u></h6></center>
            <div class="mt-3">
                <center>
                    <table>
                        <tr>
                            <td style="width:280px;">
                                NISN
                            </td>
                            <td style="width:20px;">
                                :
                            </td>
                            <td>
                            <?php echo $nisn ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:200px;">
                                Nomor Pendaftaran
                            </td>
                            <td style="width:20px;">
                                :
                            </td>
                            <td>
                            <?php echo $no_daftar ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:200px;">
                                Nama
                            </td>
                            <td style="width:20px;">
                                :
                            </td>
                            <td>
                            <?php echo $nama ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-text-top" style="width:80px;">
                                Email
                            </td>
                            <td class="align-text-top" style="width:20px;">
                                :
                            </td>
                            <td style="width:350px;">
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
                            <td style="width:350px;">
                            <?php echo $nohp ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-text-top" style="width:80px;">
                                Alamat
                            </td>
                            <td class="align-text-top" style="width:20px;">
                                :
                            </td>
                            <td style="width:350px;">
                            <?php echo $alamat ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-text-top" style="width:80px;">
                                Jenis Kelamin
                            </td>
                            <td class="align-text-top" style="width:20px;">
                                :
                            </td>
                            <td style="width:350px;">
                            <?php echo $jk ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-text-top" style="width:80px;">
                                Agama
                            </td>
                            <td class="align-text-top" style="width:20px;">
                                :
                            </td>
                            <td style="width:350px;">
                            <?php echo $agama ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:200px;">
                                Nama Ayah
                            </td>
                            <td style="width:20px;">
                                :
                            </td>
                            <td>
                            <?php echo $ayah ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:200px;">
                                Nama Ibu
                            </td>
                            <td style="width:20px;">
                                :
                            </td>
                            <td>
                            <?php echo $ibu ?>
                            </td>
                        </tr>
                    </table>
                </center>
            </div>
            <div class="mt-3 mb-3">
                <span>
                    Dengan ini, kami selaku panitia penerimaan calon mahasiswa baru Amik Purnama Niaga Indramayu, berterimakasih kepada <?= $nama; ?> yang telah mendaftarkan diri untuk bergabung dengan kampus kami tercinta, untuk <i>tahap selanjutnya</i> calon mahasiswa yang telah mendaftar agar mengikuti <b>seleksi online</b> yang akan di laksanakan yakni sebagai berikut:
                </span>
                <center>
                    <table class="mt-3">
                        <tr>
                            <td style="width:80px;">
                                Hari
                            </td>
                            <td style="width:20px;">
                                :
                            </td>
                            <td>
                            <?php echo $hari_a ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:80px;">
                                Tanggal
                            </td>
                            <td style="width:20px;">
                                :
                            </td>
                            <td>
                            <?php echo $tgl_m ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:80px;">
                                Pukul
                            </td>
                            <td style="width:20px;">
                                :
                            </td>
                            <td>08.30 - 10.30 WIB</td>
                        </tr>
                    </table>
                </center>
                <span>
                    <i><b>Note:</b></i>
                    Jika calon mahasiswa yang sudah mendaftar dan juga telah membayar daftar online sebesar Rp. 200.000,- dan calon mahasiswa tidak mengikuti seleksi online maka calon mahasiswa dianggap gugur/tidak diterima dan kemudian uang yang telah dibayarkan tidak bisa diambil lagi.
                </span>
            </div>
        </div>
    </div>
    <div>
    <footer class="">
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
                        <img src="gambar/cap.png" alt="cap">
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