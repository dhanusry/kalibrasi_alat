<?php
include 'config.php';

$sql = "SELECT * FROM lembar_kerja";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kalibrasi Alat Elektromedis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .action-links a {
            margin-right: 10px;
        }

        .action-links {
            display: flex;
            justify-content: flex-start;
        }

        .action-links a {
            text-transform: uppercase;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Daftar Lembar Kerja Kalibrasi</h1>
    <a href="add.php">Tambah Lembar Kerja</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Alat</th>
            <th>Nomor Seri</th>
            <th>Tanggal Kalibrasi</th>
            <th>Berkas Lembar Kerja</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama_alat']; ?></td>
                <td><?= $row['nomor_seri']; ?></td>
                <td><?= $row['tanggal_kalibrasi']; ?></td>
                <td>
                    <?php if ($row['berkas_lembar_kerja']): ?>
                        <a href="uploads/<?= $row['berkas_lembar_kerja']; ?>" target="_blank">Lihat Berkas</a>
                    <?php else: ?>
                        Tidak ada berkas
                    <?php endif; ?>
                </td>
                <td class="action-links">
                    <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus?');">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
