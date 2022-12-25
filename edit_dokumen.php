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

$result1 = mysqli_query($con,"SELECT * FROM pendaftaran WHERE id_pengguna='$id'");
$user1 = mysqli_fetch_assoc($result1);
if(mysqli_num_rows($result1)===1){
    $sttb = $user1['sttb'];
    $danun = $user1['danun'];
    $ktp = $user1['ktp'];
    $akte = $user1['akte'];
    $poto2 = $user1['poto_2'];
    $poto3 = $user1['poto_3'];
    $potowarna = $user1['poto_warna'];
  
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
           <form action="" method="POST" enctype="multipart/form-data" class="p-5">
             <div class="mb-4 text-center"><h1>Form Edit Dokumen Persyaratan Pendaftaran</h1></div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Scann STTB SMU/SMK/MA</label>
                    <input type="file" class="form-control" name="sttb">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Scann DANUN/NEM SMU/SMK/MA</label>
                    <input type="file" class="form-control" name="danun">
                 </div>
                 <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Scann KTP (Kartu Tanda Penduduk)</label>
                    <input type="file" class="form-control" name="ktp">
                 </div>
                 <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Scann Akte Kelahiran</label>
                    <input type="file" class="form-control" name="akte">
                 </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Pas Foto Ukuran 2 x 3 Hitam Putih</label>
                    <input type="file" class="form-control" name="poto_2">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Pas Foto Ukuran 3 x 4 Hitam Putih</label>
                    <input type="file" class="form-control" name="poto_3">
                 </div>
                 <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Pas Foto Ukuran 2 x 3 Berwarna</label>
                    <input type="file" class="form-control" name="poto_warna">
                 </div>
                 <div class="mt-2">
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                 </div>
<?php
        // var_dump($sttb, $danun, $ktp, $poto2, $poto3, $potowarna, $akte);
  if (isset($_POST['simpan'])){
     
      $nama    = $_FILES['sttb']['name'];
      $ukuran        = $_FILES['sttb']['size'];
      $file_tmp    = $_FILES['sttb']['tmp_name']; 
      
      $nama2    = $_FILES['danun']['name'];
      $ukuran2        = $_FILES['danun']['size'];
      $file_tmp2    = $_FILES['danun']['tmp_name'];
      
      $nama3    = $_FILES['ktp']['name'];
      $ukuran3        = $_FILES['ktp']['size'];
      $file_tmp3    = $_FILES['ktp']['tmp_name'];

      $nama4    = $_FILES['akte']['name'];
      $ukuran4        = $_FILES['akte']['size'];
      $file_tmp4    = $_FILES['akte']['tmp_name'];

      $nama5    = $_FILES['poto_2']['name'];
      $ukuran5        = $_FILES['poto_2']['size'];
      $file_tmp5    = $_FILES['poto_2']['tmp_name'];

      $nama6    = $_FILES['poto_3']['name'];
      $ukuran6        = $_FILES['poto_3']['size'];
      $file_tmp6    = $_FILES['poto_3']['tmp_name'];

      $nama7    = $_FILES['poto_warna']['name'];
      $ukuran7        = $_FILES['poto_warna']['size'];
      $file_tmp7    = $_FILES['poto_warna']['tmp_name'];

        if(empty($nama)){
            $nama = $sttb;
            $nama2;
            $nama3;
            $nama4;
            $nama5;
            $nama6;
            $nama7;
        }if(empty($nama2)){
            $nama2 = $danun;
            $nama;
            $nama3;
            $nama4;
            $nama5;
            $nama6;
            $nama7;
        }if(empty($nama3)){
            $nama3 = $ktp;
            $nama;
            $nama2;
            $nama4;
            $nama5;
            $nama6;
            $nama7;
        }if(empty($nama4)){
            $nama4 = $akte;
            $nama;
            $nama2;
            $nama3;
            $nama5;
            $nama6;
            $nama7;
        }if(empty($nama5)){
            $nama5 = $poto2;
            $nama;
            $nama2;
            $nama3;
            $nama4;
            $nama6;
            $nama7;
        }if(empty($nama6)){
            $nama6 = $poto3;
            $nama;
            $nama2;
            $nama3;
            $nama4;
            $nama5;
            $nama7;
        }if(empty($nama7)){
            $nama7 = $potowarna;
            $nama;
            $nama2;
            $nama3;
            $nama4;
            $nama5;
            $nama6;
        }else{
            $nama;
            $nama2;
            $nama3;
            $nama4;
            $nama5;
            $nama6;
            $nama7;
        }
        $x        = explode('.', $nama);
        $ekstensi    = strtolower(end($x));
        $ekstensi_diperbolehkan    = array('pdf','docx', 'jpg', 'png', 'bmp', 'gif');
        // var_dump($nama, $nama2, $nama3, $nama4, $nama5, $nama6, $nama7);
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
          if($ukuran < 1044070 && $ukuran2 < 1044070 && $ukuran3 < 1044070 && $ukuran4 < 1044070 && $ukuran5 < 1044070 && $ukuran6 < 1044070 && $ukuran7 < 1044070){ 
              move_uploaded_file($file_tmp, 'file/'.$nama);
              move_uploaded_file($file_tmp2, 'file/'.$nama2);
              move_uploaded_file($file_tmp3, 'file/'.$nama3);
              move_uploaded_file($file_tmp4, 'file/'.$nama4);
              move_uploaded_file($file_tmp5, 'file/'.$nama5);
              move_uploaded_file($file_tmp6, 'file/'.$nama6);
              move_uploaded_file($file_tmp7, 'file/'.$nama7);
                

              $sql   = "UPDATE pendaftaran SET sttb='$nama', danun='$nama2', ktp='$nama3', akte='$nama4', poto_2='$nama5', poto_3='$nama6', poto_warna='$nama7' WHERE id_pengguna='$id'";
              $query = mysqli_query($con, $sql);
              if($query){
                echo "<script>alert('File atau dokumen Berhasil di Upload');window.location.href='cek_dokumen.php'</script>";
              }
              else{
                echo "<script>alert('File atau dokumen di Upload');</script>";
              }
              
          }else{
            echo "<script>alert('ukuran File atau dokumen terlalu besar');</script>";
          }
      }
      else{
        echo "<script>alert('extensi File atau dokumen yang di upload tidak sesuai');</script>";
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