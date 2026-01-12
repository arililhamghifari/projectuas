<?php
include "koneksi.php";

$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];

// enkripsi password
$hash = password_hash($password, PASSWORD_DEFAULT);

// cek username
$cek = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>
        alert('Username sudah digunakan!');
        window.location='register.php';
    </script>";
    exit;
}

// simpan admin
$query = "INSERT INTO admin (username, password) VALUES ('$username', '$hash')";
mysqli_query($conn, $query);

echo "<script>
    alert('Register berhasil!');
    window.location='login.php';
</script>";
