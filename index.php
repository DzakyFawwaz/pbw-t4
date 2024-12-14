<?php
include 'koneksi.php';

// Ambil data dari database
$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Sederhana - Read</title>
</head>
<body>
    <h2>Daftar Pengguna</h2>
    <a href="create_update.php">Tambah Data</a>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Umur</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['birth_date'] ?></td>
            <td>
                <a href="create_update.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
