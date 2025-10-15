<?php
include '../koneksi.php';
include '../assets/header.php'; 

if (!isset($_GET['id'])) {
    die("ID layanan tidak ditemukan!");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM services WHERE id = $id");
if ($result->num_rows == 0) {
    die("Data tidak ditemukan!");
}
$service = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service_name = $_POST['service_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE services SET service_name=?, price=?, description=? WHERE id=?");
    $stmt->bind_param("sdsi", $service_name, $price, $description, $id);
    $stmt->execute();

    header("Location: services.php");
    exit;
}
?>

<h2 class="text-2xl font-bold text-center">Edit Layanan</h2>
<form method="POST">
  <label>Nama Layanan:</label><br>
  <input type="text" name="service_name" value="<?= htmlspecialchars($service['service_name']) ?>" required><br><br>

  <label>Harga (Rp):</label><br>
  <input type="number" name="price" step="0.01" value="<?= htmlspecialchars($service['price']) ?>" required><br><br>

  <label>Deskripsi:</label><br>
  <textarea name="description" rows="4"><?= htmlspecialchars($service['description']) ?></textarea><br><br>

  <button type="submit" class="button">Simpan Perubahan</button>  
  <a href="services.php" class="button">← Kembali</a>
</form>

<?php include '../assets/footer.php'; ?> 