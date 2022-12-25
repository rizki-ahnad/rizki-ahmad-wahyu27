<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $result= mysqli_query($con,"SELECT * FROM user WHERE email='$email'");
  if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
   if (password_verify($password, $row['password'])){
        if($row['level']==="Direktur"){
            $_SESSION['email']=$row['email'];
            $_SESSION['username']=$row['nama'];
            $_SESSION['nohp']=$row['nohp'];
            $_SESSION['password']=$row['password'];
            $_SESSION['id_user']=$row['id_user'];
            $_SESSION['level']= "Direktur";
            header("location:halaman_direktur.php");
        }else if($row['level']==="admin"){
            $_SESSION['email']=$row['email'];
            $_SESSION['username']=$row['nama'];
            $_SESSION['nohp']=$row['nohp'];
            $_SESSION['password']=$row['password'];
            $_SESSION['id_user']=$row['id_user'];
            $_SESSION['level']= "admin";
            header("location:halaman_admin.php");
        }else if($row['level']==="mahasiswa"){
            $_SESSION['email']=$row['email'];
            $_SESSION['username']=$row['nama'];
            $_SESSION['nohp']=$row['nohp'];
            $_SESSION['password']=$row['password'];
            $_SESSION['id_user']=$row['id_user'];
            $_SESSION['level']= "mahasiswa";
            header("location:halaman_mahasiswa.php");
        }else{
            header("location:admin/index.php?pesan=gagal");
        }
    echo "<script>alert('Login Berhasil');window.location='index.php';</script>";
   }else{
    echo "<script>alert('Login Gagal password anda salah');</script>";
   }
  }
  else {
  echo "<script>alert('Login Gagal password atau email anda salah');</script>";
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
    <title>Halaman Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  </head>
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
  background-size: 1400px;
  padding-top: 40px;
  padding-bottom: 40px;
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
 <body>
    <form action="" method="POST" class="form-signin">
        <div class="text-center">
            <img class="mb-4" src="gambar/logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>
        </div>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
        <label for="inputPassword" class="sr-only">Apakah kamu belum punya akun?<a href="register.php" class="link"> Sign Up Sekarang</a></label>
        <p class="mt-5 mb-3 text-center">© Copyright Amik Purnama Niaga</p>
    </form>
</body>
</html>