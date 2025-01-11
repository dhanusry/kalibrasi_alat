<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_alat = $_POST['nama_alat'];
    $nomor_seri = $_POST['nomor_seri'];
    $tanggal_kalibrasi = $_POST['tanggal_kalibrasi'];
    $berkas_lembar_kerja = $_FILES['berkas_lembar_kerja']['name'];

    if ($berkas_lembar_kerja) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($berkas_lembar_kerja);
        move_uploaded_file($_FILES['berkas_lembar_kerja']['tmp_name'], $target_file);
    }

    $sql = "UPDATE lembar_kerja SET
            nama_alat='$nama_alat', nomor_seri='$nomor_seri', 
            tanggal_kalibrasi='$tanggal_kalibrasi', 
            berkas_lembar_kerja='$berkas_lembar_kerja'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate!";
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM lembar_kerja WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Lembar Kerja Kalibrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            width: 60%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], input[type="date"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Lembar Kerja Kalibrasi</h1>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $row['id']; ?>">
            
            <label for="nama_alat">Nama Alat:</label>
            <input type="text" name="nama_alat" value="<?= $row['nama_alat']; ?>" required>

            <label for="nomor_seri">Nomor Seri:</label>
            <input type="text" name="nomor_seri" value="<?= $row['nomor_seri']; ?>" required>

            <label for="tanggal_kalibrasi">Tanggal Kalibrasi:</label>
            <input type="date" name="tanggal_kalibrasi" value="<?= $row['tanggal_kalibrasi']; ?>" required>

            <label for="berkas_lembar_kerja">Berkas Lembar Kerja:</label>
            <input type="file" name="berkas_lembar_kerja">

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
