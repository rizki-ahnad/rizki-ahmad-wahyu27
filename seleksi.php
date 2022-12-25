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
$data = mysqli_query($con,"SELECT * FROM pendaftaran WHERE id_pengguna='$id'");
$hasil = mysqli_fetch_assoc($data);
if(mysqli_num_rows($data)===1){
  $kelas = $hasil['kelas'];
  $program = $hasil['program_studi'];
  $pesan = "Selamat Datang ". $nama . " Lest Give Up";
  // $meseg = "Lest Give Up";
}else{
  $pesan = "Maaf kamu belum mendaftar, silahkan daftar dulu ".$nama;
  echo "<script>alert('Kamu Belum Melakukan Pendaftaran Online, Daftar sekarang!');window.location.href='halaman_mahasiswa.php'</script>";
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
<?php
    $jam1 = date('H') + 2;
    $jam = $jam1;
    $menit = date('i');
    $detik = date('s');
    $date = date('Y-m-d');
    $tahun = date('Y');
    $bulan = date('m');
    $tanggal = date('d');
    $target = mktime($tahun, $bulan, $tanggal, $jam, $menit, $detik);
    $batas_waktu = mktime($tahun, $bulan, $tanggal, $jam, $menit, $detik);
    $hari_ini = time ();
    $rentang =($target-$hari_ini);
    $hari =(int) ($rentang/60);
    ?>
<div class="container">
    <div class="row">
      <div class=" col-sm-12 col-sm-6 col-sm-3">
        <div class="thumbnail">
          <div class="text-center mt-5"><h3><b>Kerjakan Soal Ini dengan Baik dan Benar</b></h3>
            <p><b>Note:</b> Waktu Pengerjaan Soal Selama 2 Jam Jika Lebih dari Itu Maka Halaman Soal Ini akan ditutup</p>
            <h3 id="demo"></h3>
          </div>
          <hr>
        <table class="mt-3 ms-5 me-5">
        <tbody>
            <?php
                include "koneksi.php";
                $query1    =mysqli_query($con, "SELECT * FROM soal_seleksi");
                $jumlah1 =mysqli_num_rows($query1);
                $query    =mysqli_query($con, "SELECT * FROM soal_seleksi ORDER BY RAND() LIMIT $jumlah1");
                $jumlah =mysqli_num_rows($query);
                $nomer = 1;
                while($data = mysqli_fetch_array($query)){
            ?>
            <form action="" method="POST">
                <input type="hidden" name="id[]" value="<?php echo $data['id_soal']; ?>">
                <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
                <input type="hidden" name="kelas" value="<?php echo $kelas; ?>">
                <input type="hidden" name="program_studi" value="<?php echo $program; ?>">
                <tr><td class="align-text-top"><?php echo $nomer++.". ";?></td>
                    <td><?php echo $data['soal'];?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="pilihan[<?php echo $data['id_soal']?>]" type="radio" value="A"><?php echo $data['a'];?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="pilihan[<?php echo $data['id_soal']?>]" type="radio" value="B"><?php echo $data['b'];?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="pilihan[<?php echo $data['id_soal']?>]" type="radio" value="C"><?php echo $data['c'];?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="pilihan[<?php echo $data['id_soal']?>]" type="radio" value="D"><?php echo $data['d'];?></td>
                </tr>
                <?php
                }
                ?>
                 <tr>
                    <td height="40"></td>
                    <td>
                        <input type="submit" name="submit" value="Jawab" id="submit" onclick="return confirm('Perhatian! Apakah Anda sudah yakin dengan semua jawaban Anda?')" class="btn btn-primary mt-5">
                        <input type="reset" class="btn btn-primary mt-5" value="Reset">
                    </td>
                </tr>
            </form>
        </tbody>
    </table>
    <hr>
        </div>
        <div class="alert alert-light mt-3" role="alert">

        <?php
    include "koneksi.php";
    if(isset($_POST['submit'])){
        if(empty($_POST['pilihan'])){
        ?>
            <script language="JavaScript">
                alert('Oops! Serius. Anda tidak mengerjakan soal apapun ...');
                document.location='halaman_mahasiswa.php';
            </script>
        <?php
        }
        
        $pilihan    =$_POST["pilihan"];
        $id_soal    =$_POST["id"];
        $jumlah        =$_POST["jumlah"];
        $kls = $_POST['kelas'];
        $prgm = $_POST['program_studi'];
        
        $score    =0;
        $benar    =0;
        $salah    =0;
        $kosong    =0;

        for($i=0;$i<$jumlah;$i++){
            $nomor    =$id_soal[$i];
            
            // jika peserta tidak memilih jawaban
            if(empty($pilihan[$nomor])){
                $kosong++;
            }
            // jika memilih
            else {
                $jawaban    =$pilihan[$nomor];

                // cocokan kunci jawaban dengan database
                $query    =mysqli_query($con,"SELECT * FROM soal_seleksi WHERE id_soal='$nomor' AND kunci='$jawaban'");
                $cek    =mysqli_num_rows($query);
                
                // jika jawaban benar (cocok dengan database)
                if($cek){
                    $benar++;
                }
                // jika jawaban salah (tidak cocok dengan database)
                else {
                    $salah++;
                }
            }
            /*
                ----------
                Nilai 100
                ----------
                Hasil = 100 / jumlah soal * Jawaban Benar
            */
            // script php membuat soal pilihan ganda
            // hitung skor
            $hitung =mysqli_query($con,"SELECT * FROM soal_seleksi");
            $jumlah_soal    =mysqli_num_rows($hitung);
            $score    = (100 / $jumlah_soal) * $benar;
            $hasil    = round($score,2);
        }
          // echo $hasil;
          $tanggal1 = date('Y-m-d');
          $hasil_jawaban = $hasil;
          $semester = "Semester 1";
          if($hasil >= 70){
            $status = "Lulus";
          }elseif($hasil <= 70){
            $status = "Tidak";
          }
          $no2 = $nama; 
          $no3 = $email;
          $no4 = $nohp; 
          $no5 = $semester;
          $no6 = $kls;
          $no10 = $prgm;
          $no7 = $tanggal1;
          $no8 = $status;
          $no9 = $id;
            $dataseleksi = mysqli_query($con,"SELECT * FROM mhs WHERE id_pengguna='$id' ");

            // menghitung jumlah dataseleksi yang ditemukan
            $cekseleksi = mysqli_num_rows($dataseleksi);
            
            if($cekseleksi > 0){
                echo "<script>alert('gagal brow!');</script>";
            }else{
              $sql = mysqli_query($con,"INSERT INTO hasil_seleksi (nama, email, nohp, hasil, status, tanggal, id_pengguna)VALUES('$nama', '$email', '$nohp', '$hasil_jawaban', '$status', '$tanggal1', '$id')");
              if($hasil_jawaban >= 70){
                $sql .= mysqli_query($con,"INSERT INTO mhs (nama, email, nohp, semester, kelas, program_studi, tanggal, status, id_pengguna)VALUES('$no2', '$no3', '$no4', '$no5', '$no6', '$no10', '$no7', '$no8', '$no9')");
              }

              if($sql){
                echo "<script>alert('Berhasil mengirim jawaban!');window.location.href='soal_seleksi.php'</script>";
              }else{
                echo "<script>alert('maaf anda gagal mengirim jawaban, silahkan coba lagi!');</script>";
              }
            }
        }
    ?>
     <script>

var countDownDate = <?php 
echo strtotime("$date $jam:$menit:$detik" ) ?> * 1000;
var now = <?php echo time() ?> * 1000;

var x = setInterval(function() {
  now = now + 1000;
// Find the distance between now an the count down date
      var distance = countDownDate - now;
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = hours + ":" +
      minutes + ":" + seconds ;
      // If the count down is over, write some text 
      if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
      var simpan = document.getElementById('submit').click();            
      // alert('waktu pengerjaan habis');window.location.href='soal_seleksi.php';
      }
}, 1000);
</script>
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
  <!-- // var_dump($nim, $nama, $email, $nohp, $semester, $kelas, $tanggal, $status, $id);
        // var_dump($n01, $no2, $no3, $no4, $no5, $no6, $no7, $no8, $no9); -->
</html>