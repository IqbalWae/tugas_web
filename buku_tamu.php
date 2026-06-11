<h2>Buku Tamu</h2>
<p>Silakan tinggalkan pesan dan kesan Anda pada form di bawah ini:</p>

<form action="" method="POST">
    <label for="nama">Nama Lengkap:</label><br>
    <input type="text" id="nama" name="nama" required><br><br>
    
    <label for="pesan">Pesan/Kesan:</label><br>
    <textarea id="pesan" name="pesan" rows="4" cols="30" required></textarea><br><br>
    
    <input type="submit" name="submit_tamu" value="Kirim Pesan">
</form>

<?php
// Proses sederhana saat tombol submit ditekan
if(isset($_POST['submit_tamu'])){
    $nama_tamu = htmlspecialchars($_POST['nama']);
    echo "<br><div style='color: green;'>Terima kasih <b>$nama_tamu</b>, pesan Anda telah berhasil dikirim!</div>";
}
?>