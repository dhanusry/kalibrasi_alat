<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_alat = $_POST['nama_alat'];
    $nomor_seri = $_POST['nomor_seri'];
    $tanggal_kalibrasi = $_POST['tanggal_kalibrasi'];
    $berkas_lembar_kerja = $_FILES['berkas_lembar_kerja']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($berkas_lembar_kerja);
    move_uploaded_file($_FILES['berkas_lembar_kerja']['tmp_name'], $target_file);

    $sql = "INSERT INTO lembar_kerja (nama_alat, nomor_seri, tanggal_kalibrasi, berkas_lembar_kerja)
            VALUES ('$nama_alat', '$nomor_seri', '$tanggal_kalibrasi', '$berkas_lembar_kerja')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan!";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Lembar Kerja Kalibrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Lembar Kerja Kalibrasi</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="nama_alat">Nama Alat:</label>
            <input type="text" name="nama_alat" required>

            <label for="nomor_seri">Nomor Seri:</label>
            <input type="text" name="nomor_seri" required>

            <label for="tanggal_kalibrasi">Tanggal Kalibrasi:</label>
            <input type="date" name="tanggal_kalibrasi" required>

            <label for="berkas_lembar_kerja">Berkas Lembar Kerja:</label>
            <input type="file" name="berkas_lembar_kerja" required>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
