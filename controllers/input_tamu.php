<?php
require_once "../config/koneksi.php";

// $nama = $_GET['nama'];
// $email = $_GET['email'];
// $pesan = $_GET['pesan'];

$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

// $input = "INSERT INTO tamu (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
// $hasil = mysqli_query($koneksi,$input); 

$sql = "INSERT INTO tamu(nama,email,pesan)
        VALUES('$nama','$email','$pesan')";

if (mysqli_query($koneksi,$sql)){
    // Mengalihkan kembali ke kerangka utama
    // header("location:index.php?page=tampil_tamu_table");
    header("Location: ../index.php?page=tampil_tamu_table");
    exit;
}else{
    echo mysqli_error($koneksi);

    // echo 'Data tidak berhasil disimpan';
}
?>