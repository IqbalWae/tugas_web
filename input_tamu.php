<?php
include "koneksi.php";

$nama = $_GET['nama'];
$email = $_GET['email'];
$pesan = $_GET['pesan'];

$input = "INSERT INTO tamu (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
$hasil = mysqli_query($koneksi, $input); 

if ($hasil){
    // Mengalihkan kembali ke kerangka utama
    header("location:index.php?page=tampil_tamu_table");
}else{
    echo 'Data tidak berhasil disimpan';
}
?>