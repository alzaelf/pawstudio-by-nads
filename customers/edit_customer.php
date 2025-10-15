<?php
include '../koneksi.php';
include '../assets/header.php'; 

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan");
}

$result = $conn->query("SELECT * FROM customers WHERE id=$id");
$data = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE customers SET name='$name', phone='$phone', address='$address' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: customers.php");
        exit;
    } else {
        echo "<p class='error'>Gagal memperbarui data: " . $conn->error . "</p>";
    }
}
?>

<h1 class="text-2xl font-bold text-center">Edit Data Customer 🐾</h1>

<form method="post">
    <label>Nama:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" required><br><br>

    <label>No HP:</label><br>
    <input type="text" name="phone" value="<?= htmlspecialchars($data['phone']) ?>"><br><br>

    <label>Alamat:</label><br>
    <textarea name="address" rows="3"><?= htmlspecialchars($data['address']) ?></textarea><br><br>

    <button type="submit" name="update" class="button">💾 Perbarui</button>  <!-- Ganti dengan class "button" -->
    <a href="customers.php" class="button">Batal</a>
</form>

<?php include '../assets/footer.php'; ?>