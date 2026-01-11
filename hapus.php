<?php
include "koneksi.php";

$id = $_GET['id'];

$query = "DELETE FROM peserta_event WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    header("Location: admin.php");
} else {
    echo "Gagal menghapus data";
}
?>
