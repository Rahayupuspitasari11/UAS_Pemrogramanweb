<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Tambah Arsip</title>
</head>
<body>
    <h1>Tambah Arsip Baru</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Judul Arsip:</label><br>
        <input type="text" name="title" required><br><br>
        <label>Deskripsi Arsip:</label><br>
        <textarea name="description" required></textarea><br><br>
        <label>File Arsip:</label><br>
        <input type="file" name="file" required><br><br>
        <button type="submit" name="submit">Simpan</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $file = $_FILES['file']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            $query = "INSERT INTO archives (title, description, file) VALUES ('$title', '$description', '$file')";
            if ($conn->query($query) === TRUE) {
                echo "Arsip berhasil ditambahkan!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Gagal mengunggah file.";
        }
    }
    ?>
</body>
</html>