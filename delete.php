<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        header("Location: read.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
