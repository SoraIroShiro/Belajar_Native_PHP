<?php
include("service/database.php");
session_start();

$register_messages ="";

if (isset($_SESSION["is_login"])) {
    header("location: dashboard.php");
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try{
        $sql = "INSERT INTO users (username, password) VALUES ('.$username.', '.$password.')";

        if($db->query($sql)){

            $register_messages = "Akun ditambahkan! Silakan Login";
        } else {
           $register_messages = "Gagal menambahkan akun";
        }

    // fungsi titik untuk pemisah antar variabel pada php
    }
    catch(mysqli_sql_exception){
        $register_messages ="Username sudah digunakan";
    }
}
    

    

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <header>
    <?php 
        include 'layout/header.html';
        include 'layout/nav.html';?>
    </header>

    <h1>Daftar Akun</h1>
    <i><?= $register_messages?></i>
    <form action="register.php" method="POST">
        <input type="text" placeholder="Username" name = "username">
        <input type="text" placeholder="Password" name = "password">
        <button type="submit" name="register">Register</button>
    </form>
    <a href="index.php"><button>Kembali ke beranda</button></a>
    <?php include 'layout/footer.html'?>
</body>
</html>