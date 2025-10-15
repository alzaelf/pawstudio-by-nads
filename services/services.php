<?php
include '../koneksi.php';
include '../assets/header.php';  

$result = $conn->query("SELECT * FROM services ORDER BY id DESC");
?>

<h1 class="text-4xl font-bold text-center">🐾 Kelola Layanan Petshop 🐶</h1>

<div class="flex justify-between items-center mb-6">
  <a href="tambah_services.php" class="button">+ Tambah Layanan</a> 
</div>

<div class="overflow-x-auto rounded-xl shadow-md">
  <table>  
    <thead>
      <tr>
        <th class="px-4 py-3 border text-left">ID</th>
        <th class="px-4 py-3 border text-left">Nama Layanan</th>
        <th class="px-4 py-3 border text-left">Harga</th>
        <th class="px-4 py-3 border text-left">Deskripsi</th>
        <th class="px-4 py-3 border text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr class="hover:bg-blue-50 transition"> 
          <td class="border px-4 py-2 text-center"><?= $row['id'] ?></td>
          <td class="border px-4 py-2"><?= htmlspecialchars($row['service_name']) ?></td>
          <td class="border px-4 py-2">Rp<?= number_format($row['price'], 0, ',', '.') ?></td>
          <td class="border px-4 py-2"><?= htmlspecialchars($row['description']) ?></td>
          <td class="border px-4 py-2 text-center space-x-2">
            <a href="edit_services.php?id=<?= $row['id'] ?>" class="button bg-yellow-300 hover:bg-yellow-400 text-blue-900 px-3 py-1 rounded-md text-sm font-medium">
              ✏️ Edit
            </a> 
            <a href="hapus_services.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus layanan ini?')" class="button bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded-md text-sm font-medium">
              🗑️ Hapus
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<br>
<a href="../index.php" class="button">← Kembali ke Dashboard</a>
<?php include '../assets/footer.php'; ?>  