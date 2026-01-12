<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Event</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS sendiri (opsional) -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --secondary-color: #64748b;
            --text-dark: #1e293b;
            --text-light: #f8fafc;
            --bg-light: #ffffff;
            --bg-alt: #f1f5f9;
        }

        header {
            background-color: var(--bg-light);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .btn-login {
            padding: 0.5rem 1.5rem;
            border: 2px solid var(--primary-color);
            color: var(--primary-color) !important;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background-color: var(--primary-color);
            color: white !important;
        }
    </style>
<body class="bg-light">
<!-- NAVBAR -->
    <header>
        <nav>
            <a href="#" class="logo">EventKu</a>
            <div class="nav-links">
                <a href="index.html">Beranda</a>
                <a href="jadwal.html">Jadwal</a>
                <a href="login.php" class="btn-login">Masuk</a>
            </div>
        </nav>
    </header>
    <!-- FORM -->
    <div class="container" style="margin-top: 120px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center mb-4">Form Pendaftaran Event</h4>
                        <form action="proses_daftar.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No Handphone</label>
                                <input type="text" name="no_hp" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pilih Event</label>
                                <select name="pilihan_event" class="form-select">
                                    <option value="">-- Pilih Event --</option>
                                    <option value="Seminar Web">Seminar Web</option>
                                    <option value="Workshop UI/UX">Workshop UI/UX</option>
                                    <option value="Lomba Coding">Lomba Coding</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alasan Mengikuti Event</label>
                                <textarea name="alasan" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Upload Foto</label>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                                <small class="text-muted">
                                    Format JPG / PNG, maksimal 2MB
                                </small>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                Daftar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- JS -->
<script src="assets/js/validasi.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
