<?php
include 'koneksi.php';

$name = $email = $age = $birth_date = "";
$id = "";

// Jika ada ID (edit mode)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    $name = $data['name'];
    $email = $data['email'];
    $age = $data['age'];
    $birth_date = $data['birth_date'];
}

// Handle form submit
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $birth_date = $_POST['birth_date'];

    if ($id) {
        // Update data
        $query = "UPDATE users SET name='$name', email='$email', age=$age, birth_date='$birth_date' WHERE id=$id";
    } else {
        // Insert data
        $query = "INSERT INTO users (name, email, age, birth_date) VALUES ('$name', '$email', $age, '$birth_date')";
    }

    if (mysqli_query($conn, $query)) {
        header("Location: read.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Sederhana - Create/Update</title>
</head>
<body>
    <h2><?= $id ? 'Edit Data' : 'Tambah Data' ?></h2>
    <form method="POST" action="">
        <label>Nama:</label>
        <input type="text" name="name" value="<?= $name ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= $email ?>" required><br>
        <label>Umur:</label>
        <input type="number" name="age" value="<?= $age ?>" required><br>
        <label>Tanggal Lahir:</label>
        <input type="date" name="birth_date" value="<?= $birth_date ?>" required><br>
        <button type="submit" name="save">Simpan</button>
    </form>
    <a href="read.php">Kembali</a>
</body>
</html>
