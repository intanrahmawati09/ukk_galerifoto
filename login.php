<?php 
include 'koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./assets/style.css">
    <title>UKK 2024 Login | Website Galeri Foto</title>
</head>
<body>
<!-- <body style="background-color: #67cece;"> -->
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-5" >
                <div class="card">
                    <div class="card-body">
                        
                        <h4 class="row justify-content-center">Login</h4>
                    <?php
                         // ambil data yang dikirimkan oleh form dengan method post
                         $submit=@$_POST['submit'];
                         if ($submit=='Login'){
                            $username=$_POST['username'];
                            $password=md5($_POST['password']);
                            // cek apakah username dan password yang dimasukkan ke dalam input ada di database
                            $sql=mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
                            $cek=mysqli_num_rows($sql);
                            if($cek!=0){
                                // ambil data dari database untuk membuat session
                                $sesi=mysqli_fetch_array($sql);
                                echo 'Login Berhasil!!';
                                $_SESSION['username']=$sesi['username'];
                                $_SESSION['userid']=$sesi['userid'];
                                $_SESSION['email']=$sesi['email'];
                                $_SESSION['namalengkap']=$sesi['namalengkap'];
                                echo '<meta http-equiv="refresh" content="0.8; url=./">';
                            }else{
                                echo 'LoginGagal!!!';
                                echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
                            }
                         }
                    ?>
                        <form action="login.php" method="post">
                            <div class="input-group mb-3">
                                <label for="username" class="input-group-text"><i class="fa-solid fa-at fa-fw fa-lg"></i></label>
                                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username" name="username">
                            </div>
                            <div class="mb-3">                   
                                <div class="input-group">
                                    <label for="password" class="input-group-text"><i class="fa-solid fa-lock fa-fw fa-lg"></i></label>
                                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"> <!-- Added the name attribute -->
                                    <label class="input-group-text" style="cursor: pointer;" id="password-visibility-toggle"><i class="fa-solid fa-eye fa-fw"></i></label> <!-- Closed the label tag -->
                                </div>
                            </div>
                            <input type="submit" value="Login" class="btn btn-lg btn-primary w-100 fs-6" name="submit">
                        </form>
                    </div>
                    <div class="text-center">
                        <p>Belum Punya Akun? <a href="daftar.php" class="link-warning">Daftar</a></p>
                        <!-- <p>Atau klik <a href="index.php" class="link-warning">Kembali</a></p> -->
                    </div>
                </div>
            </div>
        </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const passwordVisibilityToggle = document.getElementById('password-visibility-toggle');

        passwordVisibilityToggle.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordVisibilityToggle.innerHTML = '<i class="fa-solid fa-eye-slash fa-fw"></i>';
            } else {
                passwordInput.type = 'password';
                passwordVisibilityToggle.innerHTML = '<i class="fa-solid fa-eye fa-fw"></i>';
            }
        });
    </script>
</body>
</html>

