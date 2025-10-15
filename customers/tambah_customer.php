<?php
include '../koneksi.php';
include '../assets/header.php'; 

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO customers (name, phone, address) VALUES ('$name', '$phone', '$address')";
    if ($conn->query($sql)) {
        header("Location: customers.php");
        exit;
    } else {
        echo "<p class='error'>Gagal menambah data: " . $conn->error . "</p>";
    }
}
?>

<h2 class="text-2xl font-bold text-center">Tambah Customer Baru</h2>

<form method="post" class="form-box">  
  <label class="form-label">Nama:</label><br> 
  <input type="text" name="name" class="form-input" required><br><br> 

  <label class="form-label">No HP:</label><br>
  <input type="text" name="phone" class="form-input"><br><br>

  <label class="form-label">Alamat:</label><br>
  <textarea name="address" rows="3" class="form-input"></textarea><br><br> 

  <button type="submit" name="simpan" class="button">Simpan</button>
  <a href="customers.php" class="button">Batal</a>
</form>

<?php include '../assets/footer.php'; ?>