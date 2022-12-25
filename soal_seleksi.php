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
  $nama = $user['nama'];
  $email = $user['email'];
  $nohp = $user['nohp'];
  $data = mysqli_query($con,"SELECT * FROM pendaftaran WHERE id_pengguna='$id'");
  $hasil = mysqli_fetch_assoc($data);
  if(mysqli_num_rows($data)===1){
    $id_daftar = $hasil['id_mahasiswa'];
    $kelas = $hasil['kelas'];
    $pesan = "Selamat Datang ". $nama . " Lest Give Up";
    // $meseg = "Lest Give Up";
  }else{
    $pesan = "Maaf kamu belum mendaftar, silahkan daftar dulu ".$nama;
    echo "<script>alert('Kamu Belum Melakukan Pendaftaran Online, Daftar sekarang!');window.location.href='halaman_mahasiswa.php'</script>";
  }
  $id_form = 2;
  $perintah = "SELECT * FROM formcontrol WHERE id='$id_form'"; //pilih tabelnya
  $jalankan=mysqli_query($con,$perintah); //buat query
  $data_printah=mysqli_fetch_assoc($jalankan); //buat varibel untuk memanggil nilai data
  $status_form="no"; // simpan variabel untuk membandingkan
  if($data_printah['formaktif']===$status_form){ //bandingkan nilai data yang di db dengan variabel aktif
    header("Location:halaman_seleksi.php");//jika nilainya sama, panggil file
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
      <div class="col-sm-12 col-sm-6 col-sm-3">
        <div class="thumbnail">
        <?php
         $data_daftar1 = mysqli_query($con,"SELECT * FROM hasil_seleksi WHERE id_pengguna='$id'");
         $hasil_daftar1 = mysqli_fetch_assoc($data_daftar1);
         if(mysqli_num_rows($data_daftar1)===1){
          echo "
          <div class='container'>
            <div class='row'>
                <div class='col-md-4 mt-5'></div>
                <div class='col-md-4 col-xs-4'>
                    <div class='panel panel-default position-relative'>
                          <img src='gambar/selamat.gif' class='img-fluid'>
                          <h4 style='position:absolute; top:250px;' class='text-center'><b>Kamu Sudah Mengikuti Seleksi Online</b></h4>
                    </div>
                    <center>
                    <div>
                     <a href='kartu_mahasiswa.php' class='btn btn-success me-2 mt-3' target='blank'>Cetak Kartu</a>
                    </div>
                    </center>
                </div>"; 
         }else{
           echo "<div class='alert alert-primary' role='alert'>
           <form action='' method='POST'>
             <h4 class='alert-heading'>Mohon Diisi..!</h4>
             <p>Sebelum masuk ke halaman seleksi kamu harus mengisikan nomor pendaftaran yang telah kamu dapat</p>
             <div class='mb-3'>
                 <input type='text' class='form-control' id='formGroupExampleInput2' required name='nomor_daftar' placeholder='isi nomor pendaftaran'>
             </div>
             <hr>
             <button class='btn btn-outline-dark me-1' type='submit' name='kirim'>Kirim</button>
           </form>
         </div>";
         }
        ?>
          <?php
                $data_daftar = mysqli_query($con,"SELECT * FROM pendaftaran WHERE id_pengguna='$id'");
                $hasil_daftar = mysqli_fetch_assoc($data_daftar);
                if(mysqli_num_rows($data_daftar)===1){
                  $nomor_pendaftaran = $hasil_daftar['nomor_daftar'];
                }else{
                  echo "<script>alert('Nomor Pendaftaran yang kamu masukan salah, coba cek lagi');window.location.href='halaman_mahasiswa.php'</script>";
                }
                if(isset($_POST['kirim'])){
                  $nomor_daftar = $_POST['nomor_daftar'];
                  // var_dump($nomor_daftar, $nomor_pendaftaran, $id_daftar);
                  if($nomor_daftar === $nomor_pendaftaran){
                    echo "<script>alert('Nomor pendaftaran dikirm');window.location.href='seleksi.php'</script>";
                  }else{
                    echo "<script>alert('Nomor Pendaftaran yang kamu masukan salah, coba cek lagi');</script>";
                  }
                }
              ?>
      </div>
    </div>
</div>
<div class="jumbotron text-center" style="margin-top:150px; margin-bottom:0">
    <hr>
    <p>&copy Copyright <?= date('Y');?> AMIK Purnama Niaga Indramayu</p>
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
  </body>
</html>
