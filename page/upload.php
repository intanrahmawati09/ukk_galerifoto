<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card mt-3">
            <div class="card">
                <div class="card-body">
                <div class="card mb-2">
               <h4 class="text-center"><strong>Upload Fotomu</h4></strong>
               </div>
                    <?php
                    // ambil data dari form
                    $submit=@$_POST['submit'];
                    $fotoid=@$_GET['fotoid'];
                    if ($submit=='Simpan') {
                        $judulfoto=@$_POST['judulfoto'];
                        $deskripsifoto=@$_POST['deskripsifoto'];
                        $tanggalunggah=date('Y-m-d');
                        $lokasifile=@$_FILES['lokasifile']['name'];
                        $tmp_foto=@$_FILES['lokasifile']['tmp_name'];
                        $albumid=@$_POST['albumid'];
                        $userid=@$_SESSION['userid'];
                        if (move_uploaded_file($tmp_foto, 'uploads/'.$lokasifile)) {
                            $insert=mysqli_query($conn, "INSERT INTO foto VALUES('','$judulfoto','$deskripsifoto','$tanggalunggah','$lokasifile','$albumid','$userid')");
                            echo 'Gambar Berhasil Disimpan';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                        }else{
                            echo 'Gambar Gagal Disimpan';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                        }
                    }elseif(isset($_GET['edit'])){
                        if($submit=="Ubah"){
                        $judulfoto=@$_POST['judulfoto'];
                        $deskripsifoto=@$_POST['deskripsifoto'];
                        $tanggalunggah=date('Y-m-d');
                        $lokasifile=@$_FILES['lokasifile']['name'];
                        $tmp_foto=@$_FILES['lokasifile']['tmp_name'];
                        $albumid=@$_POST['albumid'];
                        $userid=@$_SESSION['userid'];
                        if(strlen($lokasifile)==0){
                            $update=mysqli_query($conn, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggalunggah='$tanggalunggah', albumid='$albumid' WHERE fotoid='$fotoid'");
                            if($update){
                                echo 'Gambar Berhasil Diubah';
                                echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                            }else{
                                echo 'Gambar Gagal Diubah';
                                echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                            }
                        }else{
                            if(move_uploaded_file($tmp_foto, "uploads/".$lokasifile)){
                                $update=mysqli_query($conn, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', lokasifile='$lokasifile', tanggalunggah='$tanggalunggah', albumid='$albumid' WHERE fotoid='$fotoid'");
                                if($update){
                                    echo 'Gambar Berhasil Diubah';
                                    echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                                }else{
                                    echo 'Gambar Gagal Diubah';
                                    echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                                }
                            }
                        }
                    }
                }elseif(isset($_GET['hapus'])){
                    $delete=mysqli_query($conn, "DELETE FROM foto WHERE fotoid='$fotoid'");
                    if($delete){
                        echo 'Gambar Berhasil Dihapus';
                        echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                    }else{
                        echo 'Gambar Gagal Dihapus';
                        echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                    }
                }
                    // mencari data album
                    $album=mysqli_query($conn, "SELECT * FROM album");
                    $val=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM foto WHERE fotoid='$fotoid'"));
                    ?>
                    <?php if(!isset($_GET['edit']) && !isset($_GET['hapus'])): ?>
                    <form action="?url=upload" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul Foto</label>
                        <input type="text" class="form-control" required name="judulfoto">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Foto</label>
                        <textarea name="deskripsifoto" class="form-control" required cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Piih Gambar</label>
                        <input type="file" name="lokasifile" class="form-control" required>
                        <small class="text-danger">File harus berupa: *.jpg, *.jpeg *.png, *.gif</small>
                    </div>
                    <div class="form-group">
                        <label>Pilih Album</label>
                        <select name="albumid" class="form-select">
                            <?php foreach($album as $albums): ?>
                                <option value="<?= $albums['albumid'] ?>"><?= $albums['namaalbum'] ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="submit" value="Simpan" name="submit" class="btn btn-primary my-3">
                    </form>
                    <?php elseif(isset($_GET['edit'])): ?>
                        <form action="?url=upload&&edit&&fotoid=<?= $val['fotoid'] ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul Foto</label>
                        <input type="text" class="form-control" value="<?= $val['judulfoto'] ?>"  required name="judulfoto">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Foto</label>
                        <textarea name="deskripsifoto" class="form-control" required cols="30" rows="5"><?= $val['deskripsifoto'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Piih Gambar</label>
                        <input type="file" name="lokasifile" class="form-control" >
                        <small class="text-danger">File harus berupa: *.jpg, *.jpeg *.png, *.gif</small>
                    </div>
                    <div class="form-group">
                        <label>Pilih Album</label>
                        <select name="albumid" class="form-select">
                            <?php foreach($album as $albums): ?>
                               <?php if($albums['albumid']==$val['albumid']): ?>
                                <option value="<?= $albums['albumid'] ?>" selected><?= $albums['namaalbum'] ?></option>
                                <?php else: ?>
                                    <option value="<?= $albums['albumid'] ?>"><?= $albums['namaalbum'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="submit" value="Ubah" name="submit" class="btn btn-warning my-3">
                    </form>
                    <?php endif; ?>
                </div>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="row">
            <?php
                $fotos=mysqli_query($conn, "SELECT * FROM foto WHERE userid='".@$_SESSION['userid']."'");
                foreach($fotos as $foto):
            ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card mt-3">
                        <img src="uploads/<?= $foto['lokasifile'] ?>" class="object-fit-cover" style="aspect-ratio: 10/9" >
                        <div class="card-body">
                            <p class="small"><?= $foto['judulfoto'] ?></p>
                    <!-- <h5 class="card-title"><?= $foto['judulfoto'] ?></h5> -->
                    <a href="?url=upload&&edit&&fotoid=<?= $foto['fotoid'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?url=upload&&hapus&&fotoid=<?= $foto['fotoid'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                </div>
                </div>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>