<?php
include '../koneksi.php';
include '../assets/header.php';  // Tambahkan ini

$result = $conn->query("SELECT * FROM transactions ORDER BY id DESC");
?>

<h2 class="text-2xl font-bold text-center">Daftar Transaksi</h2>
<a href="tambah_transactions.php" class="button">+ Tambah Transaksi</a>
<br><br>

<table>  <!-- Pakai table default dari style.css -->
  <thead>
    <tr>
      <th>ID</th>
      <th>Nama Customer</th>
      <th>Nama Hewan</th>
      <th>Layanan</th>
      <th>Harga</th>
      <th>Tanggal</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['customer_name']) ?></td>
          <td><?= htmlspecialchars($row['pet_name']) ?></td>
          <td><?= htmlspecialchars($row['service_name']) ?></td>
          <td>Rp<?= number_format($row['price'], 0, ',', '.') ?></td>
          <td><?= $row['date'] ?></td>
          <td><?= ucfirst($row['status']) ?></td>
          <td>
            <a href="edit_transactions.php?id=<?= $row['id'] ?>" class="button">✏️Edit</a> |
            <a href="hapus_transactions.php?id=<?= $row['id'] ?>" class="button" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">🗑️Hapus</a>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="8">Belum ada data transaksi.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<br>
<a href="../index.php" class="button">← Kembali ke Dashboard</a>

<?php include '../assets/footer.php'; ?>  <!-- Tambahkan ini -->