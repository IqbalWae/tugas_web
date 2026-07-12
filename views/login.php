<div class="login-wrapper">
    <div class=" login-card">
        <div class="login-header">
            <div class="logo-login"> 
                <img src="aset/images/Logo.png" alt="Logo" width="40">
            </div>
            <h2>Selamat Datang</h2>
            <h4>Silakan masuk ke akun Anda</h4>
        </div>

        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "<div class='alert alert-error'>Username atau password salah!</div>";
            } else if ($_GET['pesan'] == "belum_login") {
                echo "<div class='alert alert-warning'>Silakan login untuk mengakses fitur.</div>";
            } else if ($_GET['pesan'] == "daftar_sukses") {
                echo "<div class='alert alert-success'>Pendaftaran berhasil! Silakan login.</div>";
            }
        }
        ?>

        <form action="controllers/proses_login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required autocomplete="off">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                    <span class="toggle-password" onclick="fungsiTampilkanPassword()">
                        <img id="toggleIcon" src="/aset/images/tutup.png" alt="Lihat Password" width="20">
                    </span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-login">Login</button>
        </form>

        <div class="divider">atau</div>



        <div style="text-align: center; font-size: 14px;">
            <span style="color: var(--text-muted);">Belum punya akun?</span>
            <a href="index.php?page=register" style="color: var(--primary); font-weight: 600; text-decoration: none; margin-left: 4px;">Daftar Sekarang</a>
        </div>

        <div style="text-align: center; margin-top: 24px;">
            <a href="../index.php" style="color: var(--text-muted); font-size: 13px; font-weight: 500; text-decoration: none;">&larr; Kembali ke Beranda</a>
        </div>
    </div>
</div>

<script src="/aset/tampil_password.js"></script>