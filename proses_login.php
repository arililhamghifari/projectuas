<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
$data = mysqli_fetch_assoc($query);

if ($data && password_verify($password, $data['password'])) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    header("Location: admin.php");
} else {
    echo "<script>
        alert('Login gagal!');
        window.location='login.php';
    </script>";
}
