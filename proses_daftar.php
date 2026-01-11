<?php
include "koneksi.php";

// cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ambil dan sanitasi data
    $nama   = htmlspecialchars($_POST['nama']);
    $email  = htmlspecialchars($_POST['email']);
    $no_hp  = htmlspecialchars($_POST['no_hp']);
    $event  = htmlspecialchars($_POST['event']);
    $alasan = htmlspecialchars($_POST['alasan']);

    // validasi server-side
    if ($nama == "" || $email == "" || $no_hp == "" || $event == "") {
        echo "<script>
                alert('Data wajib tidak boleh kosong!');
                window.location='pendaftaran.php';
              </script>";
        exit;
    }

    // simpan ke database
    $query = "INSERT INTO peserta_event 
              (nama, email, no_hp, event, alasan)
              VALUES 
              ('$nama', '$email', '$no_hp', '$event', '$alasan')";

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
