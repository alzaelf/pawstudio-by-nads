<?php
include '../koneksi.php';
include '../assets/header.php';  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $service_name = $_POST['service_name'];
  $price = $_POST['price'];
  $description = $_POST['description'];

  $stmt = $conn->prepare("INSERT INTO services (service_name, price, description) VALUES (?, ?, ?)");
  $stmt->bind_param("sds", $service_name, $price, $description);
  $stmt->execute();

  header("Location: services.php");
  exit;
}
?>

<h2 class="text-2xl font-bold text-center">Tambah Layanan Baru</h2>
<form method="POST">
  <label>Nama Layanan:</label><br>
  <input type="text" name="service_name" required><br><br>

  <label>Harga (Rp):</label><br>
  <input type="number" name="price" step="0.01" required><br><br>

  <label>Deskripsi:</label><br>
  <textarea name="description" rows="4"></textarea><br><br>

  <button type="submit" class="button">Simpan</button>  
  <a href="services.php" class="button">← Kembali</a>
</form>

<?php include '../assets/footer.php'; ?>  