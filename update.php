<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$id     = $_POST['id'];
$nama   = htmlspecialchars($_POST['nama']);
$email  = htmlspecialchars($_POST['email']);
$no_hp  = htmlspecialchars($_POST['no_hp']);
$pilihan_event  = htmlspecialchars($_POST['event']);
$alasan = htmlspecialchars($_POST['alasan']);

$query = "UPDATE peserta_event SET
            nama='$nama',
            email='$email',
            no_hp='$no_hp',
            pilihan_event='$event',
            alasan='$alasan'
          WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    header("Location: admin.php");
} else {
    echo "Gagal update data";
}
