<?php
include '../koneksi.php';
include '../assets/header.php';  // Tambahkan ini

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM transactions WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $customer_name = $_POST['customer_name'];
  $pet_name = $_POST['pet_name'];
  $service_name = $_POST['service_name'];
  $price = $_POST['price'];
  $date = $_POST['date'];
  $status = $_POST['status'];

  $stmt = $conn->prepare("UPDATE transactions SET customer_name=?, pet_name=?, service_name=?, price=?, date=?, status=? WHERE id=?");
  $stmt->bind_param("sssissi", $customer_name, $pet_name, $service_name, $price, $date, $status, $id);
  $stmt->execute();

  header("Location: transaction.php");
  exit;
}
?>

<h2 class="text-2xl font-bold text-center">Edit Data Transaksi</h2>
<form method="POST">
  <label>Nama Customer:</label><br>
  <input type="text" name="customer_name" value="<?= htmlspecialchars($row['customer_name']) ?>" required><br><br>

  <label>Nama Hewan:</label><br>
  <input type="text" name="pet_name" value="<?= htmlspecialchars($row['pet_name']) ?>" required><br><br>

  <label>Nama Layanan:</label><br>
  <input type="text" name="service_name" value="<?= htmlspecialchars($row['service_name']) ?>" required><br><br>

  <label>Harga:</label><br>
  <input type="number" name="price" value="<?= $row['price'] ?>" required><br><br>

  <label>Tanggal Transaksi:</label><br>
  <input type="date" name="date" value="<?= $row['date'] ?>"><br><br>

  <label>Status:</label><br>
  <select name="status">
    <option value="pending" <?= $row['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
    <option value="done" <?= $row['status'] == 'done' ? 'selected' : '' ?>>Done</option>
    <option value="cancelled" <?= $row['status'] == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
  </select><br><br>

  <button type="submit" class="button">Simpan Perubahan</button>  <!-- Ganti dengan class "button" -->
  <a href="transaction.php" class="button">← Kembali</a>
</form>

<?php include '../assets/footer.php'; ?>  <!-- Tambahkan ini -->