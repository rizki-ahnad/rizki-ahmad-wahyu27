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
  $nohp = $user['nohp'];
}
$profile = mysqli_query($con,"SELECT * FROM profile WHERE id_pengguna='$id'");
$gambar = mysqli_fetch_assoc($profile);
if(mysqli_num_rows($profile)===1){
  $poto = $gambar['gambar'];
}else{
    $poto = "profile.png";
}
$profile = mysqli_query($con,"SELECT * FROM profile WHERE id_pengguna='$id'");
    $gambar = mysqli_fetch_assoc($profile);
    if(mysqli_num_rows($profile)===1){
    $poto = $gambar['gambar'];
    }else{
        $poto = "profile.png";
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
              <div class="mt-5 mb-3">
                  <h3>AKUN KAMU NICH!</h3>
              </div>
              <div class="mb-3" style="width:100px; height:100px;">
                  <img src="gambar/<?= $poto; ?>" alt="profile" class="rounded-circle" style="width:90px; height:90px;">
              </div>
              <div class="mb-3" style="width:300px;">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gambar" aria-label="Upload">
                    <button class="btn btn-outline-primary" name="upload" type="submit" id="inputGroupFileAddon04">Upload</button>
                </div>
                </form>
              </div>
            <table class="ms-5 me-5">
                <tr>
                    <td style="width:150px;">Nama Lengkap</td>
                    <td style="width:30px;">:</td>
                    <td><?= $username  ?></td>
                </tr>
                <tr>
                    <td style="width:20px;">Email</td>
                    <td style="width:30px;">:</td>
                    <td><?= $email  ?></td>
                </tr>
                <tr>
                    <td style="width:150px;">No Hp</td>
                    <td style="width:30px;">:</td>
                    <td><?= $nohp  ?></td>
                </tr>
                <tr>
                    <td style="width:150px;"></td>
                    <td style="width:30px;"></td>
                    <td><a href="edit_akun.php" class="btn btn-primary me-2 mt-3">Edit Akun</a><a href="ganti_password.php" class="btn btn-success mt-3">Ganti Password</a></td>
                </tr>
            </table>
          </center>
        </div>
      </div>
      <?php
          include "koneksi.php";
          error_reporting(0);
          if (isset($_POST['upload'])){
            $nama_file = $_FILES['gambar']['name'];
            $ukuran_file = $_FILES['gambar']['size'];
            $tipe_file = $_FILES['gambar']['type'];
            $tmp_file = $_FILES['gambar']['tmp_name'];
            // Set path folder tempat menyimpan gambarnya
            $path = "gambar/".$nama_file; 
            if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg" || $tipe_file == "image/bmp" || $tipe_file == "image/gif"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
                // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
                if($ukuran_file <= 3000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                    // Proses upload
                    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
                        // Jika gambar berhasil diupload, Lakukan :  
                        // Proses simpan ke Database

                            $upload = mysqli_query($con,"SELECT * FROM profile WHERE id_pengguna='$id'");
                            $cek = mysqli_num_rows($upload);
                            if($cek > 0){
                                echo "<script>alert('gagal upload!');</script>";
                            }else{
                                $sql = mysqli_query($con,"INSERT INTO profile (gambar, ukuran, type, id_pengguna)
                                VALUES ('$nama_file', '$ukuran_file', '$tipe_file', '$id')");
                            }if($sql){
                                echo "<script>alert('Berhasil Ganti Profile!');window.location.href='profile.php'</script>";
                            }else{
                                echo "<script>alert('gagal Upload, silahkan coba lagi!');</script>";
                            }
                    }
                }else{
                    // Jika ukuran file lebih dari 1MB, lakukan :
                    echo "<script>alert('ukuran gambar terlalu besar!');window.location.href='profile.php'</script>";
                    }
            }else{
                // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
                echo "<script>alert('maaf format gambar tidak sesuai!');window.location.href='profile.php'</script>";
            }
          }
        ?>
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