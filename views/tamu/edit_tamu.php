<?php

$id = $_GET['id'];

$sql = "SELECT * FROM tamu WHERE id_tamu='$id'";
$hasil = mysqli_query($koneksi, $sql);

$data = mysqli_fetch_assoc($hasil);

?>

<div class="card" style="max-width:600px; margin:auto;">

    <h2>Edit Data Tamu</h2>

    <form method="POST" action="controllers/update_tamu.php">

        <input type="hidden" name="id" value="<?= $data['id_tamu']; ?>">

        <div class="form-group">
            <label>Nama</label>
            <input
                type="text"
                name="nama"
                value="<?= $data['nama']; ?>"
                required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input
                type="email"
                name="email"
                value="<?= $data['email']; ?>"
                required>
        </div>

        <div class="form-group">
            <label>Pesan</label>
            <textarea
                name="pesan"
                rows="5"
                required><?= $data['pesan']; ?></textarea>
        </div>

        <button class="btn btn-primary">
            Update Data
        </button>

    </form>

</div>