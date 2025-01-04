<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus file
    $query = "SELECT file FROM archives WHERE id = $id";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $file = "uploads/" . $row['file'];
    if (file_exists($file)) {
        unlink($file);
    }

    // Hapus dari database
    $query = "DELETE FROM archives WHERE id = $id";
    if ($conn->query($query) === TRUE) {
        echo "Arsip berhasil dihapus!";
    } else {
        echo "Error: " . $conn->error;
    }
}
header('Location: index.php');
?>
