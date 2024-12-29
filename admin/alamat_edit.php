<?php
include('../connection.php');

$db = new Connection();
$conn = $db->connection;

if (!$conn) {
    die('Koneksi database gagal: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $isi = $_POST['isi'];

    $updateQuery = "UPDATE singleton SET isi = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    if ($stmt === false) {
        die('Query prepare failed: ' . $conn->error);
    }

    $stmt->bind_param('si', $isi, $id);
    if ($stmt->execute()) {
    } else {
        echo "Gagal memperbarui data: " . $stmt->error;
    }
}

$query = "SELECT id, isi FROM singleton";
$stmt = $conn->prepare($query);
if ($stmt === false) {
    die('Query prepare failed: ' . $conn->error);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<?php include('metadata.php'); ?>

<body>
    <?php include('header.php'); ?>
    <h1>Edit Data</h1>
    <form method="post" action="">
        <table border="1">
            <thead>
                <tr>
                    <th style="width: 10%;">ID</th>
                    <th style="width: 60%;">Isi</th>
                    <th style="width: 30%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop untuk menampilkan setiap baris data
                while ($data = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($data['id']) . "</td>";
                    echo "<td><input type='text' name='isi' value='" . htmlspecialchars($data['isi']) . "'></td>";
                    echo "<td>";
                    echo "<button type='submit' name='id' value='" . $data['id'] . "'>Simpan</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </form>
</body>

</html>