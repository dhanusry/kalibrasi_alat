<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
        }
        .menu {
            margin: 20px auto;
            max-width: 300px;
            display: flex;
            flex-direction: column; /* Mengubah menu menjadi vertikal */
            align-items: center;
        }
        .menu a {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 5px 0; /* Memberikan jarak antar menu */
        }
        .menu a:hover {
            background-color: #0069d9;
        }
        .menu a:active {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <h1>Selamat Datang, <?= $_SESSION['username']; ?></h1>
    <div class="menu">
        <a href="index.php">Daftar Lembar Kerja</a>
        <a href="add.php">Tambah Lembar Kerja</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
