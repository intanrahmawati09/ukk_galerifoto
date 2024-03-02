<div class="container">
    <div class="row">
    <div class="col-4">
            <div class="card mt-3">
            <div class="card">
                <div class="card-body">
                <div class="card mb-2">
               <h4 class="text-center"><strong>Buat Album</h4></strong>
               </div>
                    <?php
                        // ambil data yang dikirim oleh form
                        $submit=@$_POST['submit'];
                        $albumid=@$_GET['albumid'];
                        if ($submit=='Simpan') {
                        $namaalbum=@$_POST['namaalbum'];
                        $deskripsi=@$_POST['deskripsi'];
                        $tanggaldibuat=date('Y-m-d');
                        $userid=@$_SESSION['userid'];
                        $insert=mysqli_query($conn, "INSERT INTO album VALUES('','$namaalbum','$deskripsi','$tanggaldibuat','$userid')");
                        if ($insert) {
                            echo 'Berhasil Membuat Album';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=album">';
                        }else{
                            echo 'Gagal Membuat Album';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=album">';
                        }
                    }elseif(isset($_GET['edit'])){
                        if($submit=='Ubah'){
                        $namaalbum=@$_POST['namaalbum'];
                        $deskripsi=@$_POST['deskripsi'];
                        $tanggaldibuat=date('Y-m-d');
                        $userid=@$_SESSION['userid'];
                        $update=mysqli_query($conn, "UPDATE album SET namaalbum='$namaalbum', deskripsi=' $deskripsi' WHERE albumid='$albumid'");
                        if($update){
                            echo 'Berhasil Mengubah Album';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=album">';
                        }else{
                            echo 'Gagal Mengubah Album';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=album">';
                        }
                        }
                    }elseif(isset($_GET['hapus'])){
                        $hapus=mysqli_query($conn, "DELETE FROM album WHERE albumid='$albumid'");
                        if($hapus){
                            echo 'Berhasil Menghapus Album';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=album">';
                        }else{
                            echo 'Gagal Menghapus Album';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=album">';
                        }
                    }
                    $val=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM album WHERE albumid='$albumid' "));

                    // mencari data album agar di user lain bisa diakses/ada
                    $album=mysqli_query($conn, "SELECT * FROM album");
                    ?>
                   <?php if(!isset($_GET['edit'])): ?>
                    <form action="?url=album" method="post">
                    <div class="form-group">
                        <label>Nama Album</label>
                        <input type="text" class="form-control" required name="namaalbum">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required cols="30" rows="5"></textarea>
                    </div>
                    <input type="submit" value="Simpan" name="submit" class="btn btn-primary my-3">
                    </form>
                    <?php elseif(isset($_GET['edit'])): ?>
                    <form action="?url=album&&edit&&albumid=<?= $val['albumid'] ?>" method="post">
                    <div class="form-group">
                        <label>Nama Album</label>
                        <input type="text" class="form-control" value="<?= $val['namaalbum'] ?>" required name="namaalbum">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Album</label>
                        <textarea name="deskripsi" class="form-control" required cols="30" rows="5"><?= $val['deskripsi'] ?></textarea>
                    </div>
                    <input type="submit" value="Ubah" name="submit" class="btn btn-info my-3">
                    </form>
                    <?php endif; ?>
                </div>
                </div>
            </div>
        </div>

    <div class="col-8">
       <div class="card mt-3">
         <div class="card-body">
           <table class="table table-hovered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Album</th>
                        <th>Deskripsi Album</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        $userid=@$_SESSION['userid'];
                        $albums=mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
                        foreach($albums as $album):
                    ?>

                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $album['namaalbum'] ?></td>
                        <td><?= $album['deskripsi'] ?></td>
                        <td><?= $album['tanggaldibuat'] ?></td>
                        <td>
                            <a href="?url=album&&edit&&albumid=<?= $album['albumid'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="?url=album&&hapus&&albumid=<?= $album['albumid'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                            <a href="?url=kategori&&albumid=<?= $album['albumid'] ?>" class="btn btn-sm btn-success">Lihat Foto</a>
                        </td>
                    </tr>
                    
                    <?php endforeach; ?>
                </tbody>
         </table>
       </div>
      </div>
    </div>
</div>