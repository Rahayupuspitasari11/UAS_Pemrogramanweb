<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM archives WHERE id = $id";
    $result = $conn->query($query);
    $archive = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE archives SET title = '$title', description = '$description' WHERE id = $id";
    if ($conn->query($query) === TRUE) {
        echo "Arsip berhasil diperbarui!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Edit Arsip</title>
</head>
<body>
    <h1>Edit Arsip</h1>
    <form action="" method="POST">
        <label>Judul Arsip:</label><br>
        <input type="text" name="title" value="<?php echo $archive['title']; ?>" required><br><br>
        <label>Deskripsi Arsip:</label><br>
        <textarea name="description" required><?php echo $archive['description']; ?></textarea><br><br>
        <button type="submit" name="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
