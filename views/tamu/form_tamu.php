<div class="card" style="max-width:600px; margin:0 auto;">
    <h2 style="margin-bottom:24px;">Form Buku Tamu</h2>

    <form method="POST" action="controllers/input_tamu.php">

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" required>
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Pesan / Kesan</label>
            <textarea name="pesan" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%;">
            Simpan Pesan
        </button>

    </form>
</div>