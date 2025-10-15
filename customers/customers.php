<?php 
include '../assets/header.php';
include '../koneksi.php';

$result = $conn->query("SELECT * FROM customers ORDER BY id DESC");
?>

<h2 class="text-2xl font-bold text-center">🐾 Data Customer</h2>
<a href="tambah_customer.php" class="button">+ Tambah Customer</a>

<table>
  <tr>
    <th>ID</th>
    <th>Nama</th>
    <th>No HP</th>
    <th>Alamat</th>
    <th>Aksi</th>
  </tr>
  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['phone']) ?></td>
      <td><?= htmlspecialchars($row['address']) ?></td>
      <td>
        <a href="edit_customer.php?id=<?= $row['id'] ?>" class="button"> ✏️ Edit</a>
        <a href="hapus_customer.php?id=<?= $row['id'] ?>" class="button" onclick="return confirm('Yakin hapus data ini?')">🗑️Hapus</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<br>
<a href="../index.php" class="button">← Kembali ke Dashboard</a>

<?php include '../assets/footer.php'; ?>