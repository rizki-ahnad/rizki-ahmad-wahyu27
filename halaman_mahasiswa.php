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
  $nama = $user['nama'];
  $email = $user['email'];

  $data1 = mysqli_query($con,"SELECT * FROM hasil_seleksi WHERE id_pengguna='$id'");
  $hasil1 = mysqli_fetch_assoc($data1);
  if(mysqli_num_rows($data1)===1){
      $seleksi = "Cetak Hasil Seleksi";
    }
    $data2 = mysqli_query($con,"SELECT * FROM pendaftaran WHERE id_pengguna='$id'");
    $hasil2 = mysqli_fetch_assoc($data2);
    if(mysqli_num_rows($data2)===1){
        $nomor = "Cetak Bukti Pendaftaran";
      }
    $nama_jadwal = "Seleksi";
    $data3 = mysqli_query($con,"SELECT * FROM jadwal WHERE nama_jadwal='$nama_jadwal'");
    $hasil3 = mysqli_fetch_assoc($data3);
    if(mysqli_num_rows($data3)===1){
        $hari_awal = $hasil3['hari_awal'];
        $hari_akhir = $hasil3['hari_akhir'];
        $tgl_mulai = $hasil3['tgl_mulai'];
        $tgl_selesai = $hasil3['tgl_selesai'];
      }
    $profile = mysqli_query($con,"SELECT * FROM profile WHERE id_pengguna='$id'");
    $gambar = mysqli_fetch_assoc($profile);
    if(mysqli_num_rows($profile)===1){
    $poto = $gambar['gambar'];
    }else{
        $poto = "profile.png";
    }
    $bukti_bayar = mysqli_query($con,"SELECT * FROM bukti_bayar WHERE id_pengguna='$id'");
    $bukti = mysqli_fetch_assoc($bukti_bayar);
    if(mysqli_num_rows($bukti_bayar)===1){
    $poto_bukti = "Pembayaran Anda Sedang di Proses";
      $data = mysqli_query($con,"SELECT * FROM kode_akses WHERE id_pengguna='$id'");
      $hasil = mysqli_fetch_assoc($data);
      if(mysqli_num_rows($data)===1){
        $kodeAkses = $hasil['code_akses'];
        $statusbayar = $hasil['status'];
        $poto_bukti = "Pembayaran telah di proses";
      }else{
        $kodeAkses = "Belum ada kode akses";
      }
    }else{
        $poto_bukti = "Anda Belum mengirimkan bukti bayar";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
      body{
        background-image: url(gambar/bg_hlm.jpg);
        background-repeat: no-repeat;
        /* background-size: cover; */
      }
    </style>

    <title>Halaman Mahaiswa</title>
  </head>
  <body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-warning mt-2 rounded">
  <div class="container-fluid">
    <a class="navbar-brand" href="" style="font-family:Gill Sans MT;"><b>AMIK pN</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="halaman_mahasiswa.php"><i class="bi bi-house-fill"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pendaftaran.php"><i class="bi bi-person-lines-fill"></i> PMB Online </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="soal_seleksi.php"><i class="bi bi-journal-text"></i> Seleksi Online</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pembayaran.php"><i class="bi bi-currency-dollar"></i> Info Pembayaran</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-sliders"></i>
             Options
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person-circle"></i> Profile</a></li>
            <li><a class="dropdown-item" href="biodata.php"><i class="bi bi-card-list"></i> Biodata</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
      <div class="d-flex">
        <img src="gambar/<?=$poto;?>" alt="" style="width:35px; height:35px;" class="rounded-circle">
        <div class="mt-1 ms-1"><b><?= "  ".$email;?></b></div>
      </div>
    </div>
  </div>
</nav>
</div>
<div class="mt-5 mb-5">
  <div class="container">
    <center>
      <H1>Halo... <?= $nama ?></H1>
      <h4>Selamat Datang di AMIK Purnama Niaga Indramayu</h4>
    </center>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class=" col-sm-12 col-sm-6 col-sm-3">
        <div class="thumbnail">
          <div class="mt-5" style="margin-bottom:-18px;"><h5>Form informasi tata cara pendaftaran online dan seleksi online</h5></div><br>
        <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Cara & Persyaratan Mendaftar
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <table>
                <tr>
                    <td class="align-text-top" style="width:15px;">1</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Lulus tahun 2022 dan sebelumnya (Surat Keterangan Lulus Tahun 2022)</td>
                </tr>
                <tr>
                    <td class="align-text-top" style="width:15px;">2</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Pendaftaran Online (Biaya Pendaftaran sebesar : Rp.200.000,-) ke No. Rekening 0165-01-070366-50-1, A/n. HADI SANTOSA</td>
                </tr>
                <tr>
                    <td class="align-text-top" style="width:15px;">3</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Bukti Transfer kirim ke link dibawah ini : <br>
                    <a href="bukti_bayar.php" class="btn btn-success">Kirim Bukti Bayar</a></td>
                </tr>
                <tr>
                    <td class="align-text-top" style="width:15px;">4</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Sehat Jasmani dan Rohani</td>
                </tr>
                </table>
                    <table>
                <tr>
                    <td class="align-text-top" style="width:15px;">5</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Syarat kelengkapan dokumen di bawah yang harus ada: <br>
                        (a). Scann STTB SMU/SMK/MA <br>
                        (b). Scann DANUN/NEM SMU/SMK/MA <br>
                        (c). Scann KTP (Kartu Tanda Penduduk) <br>
                        (d). Scann Akte Kelahiran; <br>
                        (e). Scann Photo -> (Ukuran 2 x 3 Hitam Putih, Ukuran 3 x 4 Hitam Putih, Ukuran 2 x 3 Berwarna). <br>
                        (f). Kirim syarat kelengkapan dokumen ke: <br> <a href="pendaftaran.php" class="ms-1 mt-2 btn btn-secondary">Pendaftaran Online</a></td>
                </tr>
                    </table>
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Cara Mengikuti Seleksi Online
            </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div>
                <table>
                    <tr>
                    <td class="align-text-top" style="width:15px;">1</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Sudah membayar pendaftaran online dan mendapatkan PIN/Kode Akses</td>
                    </tr>
                    <tr>
                    <td class="align-text-top" style="width:15px;">2</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Jadwal Seleksi dimulai pada pukul 08.30 WIB dan hari sesuai dengan jadwal seleksi yang didapat</td>
                    </tr>
                    <tr>
                    <td class="align-text-top" style="width:15px;">3</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Nomor pendaftaran pada surat bukti pendaftaran di inputkan ke sistem sebelum seleksi</td>
                    </tr>
                    <tr>
                    <td class="align-text-top" style="width:15px;">4</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Wajib menggunakan Laptop atau Komputer saat mengakses tes/seleksi online</td>
                    </tr>
                    <tr>
                    <td class="align-text-top" style="width:15px;">5</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Waktu pengerjaan selama 2 jam jika lebih dari itu maka soal akan tidak bisa terakses</td>
                    </tr>
                    <tr>
                    <td class="align-text-top" style="width:15px;">6</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Hasil seleksi bisa langsung dilihat</td>
                    </tr>
                    <tr>
                    <td class="align-text-top" style="width:15px;"></td>
                    <td class="align-text-top" style="width:15px;"></td>
                    <td><a href="soal_seleksi.php" class="btn btn-success">Test Now</a></td>
                    </tr>
                </table>
                </div>
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Informasi
            </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            <table>
                    <tr>
                    <td class="align-text-top" style="width:15px;">1</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Kode Akses Pendaftaran Online:<br><input type="text" value="<?= $kodeAkses; ?>"></td>
                    </tr>
                    <tr>
                    <td class="align-text-top" style="width:15px;">2</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Informasi Pembayaran Daftar Online: <?= $poto_bukti; ?> <br> <a href="pembayaran.php" class="btn btn-primary">Cek Info Pembayaran</a></td>
                    </tr>
                    <tr>
                    <td class="align-text-top" style="width:15px;">3</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Informasi Surat Bukti Pendaftaran: <br><a href="bukti_pendaftaran.php" class="btn btn-light" target="_blank"><img src="gambar/pdf.png" class="img-fluid" alt="logo pdf"><?php echo $nomor;?></a></td>
                    </tr>
                    <tr>
                    <td class="align-text-top" style="width:15px;">4</td>
                    <td class="align-text-top" style="width:15px;">.</td>
                    <td>Hasil Seleksi: <br><a href="hasil_seleksi.php"  class="btn btn-light" target="_blank"><img src="gambar/pdf.png" class="img-fluid" alt="logo pdf"><?php echo $seleksi;?></a></td>
                    </tr>
                </table>
            </div>
            </div>
        </div>
        </div>
        </div>
    </div>
    </div>
</div>
<div class="jumbotron text-center mt-5" style="margin-bottom:0">
    <hr>
    <p>&copy Copyright <?= date('Y');?> AMIK Purnama Niaga Indramayu</p>
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
  </body>
</html>