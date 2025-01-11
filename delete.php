<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Penghapusan</title>
    <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus data ini?");
        }
    </script>
</head>
<body>

    <h1>Konfirmasi Penghapusan Data</h1>
    
    <form action="didelete.php" method="get" onsubmit="return confirmDelete();">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <button type="submit">Hapus</button>
        <a href="index.php"><button type="button">Batal</button></a>
    </form>

</body>
</html>

