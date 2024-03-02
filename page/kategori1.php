<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKK 2024 | Website Galeri Foto</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesom.com/4592f70558.js" crossorigin="anonymous"></script>
    <style>
        .box {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            width: 18rem; /* Adjust the width as needed */
            margin-bottom: 20px;
        }

        .card img {
            height: 200px; /* Set a fixed height for the images */
            object-fit: cover;
        }

    </style>
</head>
<body>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>foto</h3>
            <div class="box">
                <?php
                $albumid = isset($_GET['albumid']) ? $_GET['albumid'] : 0;
                $query = "SELECT * FROM album,foto,user WHERE foto.userid=user.userid AND foto.albumid=album.albumid AND  foto.albumid = $albumid";
                $foto = mysqli_query($conn, $query);

                if (mysqli_num_rows($foto) > 0) {
                    while ($f = mysqli_fetch_array($foto)) {
                        ?>
                        <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="row">
                        <div class="card mt-3">
                            <img src="uploads/<?= $f['lokasifile'] ?>" class="card-img-top" style="aspect-ratio: 10/9" >
                            <div class="card-body">
                                <!-- <h5 class="card-title"><?= $f['judulfoto'] ?></h5> -->
                                <p class="card-text text-muted"><i><strong>by: </strong><?= $f['username'] ?>, <?= $f['tanggalunggah'] ?></p></i>
                            </div>
                        </div>
                        </div>
                        </div>

                        
                        <?php
                    }
                } else {
                    ?>
                    <p>Foto tidak ada dalam album ini</p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
