<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM admin 
          WHERE username='$username' 
          AND password='$password'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;
    header("Location: admin.php");
} else {
    echo "<script>
            alert('Username atau Password salah!');
            window.location='login.php';
          </script>";
}
?>
