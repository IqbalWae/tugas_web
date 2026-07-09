<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>
    <link rel="stylesheet" href="/aset/style.css">
    <link rel="stylesheet" href="/aset/login.css">
    <link rel="stylesheet" href="https://cloudflare.com">

</head>

<body>

    <div class="login-wrapper">
        <div class="card login-card">
            <div class="login-header">
                <h2>Selamat Datang</h2>
                <p>Silakan masuk ke akun Anda</p>
            </div>

            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<div class='alert alert-error'>Username atau password salah!</div>";
                } else if ($_GET['pesan'] == "belum_login") {
                    echo "<div class='alert alert-warning'>Silakan login untuk meminjam buku.</div>";
                } else if ($_GET['pesan'] == "daftar_sukses") {
                    // Tambahkan ini agar warna alertnya hijau (sukses)
                    echo "<div class='alert' style='background-color: #d1fae5; color: #047857; border: 1px solid #a7f3d0;'>Pendaftaran berhasil! Silakan login.</div>";
                }
            }
            ?>

            <form action="../controllers/proses_login.php" method="POST">
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
                <a href="register.php" style="color: var(--primary); font-weight: 600; text-decoration: none; margin-left: 4px;">Daftar Sekarang</a>
            </div>

            <div style="text-align: center; margin-top: 24px;">
                <a href="../index.php" style="color: var(--text-muted); font-size: 13px; font-weight: 500; text-decoration: none;">&larr; Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <script src="/aset/tampil_password.js"></script>


</body>

</html>