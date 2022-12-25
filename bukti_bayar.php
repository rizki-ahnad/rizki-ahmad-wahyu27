<?php
error_reporting(0);
    session_start();
    if (($_SESSION['level']=="")){
        echo "<script>alert('Silahkan Login terlebih dahulu, jika belum punya akun registrasi dahulu!');window.location.href='login.php';</script>";
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
    $seleksi = "Belum ada hasil :(";
  }

  $data1 = mysqli_query($con,"SELECT * FROM hasil_seleksi WHERE id_pengguna='$id'");
  $hasil1 = mysqli_fetch_assoc($data1);
  if(mysqli_num_rows($data1)===1){
    $nilai = $hasil1['hasil'];
    $status = $hasil1['status'];
    if($nilai <= 70){
      $seleksi = "Belum ada hasil :(";
    }elseif($nilai >= 70){
      $seleksi = "Cetak Hasil Seleksi";
    }
  }else{
    $seleksi = "Belum ada hasil :(";
  }
  $id_form = 1;
  $perintah = "SELECT * FROM formcontrol WHERE id='$id_form'"; //pilih tabelnya
  $jalankan=mysqli_query($con,$perintah); //buat query
  $data_printah=mysqli_fetch_assoc($jalankan); //buat varibel untuk memanggil nilai data
  $status_form="no"; // simpan variabel untuk membandingkan
  if($data_printah['formaktif']===$status_form){ //bandingkan nilai data yang di db dengan variabel aktif
    header("Location:notFound.php");//jika nilainya sama, panggil file
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

    <title>Halaman Mahasiswa</title>
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
          <a class="nav-link" href="pendaftaran.php"><i class="bi bi-person-lines-fill"></i> PMB Online</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="soal_seleksi.php"><i class="bi bi-journal-text"></i>Seleksi Online</a>
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
            <center><h3 class="mt-2">Form Kirim Bukti Pembayaran Daftar Online</h3></center>
              <form action="" method="POST" enctype="multipart/form-data" class="me-5">
                <div class="mt-2 ms-5">
                    <div class="ms-5 me-5">
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" required placeholder="masukan nama pengguna" name="nama" value="<?= $nama  ?>">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Email</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" required name="email" placeholder="isi nama Email" value="<?= $email  ?>">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">No HP</label>
                                <input type="number" class="form-control" id="formGroupExampleInput2" required name="nohp" value="<?= $nohp  ?>">
                            </div>  
                            <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Masukan Bukti Bayar</label>
                            <input type="file" class="form-control" required name="bukti_bayar">
                        </div>
                    </div>
                </div>
                <div class="ms-5 mb-2">
                    <div class="ms-5">
                        <button type="submit" class="btn btn-primary" name="simpan">Kirim Bukti Transfer</button>
                    </div>
                </div>
                <?php    
                  include "koneksi.php";
                  error_reporting(0);
                  if (isset($_POST['simpan'])){
                          $d = mysqli_query($con,"SELECT * FROM bukti_bayar WHERE id_pengguna='$id'");
                          $c = mysqli_num_rows($d);
                          if( $c > 0){
                              echo "<script>alert('maaf anda sudah mengirim bukti transfer!');</script>";
                          }else{
                          $nama_file = $_FILES['bukti_bayar']['name'];
                          $ukuran_file = $_FILES['bukti_bayar']['size'];
                          $tipe_file = $_FILES['bukti_bayar']['type'];
                          $tmp_file = $_FILES['bukti_bayar']['tmp_name'];
                          // Set path folder tempat menyimpan gambarnya
                          $path = "img/".$nama_file; 
                          if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
                              // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
                              if($ukuran_file <= 3000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                                  // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                                  // Proses upload
                                  if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
                                      // Jika gambar berhasil diupload, Lakukan :  
                                      // Proses simpan ke Database
                                          $tanggal = date('Y-m-d');

                                          $data = mysqli_query($con,"SELECT * FROM bukti_bayar WHERE id_pengguna='$id'");
                                          $cek = mysqli_num_rows($data);
                                          if($cek > 0){
                                              echo "<script>alert('maaf anda sudah mengirim bukti transfer!');</script>";
                                          }else{
                                              $sql = mysqli_query($con,"INSERT INTO bukti_bayar (nama, email, nohp, tanggal, foto_bukti, id_pengguna)
                                              VALUES ('$nama', '$email', '$nohp', '$tanggal', '$nama_file', '$id')");
                                          }if($sql){
                                              echo "<script>alert('Bukti Transfer Success Dikirim');window.location.href='halaman_mahasiswa.php'</script>";
                                          }else{
                                              echo "<script>alert('Gagal mengirim!');</script>";
                                          }
                                  }
                            }else{
                                // Jika ukuran file lebih dari 1MB, lakukan :
                                echo "<script>alert('ukuran gambar terlalu besar!');window.location.href='bukti_bayar.php'</script>";
                                }
                        }else{
                            // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
                            echo "<script>alert('maaf format gambar tidak sesuai!');window.location.href='bukti_bayar.php'</script>";
                        }
                      }
                  }
                  ?>
              </form>
              <div class="col-sm-12 col-sm-6 col-sm-3">
                <center>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Warning!</strong> Mohon Sebelum Kirim Bukti Transfer pastikan semua data telah benar dan bukti transfer yang jelas agar proses lebih cepat.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </center>
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