<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

    <link rel="stylesheet" href="style.css">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Data Arsip</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Pengelolaan Data Arsip</h1>
    <a href="add_archive.php">Tambah Arsip</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Judul Arsip</th>
            <th>Deskripsi</th>
            <th>File</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'db.php';

        // Query untuk mengambil data arsip
        $query = "SELECT * FROM archives ORDER BY created_at DESC";
        $result = $conn->query($query);

        // Loop untuk menampilkan data arsip
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['description']}</td>
                    <td><a href='uploads/{$row['file']}'>Download</a></td>
                    <td>{$row['created_at']}</td>
                    <td>
                        <a href='edit_archive.php?id={$row['id']}'>Edit</a> | 
                        <a href='delete_archive.php?id={$row['id']}'>Hapus</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>