<?php
include '../koneksi.php';
include '../assets/header.php';  // Tambahkan ini

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $customer_name = $_POST['customer_name'];
  $pet_name = $_POST['pet_name'];
  $service_name = $_POST['service_name'];
  $price = $_POST['price'];
  $date = $_POST['date'];
  $status = $_POST['status'];

  $stmt = $conn->prepare("INSERT INTO transactions (customer_name, pet_name, service_name, price, date, status) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssiss", $customer_name, $pet_name, $service_name, $price, $date, $status);
  $stmt->execute();

  header("Location: transaction.php");
  exit;
}
?>

<h2 class="text-2xl font-bold text-center">Tambah Data Transaksi</h2>
<form method="POST">
  <label>Nama Customer:</label><br>
  <input type="text" name="customer_name" required><br><br>

  <label>Nama Hewan:</label><br>
  <input type="text" name="pet_name" required><br><br>

  <label>Nama Layanan:</label><br>
  <input type="text" name="service_name" required><br><br>

  <label>Harga:</label><br>
  <input type="number" name="price" required><br><br>

  <label>Tanggal Transaksi:</label><br>
  <input type="date" name="date" value="<?= date('Y-m-d') ?>"><br><br>

  <label>Status:</label><br>
  <select name="status">
    <option value="pending">Pending</option>
    <option value="done">Done</option>
    <option value="cancelled">Cancelled</option>
  </select><br><br>

  <button type="submit" class="button">Simpan</button>  <!-- Ganti dengan class "button" -->
  <a href="transaction.php" class="button">← Kembali</a>
</form>

<?php include '../assets/footer.php'; ?>  <!-- Tambahkan ini -->