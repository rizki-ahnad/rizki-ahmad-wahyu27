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
  $username = $user['nama'];
  $email = $user['email'];
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
  // $poto_bukti = "Pembayaran Anda Sedang di Proses";
  $result1 = mysqli_query($con,"SELECT * FROM kode_akses WHERE id_pengguna='$id'");
  $user1 = mysqli_fetch_assoc($result1);
  if(mysqli_num_rows($result1)===1){
      $nama = $user1['nama'];
      $email = $user1['email'];
      $nohp = $user1['nohp'];
      $bayar = $user1['bayar_daftar'];
      $status = $user1['status'];
      $tanggal = $user1['tanggal'];
      // $poto_bukti = "Pembayaran Anda Telah di Proses";
  }else{
    echo "<script>alert('Pembayaran sedang di proses!');window.location.href='halaman_mahasiswa.php'</script>";
  }
}else{
  echo "<script>alert('Kamu Belum Melakukan Pembayaran, Bayar sekarang!');window.location.href='halaman_mahasiswa.php'</script>";
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
        <center>
                  <div class="mt-5 mb-5">
                      <h3>Rincian Pembayaran Pendafataran Online</h3>
                  </div>
                <table>
                    <tr>
                        <td style="width:230px;">Nama</td>
                        <td style="width:30px;">:</td>
                        <td><?= $username  ?></td>
                    </tr>
                    <tr>
                        <td style="width:230px;">Email</td>
                        <td style="width:30px;">:</td>
                        <td><?= $email  ?></td>
                    </tr>
                    <tr>
                        <td style="width:230px;">No Hp</td>
                        <td style="width:30px;">:</td>
                        <td><?= $nohp  ?></td>
                    </tr>
                    <tr>
                        <td style="width:230px;">Jumlah Pembayaran</td>
                        <td style="width:30px;">:</td>
                        <td><?= $bayar  ?></td>
                    </tr>
                    <tr>
                        <td style="width:230px;">Tanggal Bayar</td>
                        <td style="width:30px;">:</td>
                        <td><?= $tanggal  ?></td>
                    </tr>
                    <tr>
                        <td style="width:230px;">Status</td>
                        <td style="width:30px;">:</td>
                        <td><?= $status  ?></td>
                    </tr>
                    <tr>
                        <td style="width:230px;"></td>
                        <td style="width:30px;"></td>
                        <td><a href="cetak_struk_pembayaran.php" target="_blank" class="btn btn-success">Cetak Struk Pembayaran</a></td>
                    </tr>
                </table>
              </center>
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