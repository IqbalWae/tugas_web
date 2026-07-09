<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Perpustakaan</title>
    <link rel="stylesheet" href="/aset/style.css">
    
    <style>
        .login-wrapper {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background-color: var(--surface);
            min-height: 100vh;
        }
        .login-card {
            width: 100%;
            max-width: 450px;
            padding: 40px 32px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 24px;
        }
        .login-header h2 { margin-bottom: 8px; font-size: 24px; }
        .login-header p { color: var(--text-muted); font-size: 14px; margin: 0; }
        
        .btn-login { width: 100%; margin-top: 16px; font-size: 15px; padding: 12px; }
        
        .password-container { position: relative; }
        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            color: var(--primary);
            user-select: none;
        }

        .alert {
            padding: 12px 16px;
            border-radius: var(--radius-md);
            font-size: 13px;
            margin-bottom: 24px;
            text-align: center;
            font-weight: 500;
        }
        .alert-error { background-color: #fee2e2; color: #b91c1c; border: 1px solid #fecaca; }
        
        .form-row {
            display: flex;
            gap: 16px;
        }
        .form-row .form-group { width: 100%; }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="card login-card">
            <div class="login-header">
                <h2>Buat Akun Baru</h2>
                <p>Isi data di bawah ini untuk mendaftar</p>
            </div>

            <?php 
            if(isset($_GET['pesan']) && $_GET['pesan'] == "gagal"){
                echo "<div class='alert alert-error'>Pendaftaran gagal! Silakan coba lagi.</div>";
            }
            ?>

            <form action="../controllers/proses_register.php" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="no_induk">No. Induk / NIS</label>
                        <input type="text" id="no_induk" name="no_induk" placeholder="Contoh: 2023435..." required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No. Telepon</label>
                        <input type="text" id="no_telp" name="no_telp" placeholder="Contoh: 0812...">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat..." style="resize: vertical;"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="username">Username (Untuk Login)</label>
                    <input type="text" id="username" name="username" placeholder="Buat username" required autocomplete="off">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" placeholder="Buat password" required>
                        <span class="toggle-password" id="toggleText" onclick="fungsiTampilkanPassword()">Lihat</span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-login">Daftar Sekarang</button>
            </form>
            
            <div style="text-align: center; margin-top: 24px;">
                <span style="color: var(--text-muted); font-size: 14px;">Sudah punya akun?</span>
                <a href="login.php" style="color: var(--primary); font-size: 14px; font-weight: 600; text-decoration: none; margin-left: 4px;">Login di sini</a>
            </div>
        </div>
    </div>

    <script>
        function fungsiTampilkanPassword() {
            var inputPassword = document.getElementById("password");
            var teksTombol = document.getElementById("toggleText");
            if (inputPassword.type === "password") {
                inputPassword.type = "text";
                teksTombol.innerText = "Sembunyikan";
            } else {
                inputPassword.type = "password";
                teksTombol.innerText = "Lihat";
            }
        }
    </script>
</body>
</html>