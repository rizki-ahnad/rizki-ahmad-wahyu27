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
  $nohp = $user['nohp'];
  $data = mysqli_query($con,"SELECT * FROM kode_akses WHERE email='$email'");
  $hasil = mysqli_fetch_assoc($data);
  if(mysqli_num_rows($data)===1){
    $kodeAkses = $hasil['code_akses'];
    $statusbayar = $hasil['status'];
  }else{
    $kodeAkses = "Anda Belum Membayar Daftar Online, Silahkan Bayar terlebih dahulu";
  }

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

<div class="container">
    <div class="row">
      <div class=" col-sm-12 col-sm-6 col-sm-3">
        <div class="thumbnail">
            <form action="" method="POST">
            <div class="mt-5 ms-3">
                <div class="ms-2 me-5">
                    <center>
                        <div class="mb-5"><h3>Update Your Account</h3></div>
                    </center>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" required name="nama" placeholder="isi nama lengkap" value="<?= $nama  ?>">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Email</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" required placeholder="isi email" value="<?= $email  ?>" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">No Hp</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" required name="nohp" placeholder="isi alamat sesuai KTP" value="<?= $nohp  ?>">
                        </div>
                </div>
                <div>
                    <div class="ms-3">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan Perubahan</button>
                    </div>
                </div>
<?php
if (isset($_POST['simpan'])){
  $aran = $_POST['nama'];
  $email_ira = $_POST['email'];
  $nohp_ira = $_POST['nohp'];

  $sql = "UPDATE user SET nama='$aran', email='$email_ira', nohp='$nohp_ira' WHERE id_user='$id'";
  $query = mysqli_query($con, $sql);
  if($query){
    echo "<script>alert('Akun Berhasil di ubah');window.location='profile.php';</script>";
  }
  else{
    echo "<script>alert('Akun gagal di di ubah');</script>";
  }
  $update_bukti = "UPDATE bukti_bayar, user SET bukti_bayar.nama = user.nama, bukti_bayar.email = user.email, bukti_bayar.nohp = user.nohp WHERE bukti_bayar.id_pengguna = user.id_user";
  $q_updateBukti = mysqli_query($con, $update_bukti);

  $update_hasil = "UPDATE hasil_seleksi, user SET hasil_seleksi.nama = user.nama, hasil_seleksi.email = user.email, hasil_seleksi.nohp = user.nohp WHERE hasil_seleksi.id_pengguna = user.id_user";
  $q_updateHasil = mysqli_query($con, $update_hasil);

  $update_kode = "UPDATE kode_akses, user SET kode_akses.nama = user.nama, kode_akses.email = user.email, kode_akses.nohp = user.nohp WHERE kode_akses.id_pengguna = user.id_user";
  $q_updateKode = mysqli_query($con, $update_kode);

  if($q_updateBukti and $q_updateHasil and $q_updateKode){
    echo "<script>alert('telah di update semua');</script>";
  }else{
    echo "<script>alert('gagal update semua');</script>";
  }
}
?>
            </form>
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