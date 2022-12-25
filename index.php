<?php
    session_start();
    if (isset($_GET["pesan"])){
      if($_GET["pesan"]=="gagal"){
        header("Location: index.php");
    }
  }
?>
<?php
include "koneksi.php";
$data = mysqli_query($con,"SELECT * FROM pendaftaran");
$pendaftar = mysqli_num_rows($data);

$hasil_seleksi = "Lulus";
$seleksi = mysqli_query($con,"SELECT * FROM hasil_seleksi WHERE status='$hasil_seleksi'");
$lolos_seleksi = mysqli_num_rows($seleksi);

$hasil_seleksi1 = "Tidak";
$seleksi1 = mysqli_query($con,"SELECT * FROM hasil_seleksi WHERE status='$hasil_seleksi1'");
$gagal_seleksi = mysqli_num_rows($seleksi1);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home Page | Amik PN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
      body{
        background-image: url(gambar/logo_langit.jpg);
        background-repeat: repeat-x;
      }
      
    </style>

  </head>
  <body>
      <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-warning mt-2 rounded-top">
        <div class="container-fluid">
          <img src="gambar/logo.png" alt="logo" style="width:40px; height:40px;"><a class="navbar-brand" href="home.php"><marquee behavior="6" direction="left" style="margin-left:-1px; width:200px;">Selamat Datang di AMIK PN Indramayu</marquee></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="kontak.php">Kontak</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Informasi
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="profile_kampus.php">Profile Kampus</a></li>
                    <li><a class="dropdown-item" href="info_daftar.php">Info Pendaftaran</a></li>
                    <li><hr class="dropdown-divider"></li>
                </ul>
                </li> -->
            </ul>
            <form class="d-flex">
                <a href="login.php" class="btn btn-outline-secondary"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </form>
            </div>
        </div>
        </nav>
      </div>
      <div class="mt-5 mb-5">
        <div class="d-flex justify-content-center">
          <div class="d-block">
            <img src="gambar/gif2.gif" alt="icon" class="img-fluid"><br><br>
            <center><a href="register.php" class="btn btn-primary mb-5"><h3>Daftar Sekarang</h3></a></center>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-sm-6 col-sm-3 bg-primary rounded ms-1 me-1 p-5">
            <div class="thubnail">
              <!-- <div class="d-flex justify-content-center">
                <div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel" style="width:1000px;">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="gambar/gedung amik.jpg" class="d-block w-100 img-fluid" alt="gedung amik">
                    </div>
                    <div class="carousel-item">
                      <img src="gambar/info.jpg" class="d-block w-100 img-fluid" alt="info amik">
                    </div>
                    <div class="carousel-item">
                      <img src="gambar/fasilitas.jpg" class="d-block w-100 img-fluid" alt="fasilitas">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div> -->
              <div class="accordion accordion-flush mb-2" id="accordionFlushExample" style="margin-top:-100px;">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <i class="bi bi-recycle me-2"></i><h4>Alur Pendaftaran</h4>
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body"><img src="gambar/alur.jpeg" alt="alur pendaftaran" class="img-fluid"></div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <i class="bi bi-mortarboard-fill me-2"></i><h4>Program Studi</h4>
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <div class="d-block">
                        <table class="table">
                          <thead>
                              <tr>
                              <th scope="col">No</th>
                              <th scope="col">Nama Studi</th>
                              <th scope="col">Program</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            include "koneksi.php";
                              $setting = "SELECT * FROM setting";
                              $hasil_setting = mysqli_query($con, $setting);
                              while($np = mysqli_fetch_assoc($hasil_setting)){
                            ?>
                              <tr>
                              <th scope="row"><?= $np['id_setting'] ?></th>
                              <td><?= $np['nama_prodi'] ?></td>
                              <td><?= $np['program'] ?></td>
                              </tr>
                              <?php
                            }
                            ?>
                          </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <i class="bi bi-person-lines-fill me-2"></i><h4>Kontak Panitia</h4>
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body d-flex justify-content-center position:absolute">
                    <img src="gambar/contact.jpeg" class="img-fluid" alt="contact">
                  </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    <i class="bi bi-info-circle me-2"></i><h4>Info Persyaratan Pendaftaran</h4>
                    </button>
                  </h2>
                  <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
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
                  <h2 class="accordion-header" id="flush-headingfive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
                    <i class="bi bi-bookmark-star-fill me-2"></i><h4>Visi & Misi</h4>
                    </button>
                  </h2>
                  <div id="flush-collapsefive" class="accordion-collapse collapse" aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <div class="d-block">
                        <h4>Visi</h4>
                       <span>Menjadi Program Studi yang Unggul, Profesional, Inovatif dan Bermoral di Bidang Informatika tingkat Jawa Barat Pada Tahun <?= date('Y'); ?></span>
                       <h4>Misi</h4>
                       <table>
                         <tr>
                           <td class="align-text-top">1. </td>
                           <td>Menyelenggarakan pendidikan yang berkualitas dan profesional di bidang informatika</td>
                         </tr>
                         <tr>
                           <td class="align-text-top">2. </td>
                           <td>Melaksanakan penelitian untuk mengembangkan ilmu pengetahuan di bidang pendidikan dan pengajaran ilmu informatika</td>
                         </tr>
                         <tr>
                           <td class="align-text-top">3. </td>
                           <td>Melaksanakan pengabdian masyarakat untuk memecahkan berbagai masalah di masyarakat pada bidang informatika serta menyebarluaskan ilmu pengetahuan</td>
                         </tr>
                         <tr>
                           <td class="align-text-top">4. </td>
                           <td>Menjalin kerja sama dengan lembaga-lembaga yang relevan baik dalam maupun luar negeri</td>
                         </tr>
                       </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                    <i class="bi bi-calendar-check-fill me-2"></i><h4>Calender Tahunan AMIK PN Indramayu</h4>
                    </button>
                  </h2>
                  <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body d-flex justify-content-center">
                        <table class="table">
                          <thead>
                              <tr>
                              <th scope="col">NO</th>
                              <th scope="col">Nama Kegiatan</th>
                              <th scope="col">Pelaksanaan</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                              <th scope="row">1</th>
                              <td>Pendaftaran</td>
                              <td>Gel 1: 01 Mei - 25 Juni <?= date('Y'); ?></td>
                              </tr>
                              <tr>
                              <th scope="row"></th>
                              <td>Seleksi</td>
                              <td>Gel 1: 25 Juni <?= date('Y'); ?></td>
                              </tr>
                              <tr>
                              <th scope="row">2</th>
                              <td>Pendaftaran</td>
                              <td>Gel 2: 26 Juni - 23 Juli <?= date('Y'); ?></td>
                              </tr>
                              <tr>
                              <th scope="row"></th>
                              <td>Seleksi</td>
                              <td>Gel 2: 23 Juli <?= date('Y'); ?></td>
                              </tr>
                              <tr>
                              <th scope="row">3</th>
                              <td>Pendaftaran</td>
                              <td>Gel 3: 25 Juli - 20 Agustus <?= date('Y'); ?></td>
                              </tr>
                              <tr>
                              <th scope="row"></th>
                              <td>Seleksi</td>
                              <td>Gel 3: 20 Agustus <?= date('Y'); ?></td>
                              </tr>
                              <tr>
                              <th scope="row">4</th>
                              <td>Pengumuman</td>
                              <td>Pengumuman langsung setelah seleksi</td>
                              </tr>
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                    <i class="bi bi-star-half me-2"></i><h4>Fasilitas Kampus Kampus</h4>
                    </button>
                  </h2>
                  <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body d-flex justify-content-center position:absolute">
                  <div class="accordion-body d-flex justify-content-center">
                        <table class="table">
                          <tbody>
                              <tr>
                              <th scope="row"><i class="bi bi-building"></i></th>
                              <td>Gedung</td>
                              <td>Gedung milik sendiri, mempunyai 3 Lantai</td>
                              </tr>
                              <tr>
                              <th scope="row"><i class="bi bi-peace"></i></th>
                              <td>Pendingan Ruangan</td>
                              <td>Setiap Kelas/Ruang Ber AC dan dilengkapi Proyektor/Infocus</td>
                              </tr>
                              <tr>
                              <th scope="row"><i class="bi bi-pc-display"></i></th>
                              <td>Laboratorium</td>
                              <td>Laboratorium Komputer memiliki 3 Ruangan</td>
                              </tr>
                              <tr>
                              <th scope="row"><i class="bi bi-globe"></i></th>
                              <td>Internet</td>
                              <td>Akses Internet 24 Jam</td>
                              </tr>
                              <tr>
                              <th scope="row"><i class="bi bi-book-half"></i></th>
                              <td>Perpustakaan</td>
                              <td>Ruang Perpustakaan</td>
                              </tr>
                              <tr>
                              <th scope="row"><i class="bi bi-motherboard"></i></th>
                              <td>Laboratorium</td>
                              <td>Laboratorium Hardware</td>
                              </tr>
                          </tbody>
                        </table>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingEight">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                    <i class="bi bi-cash me-2"></i><h4>Biaya Perkuliahan</h4>
                    </button>
                  </h2>
                  <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body d-flex justify-content-center position:absolute">
                  <div class="accordion-body d-flex justify-content-center">
                  <table class="table">
                          <thead>
                              <tr>
                              <th scope="col">NO</th>
                              <th scope="col">Jenis Biaya</th>
                              <th scope="col">System Pembayaran</th>
                              <th scope="col">Jumlah</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                            include "koneksi.php";
                              $biaya = "SELECT * FROM biaya_kuliah";
                              $hasil_biaya = mysqli_query($con, $biaya);
                              while($b = mysqli_fetch_assoc($hasil_biaya)){
                            ?>
                              <tr>
                              <th scope="row"><?= $b['id_biaya'] ?></th>
                              <td><?= $b['jenis'] ?></td>
                              <td><?= $b['sistem'] ?></td>
                              <td><?= $b['jumlah'] ?></td>
                              </tr>
                              <?php
                            }
                            ?>
                          </tbody>
                        </table>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-5 mb-5 ms-2">
          <center><h4>Informasi Kuota Penerimaan dan Mahasiswa yang Telah Diterima</h4></center>
          <div class="d-flex justify-content-center mb-5 mt-5">
            <div class="me-2">
              <center>
              <div class="text-content-center bg-info rounded-circle" style="width:80px; height:80px;">
              <br>
                <center><h3>78</h3></center>
              </div>
              <h6>Kuota Pendaftaran</h6>
              </center>
            </div>
            <div class="me-2">
              <center>
              <div class="text-content-center bg-warning rounded-circle" style="width:80px; height:80px;">
              <br>
                <center><h3><?= $pendaftar; ?></h3></center>
              </div>
              <h6>Jumlah Pendaftar</h6>
              </center>
            </div>
            <div class="me-2">
              <center>
              <div class="text-content-center bg-success rounded-circle" style="width:80px; height:80px;">
              <br>
                <center><h3 class="text-white"><?= $lolos_seleksi; ?></h3></center>
              </div>
              <h6>Jumlah Lolos Seleksi</h6>
              </center>
            </div>
            <div class="me-2">
              <center>
              <div class="text-content-center bg-danger rounded-circle" style="width:80px; height:80px;">
              <br>
                <center><h3 class="text-white"><?= $gagal_seleksi; ?></h3></center>
              </div>
              <h6>Jumlah Gagal Seleksi</h6>
              </center>
            </div>
          </div>
        </div>
        <div class="mt-5 mb-5">
          <center><h4 class="mb-5">Keuntungan Kuliah di AMIK PN Indramayu</h4></center>
           <center>
             <hr>
            <div class="text-content-center bg-info rounded-circle" style="width:80px;">
              <center><img src="gambar/piala.png" alt="piala"></center>
            </div>
            <h6>Beasiswa secara rutin pertahun untuk mahasiswa berprestasi dari Kopertis dan Dirtjen Dikti</h6>
            <hr>
            </center>
            <center>
             <hr>
            <div class="text-content-center bg-success rounded-circle" style="width:80px;"">
              <img src="gambar/piala.png" alt="piala">
            </div>
            <h6>Biaya Perkuliahaan Relatif Terjangkau</h6>
            <hr>
            </center>
            <center>
             <hr>
            <div class="text-content-center bg-danger rounded-circle" style="width:80px;"">
              <img src="gambar/piala.png" alt="piala">
            </div>
            <h6>Lokasi Kampus Strategis</h6>
            <hr>
            </center>
        </div>
        <hr>
        <div class="mt-5 mb-5">
          <footer class="d-flex justify-content-center">
           <center> &copy Copyright AMIK PURNAMA NIAGA INDRAMAYU TA <?= date('Y'); ?></center>
          </footer>
        </div>
      </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>