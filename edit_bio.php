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
$result1 = mysqli_query($con,"SELECT * FROM pendaftaran WHERE id_pengguna='$id'");
$user1 = mysqli_fetch_assoc($result1);
if(mysqli_num_rows($result1)===1){
    $nisn = $user1['nisn'];
    $nama = $user1['nama'];
    $alamat = $user1['alamat'];
    $jk = $user1['jk'];
    $agama = $user1['agama'];
    $ayah = $user1['ayah'];
    $ibu = $user1['ibu'];
    $sttb = $user1['sttb'];
    $danun = $user1['danun'];
    $ktp = $user1['ktp'];
    $akte = $user1['akte'];
    $poto2 = $user1['poto_2'];
    $poto3 = $user1['poto_3'];
    $potowarna = $user1['poto_warna'];
    $kelas = $user1['kelas'];
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
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="mt-5 text-center"><h1>Form Edit Biodata dan Profile</h1></div>
          <div class="p-5">
              <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Nomor Induk Kependudukan</label>
                    <input type="hidden" class="form-control" id="formGroupExampleInput2" required name="nisn" placeholder="isi nomor induk siswa nasional" value="<?= $nisn  ?>">
                    <input type="text" class="form-control" id="formGroupExampleInput2" required placeholder="isi nomor induk siswa nasional" value="<?= $nisn  ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Nama Lengkap</label>
                    <input type="hidden" class="form-control" id="formGroupExampleInput2" required name="nama" placeholder="isi nama lengkap" value="<?= $nama  ?>">
                    <input type="text" class="form-control" id="formGroupExampleInput2" required placeholder="isi nama lengkap" value="<?= $nama  ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" required name="alamat" placeholder="isi alamat sesuai KTP" value="<?= $alamat  ?>">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" aria-label="Default select example" required name="jk" required>
                        <option value="<?= $jk  ?>"><?= $jk  ?></option>
                        <option>Pilih</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Agama</label>
                    <select class="form-select" aria-label="Default select example" required name="agama" required>
                            <option value="<?= $agama  ?>"><?= $agama  ?></option>
                            <option>Pilih</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Khatolik">Kristen Khatolik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Pilih Tipe Kelas</label>
                    <select class="form-select" aria-label="Default select example" required name="kelas" required>
                        <option  value="<?= $kelas  ?>"><?= $kelas  ?></option>
                        <option>Pilih</option>
                        <option value="Sore">Sore</option>
                        <option value="Pagi">Pagi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Nama Ayah</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" required name="ayah" placeholder="nama ayah" value="<?= $ayah  ?>">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Nama Ibu</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" required name="ibu" placeholder="nama ibu" value="<?= $ibu  ?>">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan Perubahan</button>
                </div>
            </div> 
            <?php
            if(isset($_POST['simpan'])){
              $nisn1 = $_POST['nisn'];
              $nama1 = $_POST['nama'];
              $alamat1 = $_POST['alamat'];
              $jk1 = $_POST['jk'];
              $agama1 = $_POST['agama'];
              $ayah1 = $_POST['ayah'];
              $ibu1 = $_POST['ibu'];
              $kelas1 = $_POST['kelas'];

              $update = "UPDATE pendaftaran SET nisn='$nisn1', nama='$nama1', alamat='$alamat1', jk='$jk1', agama='$agama1', ayah='$ayah1', ibu='$ibu1', kelas='$kelas1' WHERE id_pengguna='$id'";
              $up = mysqli_query($con, $update);
              if($up){
                echo "<script>alert('Berhasil Update');window.location.href='biodata.php'</script>";
              }else{
                echo "<script>alert('Gagal Update');</script>";
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