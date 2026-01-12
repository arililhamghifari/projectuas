<?php
include "koneksi.php";

// cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ambil dan sanitasi data
    $nama   = htmlspecialchars($_POST['nama']);
    $email  = htmlspecialchars($_POST['email']);
    $no_hp  = htmlspecialchars($_POST['no_hp']);
    $pilihan_event  = htmlspecialchars($_POST['pilihan_event']);
    $alasan = htmlspecialchars($_POST['alasan']);

    // ================== UPLOAD FOTO ==================
$fotoNamaBaru = null;

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

    $namaFile = $_FILES['foto']['name'];
    $tmpFile  = $_FILES['foto']['tmp_name'];
    $ukuran   = $_FILES['foto']['size'];

    $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $allowedExt = ['jpg', 'jpeg', 'png'];

    if (!in_array($ext, $allowedExt)) {
        echo "<script>alert('Format gambar tidak diizinkan');history.back();</script>";
        exit;
    }

    if ($ukuran > 2 * 1024 * 1024) {
        echo "<script>alert('Ukuran gambar maksimal 2MB');history.back();</script>";
        exit;
    }

    $fotoNamaBaru = uniqid("foto_") . "." . $ext;
    move_uploaded_file($tmpFile, "uploads/" . $fotoNamaBaru);
}


    // validasi server-side
    if ($nama == "" || $email == "" || $no_hp == "" || $pilihan_event == "") {
        echo "<script>
                alert('Data wajib tidak boleh kosong!');
                window.location='pendaftaran.php';
              </script>";
        exit;
    }

    // simpan ke database
    $query = "INSERT INTO peserta_event (nama, email, no_hp, pilihan_event, alasan, foto)
VALUES ('$nama', '$email', '$no_hp', '$pilihan_event', '$alasan', '$fotoNamaBaru')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Pendaftaran berhasil!');
                window.location='pendaftaran.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    header("Location: pendaftaran.php");
    exit;
}
?>
