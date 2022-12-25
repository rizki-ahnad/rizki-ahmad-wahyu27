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
  
  $bukti_bayar = mysqli_query($con,"SELECT * FROM bukti_bayar WHERE id_pengguna='$id'");
  $bukti = mysqli_fetch_assoc($bukti_bayar);
  if(mysqli_num_rows($bukti_bayar)===1){
    $pesan = "Pembayaran Sedang di proses";
    $data = mysqli_query($con,"SELECT * FROM kode_akses WHERE id_pengguna='$id'");
    $hasil = mysqli_fetch_assoc($data);
    if(mysqli_num_rows($data)===1){
      $pesan = "Pembayaran Telah di proses";
      $kodeAkses = $hasil['code_akses'];
      $statusbayar = $hasil['status'];
      $poto_bukti = "Pembayaran telah di proses";
      $data_daftar = mysqli_query($con,"SELECT * FROM pendaftaran WHERE id_pengguna='$id'");
      $hasil_daftar = mysqli_fetch_assoc($data_daftar);
      if(mysqli_num_rows($data_daftar)===1){
        $pesan = "Pendaftaran success silahkan lihat bukti daftar di bagan informasi pada halaman Home";
      }
    }else{
      echo "<script>alert('Kamu Belum Punya Kode akses!');window.location.href='halaman_mahasiswa.php';</script>";
    }
    echo "<script>alert('$pesan');</script>";
  }else{
    echo "<script>alert('Kamu Belum Melakukan Pembayaran Online, Bayar Sekarang sekarang!');window.location.href='pembayaran.php'</script>";
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
<?php
 error_reporting(0);
 // https://www.malasngoding.com
 // menghubungkan dengan koneksi database
 include 'koneksi.php';

 // mengambil data barang dengan kode paling besar
 $query = mysqli_query($con,"SELECT max(nomor_daftar) as nimTerbesar FROM pendaftaran");
 $data = mysqli_fetch_array($query);
 $kode = $data['nimTerbesar'];
 // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
 // dan diubah ke integer dengan (int)
 $urutan = (int) substr($kode, 5);
 // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
  $urutan++;
  $huruf = "P".date("ym");
  $nomor_daftar = $huruf. sprintf("%03s", $urutan);
//  var_dump($nomor_daftar);                   
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
          <div class="mt-5"><p><b><u>Form Pendaftaran dan Kelengkapan Dokumen</u></b></p></div>
          <form action="" method="POST" enctype="multipart/form-data" class="ms-3 mt-3">
                <div class="me-3">
                      <div class="mb-3">
                          <label for="formGroupExampleInput" class="form-label">Kode Akses</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" required name="kode_akses" placeholder="isi kode akses yang diterima">
                          <input type="hidden" class="form-control" id="formGroupExampleInput" required name="nomor_daftar" value="<?= $nomor_daftar; ?>">
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Nomor Induk Siswa Nasional</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" required name="nisn" placeholder="isi nomor induk siswa nasional">
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Nama Lengkap</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" required name="nama" placeholder="isi nama lengkap" value="<?php echo $nama;?>">
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Alamat</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" required name="alamat" placeholder="isi alamat sesuai KTP">
                      </div>
                </div>
                <div class="me-3">
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Jenis Kelamin</label>
                          <select class="form-select" aria-label="Default select example" required name="jk" required>
                              <option selected>Pilih</option>
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Agama</label>
                          <select class="form-select" aria-label="Default select example" required name="agama" required>
                                  <option selected>Pilih</option>
                                  <option value="Islam">Islam</option>
                                  <option value="Kristen Khatolik">Kristen Khatolik</option>
                                  <option value="Kristen Protestan">Kristen Protestan</option>
                                  <option value="Hindu">Hindu</option>
                                  <option value="Budha">Budha</option>
                                  <option value="Konghucu">Konghucu</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Nama Ayah</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" required name="ayah" placeholder="nama ayah">
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Nama Ibu</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" required name="ibu" placeholder="nama ibu">
                      </div>
                </div>
                <div class="me-3">
                      <div class="mb-3">
                          <label for="formGroupExampleInput" class="form-label">Scann STTB/IJAZAH SMU/SMK/MA</label>
                          <input type="file" class="form-control" required name="sttb">
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Scann DANUN/NEM/TRANSKIP NILAI SMU/SMK/MA</label>
                          <input type="file" class="form-control" required name="danun">
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Scann KTP (Kartu Tanda Penduduk)</label>
                          <input type="file" class="form-control" required name="ktp">
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Scann Akte Kelahiran</label>
                          <input type="file" class="form-control" required name="akte">
                      </div>
                </div>
                <div class="me-3">
                      <div class="mb-3">
                          <label for="formGroupExampleInput" class="form-label">Pas Foto Ukuran 2 x 3 Hitam Putih</label>
                          <input type="file" class="form-control" required name="poto_2" accept="image/*">
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Pas Foto Ukuran 3 x 4 Hitam Putih</label>
                          <input type="file" class="form-control" required name="poto_3" accept="image/*">
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Pas Foto Ukuran 2 x 3 Berwarna</label>
                          <input type="file" class="form-control" required name="poto_warna" accept="image/*">
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Pilih Tipe Kelas</label>
                          <select class="form-select" aria-label="Default select example" required name="kelas" required>
                              <option selected>Pilih</option>
                              <option value="Sore">Sore</option>
                              <option value="Pagi">Pagi</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Pilih Program Studi</label>
                          <select class="form-select" aria-label="Default select example" required name="program_studi" required>
                              <option selected>Pilih</option>
                              <option value="Manajemen Informatika">Manajemen Informatika</option>
                              <option value="Teknik Informatika">Teknik Informatika</option>
                              <option value="Teknik Komputer">Teknik Komputer</option>
                              <option value="Sistem Informasi">Sistem Informasi</option>
                              <option value="Sistem Komputer">Sistem Komputer</option>
                              <option value="Ilmu Komputer">Ilmu Komputer</option>
                              <option value="Teknik Elektro">Teknik Elektro</option>
                              <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                          </select>
                      </div>
                </div>
            
            <div class="ms-3">
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    <a href="halaman_mahasiswa.php" class="btn btn-primary ms-2">Back</a>
                </div>
            </div>
<?php

if (isset($_POST['simpan'])){
  $kode_akses = $_POST['kode_akses'];
  $data1 = mysqli_query($con,"SELECT * FROM pendaftaran WHERE id_pengguna='$id'");
$hasil1 = mysqli_fetch_assoc($data1);
  if($kode_akses != $kodeAkses){
    echo "<script>alert('maaf kode akses anda salah!');</script>";
  }elseif(mysqli_num_rows($data1)===1){
    echo "<script>alert('maaf kamu sudah melakukan pendaftaran, silahkan melanjutkan ke tahap berikutnya');window.location.href='soal_seleksi.php'</script>";
  }
  else{
    $ekstensi_diperbolehkan    = array('pdf','docx', 'jpg', 'png', 'bmp', 'gif');
    $nama    = $_FILES['sttb']['name'];
    $x        = explode('.', $nama);
    $ekstensi    = strtolower(end($x));
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



    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070 && $ukuran2 < 1044070 && $ukuran3 < 1044070 && $ukuran4 < 1044070 && $ukuran5 < 1044070 && $ukuran6 < 1044070 && $ukuran7 < 1044070){ 
            move_uploaded_file($file_tmp, 'file/'.$nama);
            move_uploaded_file($file_tmp2, 'file/'.$nama2);
            move_uploaded_file($file_tmp3, 'file/'.$nama3);
            move_uploaded_file($file_tmp4, 'file/'.$nama4);
            move_uploaded_file($file_tmp5, 'file/'.$nama5);
            move_uploaded_file($file_tmp6, 'file/'.$nama6);
            move_uploaded_file($file_tmp7, 'file/'.$nama7);

            $nisn = $_POST['nisn'];
            $nomor_daftar = $_POST['nomor_daftar'];
            $name = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $jk = $_POST['jk'];
            $agama = $_POST['agama'];
            $ayah = $_POST['ayah'];
            $ibu = $_POST['ibu'];
            $kelas = $_POST['kelas'];
            $program = $_POST['program_studi'];
            $tanggal = date('Y-m-d');

            $query    = mysqli_query($con,"INSERT INTO pendaftaran (kode_akses, nisn, nomor_daftar, nama, alamat, jk, agama, ayah, ibu, sttb, danun, ktp, akte, poto_2, poto_3, poto_warna, kelas, program_studi, tanggal, id_pengguna)VALUES('$kode_akses', '$nisn', '$nomor_daftar', '$name', '$alamat', '$jk', '$agama', '$ayah', '$ibu', '$nama', '$nama2', '$nama3', '$nama4', '$nama5', '$nama6', '$nama7', '$kelas', '$program', '$tanggal', '$id')");
            if($query){
              echo "<script>alert('File dan Biodata Berhasil di Upload');window.location='bukti_pendaftaran.php';</script>";
            }
            else{
              echo "<script>alert('File dan Biodata gagal di Upload');</script>";
            }
        }else{
          echo "<script>alert('ukuran file terlalu besar');</script>";
        }
    }
    else{
      echo "<script>alert('extensi file yang di upload tidak sesuai');</script>";
    }
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