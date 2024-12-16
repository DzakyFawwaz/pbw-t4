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
    <link rel="stylesheet" href="styles.css" />
    <title>PBW Tugas 4 | CRUD</title>
</head>
<body>
    <section class="card">
        <div class="section-header">
            <h2>Daftar Pengguna</h2>
            <a class="add-user" href="add_edit_user.php">Tambah Data</a>
        </div>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Umur</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['age'] ?></td>
                <td><?= $row['birth_date'] ?></td>
                <td>
                    <a class="edit" href="add_edit_user.php?id=<?= $row['id'] ?>">Edit</a>
                    <a class="delete" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
</section>
</body>
</html>
