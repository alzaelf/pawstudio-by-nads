<?php
include '../koneksi.php';
include '../assets/header.php';  

if (!isset($_GET['id'])) {
    die("ID hewan tidak ditemukan!");
}

$id = $_GET['id'];


$result = $conn->query("SELECT * FROM pets WHERE id = $id");
if ($result->num_rows == 0) {
    die("Data tidak ditemukan!");
}
$pet = $result->fetch_assoc();

$customers = $conn->query("SELECT id, name FROM customers ORDER BY name ASC");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = $_POST['customer_id'];
    $name = $_POST['name'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];

    $stmt = $conn->prepare("UPDATE pets SET customer_id=?, name=?, species=?, breed=?, age=? WHERE id=?");
    $stmt->bind_param("isssii", $customer_id, $name, $species, $breed, $age, $id);
    $stmt->execute();

    header("Location: pets.php");
    exit;
}
?>

<h1 class="text-2xl font-bold text-center">✏️ Edit Data Hewan</h1>

<form method="POST">
    <label>Pemilik:</label>
    <select name="customer_id" required>
      <?php while ($row = $customers->fetch_assoc()): ?>
        <option value="<?= $row['id'] ?>" <?= ($row['id'] == $pet['customer_id']) ? 'selected' : '' ?>>
          <?= htmlspecialchars($row['name']) ?>
        </option>
      <?php endwhile; ?>
    </select>

    <label>Nama Hewan:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($pet['name']) ?>" required>

    <label>Spesies:</label>
    <input type="text" name="species" value="<?= htmlspecialchars($pet['species']) ?>">

    <label>Ras:</label>
    <input type="text" name="breed" value="<?= htmlspecialchars($pet['breed']) ?>">

    <label>Umur (tahun):</label>
    <input type="number" name="age" value="<?= htmlspecialchars($pet['age']) ?>">

    <div>
      <button type="submit" class="button">Perbarui</button>  
      <a href="pets.php" class="button">Batal</a>
    </div>
  </form>

<?php include '../assets/footer.php'; ?>