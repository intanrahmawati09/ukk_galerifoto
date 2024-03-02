<?php
// cek apakah foto dengan di detail.php sudahdilike dengan user yang login
$cek=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$_GET[id]' AND userid='$_SESSION[userid]'"));
if($cek==0){
    // ambil data yang dikirim melalui url
    $fotoid=@$_GET['id'];
    $userid=@$_SESSION['userid'];
    $tanggallike= date('Y-m-d');
    $like=mysqli_query($conn, "INSERT INTO likefoto VALUES('','$fotoid','$userid','$tanggallike')");
    header("Location: ?url=detail&&id=$fotoid");
}else{
    // jika user yang login sudah like foto ini maka lakukan dislike
    $fotoid=@$_GET['id'];
    $userid=@$_SESSION['userid'];
    $dislike=mysqli_query($conn, "DELETE FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
    header("Location: ?url=detail&&id=$fotoid");
}
?>