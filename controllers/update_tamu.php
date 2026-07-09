<?php

require_once "../config/koneksi.php";

$id    = $_POST['id'];
$nama  = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$sql = "UPDATE tamu
        SET nama='$nama',
            email='$email',
            pesan='$pesan'
        WHERE id_tamu='$id'";

if(mysqli_query($koneksi,$sql)){

    header("Location: ../index.php?page=tampil_tamu_table");
    exit;

}else{

    die(mysqli_error($koneksi));

}
// include "../config/koneksi.php"; // Menggunakan koneksi perpustakaan

// $id    = $_POST['id'];
// $nama  = $_POST['nama'];
// $email = $_POST['email'];
// $pesan = $_POST['pesan'];

// $update = "UPDATE tamu SET nama='$nama', email='$email', pesan='$pesan' WHERE id_tamu='$id'";
// $hasil = mysqli_query($koneksi, $update);

// if ($hasil){
//     header("location:index.php?page=tampil_tamu_table"); // Redirect disesuaikan
// } else {
//     echo "Update data gagal";
// }
?>