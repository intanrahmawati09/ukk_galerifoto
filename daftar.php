<?php 
include 'koneksi.php';
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
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-5" >
                <div class="card">
                    <div class="card-body">
                        <h4 class="row justify-content-center">Daftar</h4>
                        <?php
                        // ambil data yang dikirimkan oleh form dengan method post
                        $submit=@$_POST['submit'];
                        if ($submit=='Daftar'){
                            $username=@$_POST['username'];
                            $password=md5(@$_POST['password']);
                            $email=@$_POST['email'];
                            $namalengkap=@$_POST['namalengkap'];
                            $alamat=@$_POST['alamat'];

                            // cek apakah ada username dan email yang sama
                            // jika ada yang sama maka daftar akan gagal karena username atau email sudah dipakai orang lain
                            $cek=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE username='$username' OR email='$email' "));
                            if($cek==0) {
                                mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password','$email','$namalengkap','$alamat')");
                                echo 'Daftar Berhasil!!, Silahkan Login!!';
                                echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
                            }else{
                                echo 'Maaf Akun Sudah Ada';
                                echo '<meta http-equiv="refresh" content="0.8; url=daftar.php">';
                            }
                        }
                    ?>
                    <form action="daftar.php" method="post">
                    <div class="input-group mb-3">
                                <label for="username" class="input-group-text"><i class="fa-solid fa-at fa-fw fa-lg"></i></label>
                                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username" name="username">
                            </div>
                            <div class="mb-3">                   
                                <div class="input-group">
                                    <label for="password" class="input-group-text"><i class="fa-solid fa-lock fa-fw fa-lg"></i></label>
                                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"> <!-- Added the name attribute -->
                                </div>
                            </div>
                            <div class="mb-3">                   
                                <div class="input-group">
                                    <label for="email" class="input-group-text"><i class="fa-solid fa-envelope fa-fw fa-lg"></i></label>
                                    <input type="email" class="form-control form-control-lg bg-light fs-6" placeholder="Masukkan Email" name="email"> <!-- Added the name attribute --> 
                                </div>
                            </div>
                            <div class="mb-3">                   
                                <div class="input-group">
                                    <label for="namalengkap" class="input-group-text"><i class="fa-solid fa-circle-user fa-fw fa-lg"></i></label>
                                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Masukkan Nama Lengkap Anda" name="namalengkap"> <!-- Added the name attribute --> 
                                </div>
                            </div>
                            <div class="mb-3">                   
                                <div class="input-group">
                                    <label for="alamat" class="input-group-text"><i class="fa-solid fa-address-book fa-fw fa-lg"></i></label>
                                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Masukkan Alamat Anda" name="alamat"> <!-- Added the name attribute --> 
                                </div>
                            </div>
                            <input type="submit" value="Daftar" class="btn btn-lg btn-primary w-100 fs-6" name="submit">
                </form>
                    </div>
                    <div class="text-center">
                    <p>Sudah punya akun? <a href="login.php" class="link-warning">Login Sekarang</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>