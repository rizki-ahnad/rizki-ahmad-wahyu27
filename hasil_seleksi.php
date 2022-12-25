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
$result = mysqli_query($con,"SELECT * FROM hasil_seleksi WHERE id_pengguna='$id'");
$user = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)===1){
  $nama = $user['nama'];
  $email = $user['email'];
  $status = $user['status'];
  $nilai = $user['hasil'];
  if($status === "Lulus"){
      $ket = "dan diterima sebagai Mahasiswa Baru (PMB) Online AMIK PURNAMA NIAGA INDRAMAYU. Selanjutnya calon mahaiswa harus datang ke kampus untuk melakukan daftar ulang dan juga mengikuti kegiatan OSPEK yang akan dilaksanakan pada hari/tanggal berikut:";
  }else{
      $ket = "<b>Lulus</b> dengan hasil ini jangan jadikan sebagai akhir dari segalanya dan kami pun dengan berat hati untuk menyataknya. Semoga kamu bisa sukses diluar sana, Terimakasih";
  }
  }else{
    echo "<script>alert('Kamu Belum Melakukan Seleksi, Lihat Jadwal seleksi kemabli!');window.location.href='halaman_mahasiswa.php'</script>";
}
  $nama_jadwal = "ospek";
  $data = mysqli_query($con,"SELECT * FROM jadwal WHERE nama_jadwal='$nama_jadwal'");
  $hasil = mysqli_fetch_assoc($data);
  if(mysqli_num_rows($data)===1){
    $nama_jadwal = $hasil['nama_jadwal'];
    $hariAwal = $hasil['hari_awal'];
    $hariAkhir = $hasil['hari_akhir'];
    $tgl_mulai = $hasil['tgl_mulai'];
    $tgl_selesai = $hasil['tgl_selesai'];
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
            font-size: 1.9vw;
            font-weight: 100;
            line-height:1.5;
        }
        h1, h2, h3, h4, h5, h6, {
            font-size: 3vw;
            line-height: 1.1;
        }
        p {
            font-size: 1.9vw;
        }
        @media (max-width: 900px;){
            body{
                font-size: 1.9vw;
            }
        }
        @media (min-width: 600px;){
            body{
                font-size: 1.9vw;
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
                        <h4>PENERIMAAN MAHASISWA BARU</h4>
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
                    <div class="text-end">
                        <p>Indramayu, <?php echo date('d M Y')?></p>
                    </div>
                    <div class="d-flex">
                        <div>
                            <table>
                                <tr>
                                    <td style="width:80px;">
                                        Sifat
                                    </td>
                                    <td style="width:20px;">
                                        :
                                    </td>
                                    <td>
                                        Segera
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:80px;">
                                        Lampiran
                                    </td>
                                    <td style="width:20px;">
                                        :
                                    </td>
                                    <td>
                                        Terlampir
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-text-top" style="width:80px;">
                                        Perihal
                                    </td>
                                    <td class="align-text-top" style="width:20px;">
                                        :
                                    </td>
                                    <td style="width:350px;">
                                        Pemberitahuan Hasil Seleksi PMB Online di Amik Purnama Niaga Indramayu
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="ms-5">
                            <table>
                                <tr>
                                    <td style="width:80px;">
                                        Kepada:
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:380px;">
                                        Calon Mahasiswa Baru Amik Purnama Niaga Indramayu
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-text-top" style="width:80px;">
                                        Di Tempat
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="mt-5" style="text-align: justify; text-justify: newspaper">
                        <span>
                        Berdasarkan Hasil Seleksi Penerimaan Mahasiswa Baru (PMB) Online AMIK PURNAMA NIAGA INDRAMAYU Tahun Pelajaran <?php echo date('Y');?>, maka <b><?php echo $nama;?></b> sebagai calon mahasiswa baru yang telah mendaftar dan melakukan seleksi online dinyatakan <b><?php echo $status;?></b> <?= $ket; ?>
                        </span>
                        <?php
                        if($status === "Lulus"){
                            echo "<div class='mt-3'>
                            <center>
                                <table>
                                    <tr>
                                        <td style='width:80px;'>
                                            Hari
                                        </td>
                                        <td style='width:20px;'>
                                            :
                                        </td>
                                        <td>
                                            $hariAwal - $hariAkhir
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='width:80px;'>
                                            Tanggal 
                                        </td>
                                        <td style='width:20px;'>
                                            :
                                        </td>
                                        <td>$tgl_mulai - $tgl_selesai
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='align-text-top' style='width:80px;'>
                                            Status
                                        </td>
                                        <td class='align-text-top' style='width:20px;'>
                                            :
                                        </td>
                                        <td style='width:350px;'>
                                            Wajib
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='align-text-top' style='width:80px;'>
                                            Tempat
                                        </td>
                                        <td class='align-text-top' style='width:20px;'>
                                            :
                                        </td>
                                        <td style='width:350px;'>
                                            Gedung Kampus Amik Purnama Niaga
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='align-text-top' style='width:80px;'>
                                            Pukul
                                        </td>
                                        <td class='align-text-top' style='width:20px;'>
                                            :
                                        </td>
                                        <td style='width:350px;'>
                                            07:30 WIB
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </div>";
                        }
                        ?>
           </div>
       </div>
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
    <div class="container align-items-center p-2">
        <div class="mt-3">
            <img src="img-qrcode/map amik20220517.png" class="img-fluid" alt="qrcode amik" style="width:150px; height:150px;">
        </div>
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