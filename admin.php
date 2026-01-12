<?php
session_start();

// proteksi halaman
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

// ambil data peserta
$query  = "SELECT * FROM peserta_event ORDER BY tanggal_daftar DESC";
$result = mysqli_query($conn, $query);

// cek query
if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        padding-top: 90px;
    }

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
    <header>
        <nav>
            <a href="#" class="logo" style="color: #2563eb;">EventKu</a>
            <div class="nav-links">
                <a href="index.html">Beranda</a>
                <a href="jadwal.html">Jadwal</a>
                <span class="text-black">
                    <?= $_SESSION['username']; ?> |
                    <a href="logout.php" class="text-black text-decoration-none">Logout</a>
                </span>
            </div>
        </nav>
    </header>

<!-- <nav class="navbar navbar-dark bg-primary mb-4">
    <div class="container-fluid">
        <span class="navbar-brand">Admin Panel</span>
        <span class="text-white">
            <?= $_SESSION['username']; ?> |
            <a href="logout.php" class="text-white text-decoration-none">Logout</a>
        </span>
    </div>
</nav> -->

<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="mb-3">Data Peserta Event</h4>
            <a href="cetak_pdf.php" target="_blank" class="btn btn-danger mb-3">
    Cetak PDF
</a>

            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Event</th>
                        <th>Alasan</th>
                        <th>Foto</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['no_hp'] ?></td>
                        <td><?= $row['pilihan_event'] ?></td>
                        <td><?= $row['alasan'] ?></td>
                        <td>
                            <?php if (!empty($row['foto'])) { ?>
                                <img src="uploads/<?= htmlspecialchars($row['foto']); ?>" width="60">
                            <?php } else { ?>
                                -
                            <?php } ?>
                        </td>
                        <td><?= $row['tanggal_daftar'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <a href="hapus.php?id=<?= $row['id']; ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin hapus data?')">
                            Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>
