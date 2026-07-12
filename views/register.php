<div class="login-wrapper">
    <div class="card login-card register-card">
        <div class="login-header">
            <div class="logo-login">
                <img src="aset/images/Logo.png" alt="Logo" width="40">
            </div>
            <h2>Buat Akun Baru</h2>
            <h4>Isi data di bawah ini untuk mendaftar</h4>
        </div>

        <?php
        if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal") {
            echo "<div class='alert alert-error'>Pendaftaran gagal! Silakan coba lagi.</div>";
        }
        ?>

        <form action="controllers/proses_register.php" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="no_induk">No. Induk</label>
                    <input type="text" id="no_induk" name="no_induk" placeholder="Masukkan no. induk" required>
                </div>
                <div class="form-group">
                    <label for="no_telp">No. Telepon</label>
                    <input type="text" id="no_telp" name="no_telp" placeholder="Masukkan no. telepon">
                </div>
            </div>

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Lengkap</label>
                <textarea id="alamat" name="alamat" placeholder="Masukkan alamat" rows="2" style="resize: vertical;"></textarea>
            </div>

            <div class="form-group">
                <label for="username">Username (Untuk Login)</label>
                <input type="text" id="username" name="username" placeholder="Buat username" required autocomplete="off">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Buat password" required>
                    <span class="toggle-password" id="toggleText" onclick="TampilkanPassword()">Lihat</span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-login">Daftar Sekarang</button>
        </form>

        <div style="text-align: center; margin-top: 24px;">
            <span style="color: var(--text-muted); font-size: 14px;">Sudah punya akun?</span>
            <a href="index.php?page=login" style="color: var(--primary); font-size: 14px; font-weight: 600; text-decoration: none; margin-left: 4px;">Login di sini</a>
        </div>
    </div>
</div>
<script src="/aset/tampil_password.js"></script>