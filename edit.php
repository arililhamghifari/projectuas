<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$id = $_GET['id'];
$query = "SELECT * FROM peserta_event WHERE id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-body">

                    <h4 class="text-center mb-4">Edit Data Peserta</h4>

                    <form action="update.php" method="POST">

                        <input type="hidden" name="id" value="<?= $data['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control"
                                   value="<?= htmlspecialchars($data['nama']); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?= htmlspecialchars($data['email']); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control"
                                   value="<?= htmlspecialchars($data['no_hp']); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Event</label>
                            <select name="pilihan_event" class="form-select">
                                <option value="Seminar Web" <?= $data['pilihanevent']=="Seminar Web"?'selected':''; ?>>Seminar Web</option>
                                <option value="Workshop UI/UX" <?= $data['pilihan_event']=="Workshop UI/UX"?'selected':''; ?>>Workshop UI/UX</option>
                                <option value="Lomba Coding" <?= $data['pilihan_event']=="Lomba Coding"?'selected':''; ?>>Lomba Coding</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alasan</label>
                            <textarea name="alasan" class="form-control" rows="4"><?= htmlspecialchars($data['alasan']); ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Simpan Perubahan
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
