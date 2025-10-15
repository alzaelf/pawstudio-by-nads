<?php
include '../koneksi.php';
include '../assets/header.php';

$customers = $conn->query("SELECT id, name FROM customers ORDER BY name ASC");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $customer_id = $_POST['customer_id'];
  $name = $_POST['name'];
  $species = $_POST['species'];
  $breed = $_POST['breed'];
  $age = $_POST['age'];

  $stmt = $conn->prepare("INSERT INTO pets (customer_id, name, species, breed, age) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("isssi", $customer_id, $name, $species, $breed, $age);
  $stmt->execute();

  header("Location: pets.php");
  exit;
}
?>

<h1 class="text-2xl font-bold text-center">🐕 Tambah Hewan Baru</h1>

<form method="POST">
    <label>Pemilik:</label>
    <select name="customer_id" required>
      <option value="">-- Pilih Pemilik --</option>
      <?php while ($row = $customers->fetch_assoc()): ?>
        <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
      <?php endwhile; ?>
    </select>

    <label>Nama Hewan:</label>
    <input type="text" name="name" required>

    <label>Jenis (misal: Kucing, Anjing):</label>
    <input type="text" name="species">

    <label>Ras:</label>
    <input type="text" name="breed">

    <label>Umur (tahun):</label>
    <input type="number" name="age" min="0">

    <div>
      <button type="submit" class="button">Simpan</button> 
      <a href="pets.php" class="button">Batal</a>
    </div>
  </form>

<?php include '../assets/footer.php'; ?>