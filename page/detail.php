<?php
$details=mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid WHERE foto.fotoid='$_GET[id]'");
$data=mysqli_fetch_array($details);
$likes=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$_GET[id]'"));
$cek=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$_GET[id]' AND userid='".@$_SESSION['userid']."'"));
?>

<!-- kodingan ini masih untukyang login saja yang bisa like dan komen ya -->

<div class="container">
    <div class="row">
        <div class="col-6 mt-2">
            <div class="card mb-2">
            <img src="uploads/<?= $data['lokasifile'] ?>" alt="<?= $data['judulfoto']?>" class="object-fit-cover">
            <div class="card-body">  
            <h3 class="card-title"><?= $data['judulfoto'] ?><a href="<?php if(isset($_SESSION['userid'])){echo '?url=like&&id='.$data['fotoid'].'';}else{echo 'login.php';} ?>" class="btn btn-sm <?php if($cek==0){ echo "text-secondary"; }else{ echo "text-danger"; } ?>"><i class="fa-solid fa-fw fa-heart"></i> <?= $likes ?></a></h3
            <small class="text-muted mb-3"><strong>by:</strong> <?= $data['username'] ?>, <?= $data['tanggalunggah']?></small>
            <p><strong>Deskripsi: </strong><?= $data['deskripsifoto']?></p>
            <?php
            // ambil data komentar
            $submit=@$_POST['submit'];
            if ($submit=='Kirim') {
                $fotoid=@$_POST['fotoid'];
                $userid=@$_SESSION['userid'];
                $isikomentar=@$_POST['isikomentar'];
                $tanggalkomentar= date('Y-m-d');

                $komen=mysqli_query($conn, "INSERT INTO komentarfoto VALUES('','$fotoid','$userid','$isikomentar','$tanggalkomentar')");
                header("Location: ?url=detail&&id=$fotoid");
            }
            ?>
            <form action="?url=detail" method="post">
                <div class="form-group d-flex flex-row">
                    <input type="hidden" name="fotoid" value="<?= $data['fotoid'] ?>">
                    <a href="?url=home" class="btn btn-secondary">Kembali</a>
                    <?php if(isset($_SESSION['userid'])):?>
                    <input type="text" name="isikomentar" class="form-control" placeholder="Masukan Komentar...">
                    <input type="submit" value="Kirim" name="submit" class="btn btn-secondary">
                    <?php endif;?>
                </div>
            </form>
            </div>
            </div>
        </div>
        
            <div class="col-6">
               <?php
                $komen=mysqli_query($conn, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid INNER JOIN foto ON komentarfoto.fotoid=foto.fotoid WHERE komentarfoto.fotoid='$_GET[id]'");
               foreach($komen as $komens):
               ?>
               <p class="mb-0 fw-bold"><?= $komens['username'] ?></p>
               <p class="mb-"><?= $komens['isikomentar'] ?></p>
               <p class="text-muted-small mb-0"><?= $komens['tanggalkomentar']?></p>
               <hr>
               <?php endforeach; ?>
</div>
    </div>
    </div>
</div>