<?php
include "koneksi.php";
$banyak_data = "SELECT * FROM bukti_bayar";
$query_data = mysqli_query($con, $banyak_data);
if(mysqli_num_rows($query_data) >= 78){
  echo "<script>alert('maaf kuota pendaftaran sudah penuh');window.location.href='index.php';</script>";
}
?>
<?php
include "koneksi.php";

if(isset($_POST['signup'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $pass = $_POST['password'];
    $password = password_hash($pass, PASSWORD_DEFAULT);
    $level = "mahasiswa";
    // var_dump($password);
// var_dump($username, $email, $nohp, $password, $level);
    $data = mysqli_query($con,"SELECT * FROM user WHERE email='$email' ");

    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);
    
    if($cek > 0){
        echo "<script>alert('gagal brow!');</script>";
    }else{
        $sql = mysqli_query($con,"INSERT INTO user (nama, email, nohp, password, level)
        VALUES('$nama', '$email', '$nohp', '$password', '$level')");

        if($sql){
            echo "<script>alert('Sign Up Succes!');window.location.href='login.php'</script>";
        }else{
            echo "<script>alert('maaf anda gagal mendaftar, silahkan coba lagi!');</script>";
        }
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
    <title>Halaman Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      #elemen {
          background: #222;
          color: #fff;
          padding: 10px;
      }
body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-size: 1400px;
  background-image: url(gambar/bg_biru.webp);
  background-repeat: no-repeat;
}
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.link {
  color: aliceblue;
  text-decoration: none;
}
</style>
  </head>
  <body>
    <form action="" method="POST" class="form-signin">
        <div class="text-center">
            <h1 class="h3 mb-3 font-weight-normal text-center">Please Sign Up</h1>
        </div>
        <label for="inputName" class="sr-only">Full Name</label>
        <input type="text" id="inputName" class="form-control" name="nama" placeholder="Full Name"  required autofocus>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address"  required>
        <label for="inputNumber" class="sr-only">Number Phone</label>
        <input type="number" id="inputNumber" class="form-control" name="nohp" placeholder="Number Phone"  required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup">Sign Up</button>
        <label for="inputPassword" class="sr-only">Apakah kamu sudah punya akun?<a href="login.php" class="link"> Sign In Sekarang</a></label>
        <p class="mt-5 mb-3 text-center">© Copyright Amik Purnama Niaga</p>
    </form>
</body>
</html>