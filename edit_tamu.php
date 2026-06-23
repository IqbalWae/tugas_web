<h3>Edit Tamu</h3>
<?php
include_once 'koneksi.php'; // Menggunakan file koneksi utama

$id = $_GET['id'];

$edit = "SELECT * FROM tamu WHERE id_tamu = '$id'";
$hasil = mysqli_query($koneksi, $edit);
$data = mysqli_fetch_array($hasil);

echo "<form method='GET' action='update_tamu.php'>
        <input type='hidden' name='id' value='$id'>
        
        Nama : <br><input type='text' name='nama' value='$data[nama]'><br><br>
        Email : <br><input type='text' name='email' value='$data[email]'><br><br>
        Pesan : <br><textarea name='pesan' rows='5' cols='30'>$data[pesan]</textarea><br><br>
        <input type='submit' value='Update Data'>
</form>";
?>