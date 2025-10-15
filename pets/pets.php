<?php
include '../koneksi.php';
include '../assets/header.php';  

$query = "
  SELECT pets.id, pets.name AS pet_name, pets.species, pets.breed, pets.age,
         customers.name AS owner_name
  FROM pets
  JOIN customers ON pets.customer_id = customers.id
  ORDER BY pets.id DESC
";
$result = $conn->query($query);
?>

<h1 class="text-2xl font-bold text-center">🐶 Data Hewan di PawStudio</h1>
<a href="tambah_pets.php" class="button">+ Tambah Hewan</a>
<br><br>

<table>  
  <thead>
    <tr>
      <th>ID</th>
      <th>Nama Hewan</th>
      <th>Jenis</th>
      <th>Ras</th>
      <th>Umur</th>
      <th>Pemilik</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['pet_name']) ?></td>
        <td><?= htmlspecialchars($row['species']) ?></td>
        <td><?= htmlspecialchars($row['breed']) ?></td>
        <td><?= htmlspecialchars($row['age']) ?> tahun</td>
        <td><?= htmlspecialchars($row['owner_name']) ?></td>
        <td>
          <a href="edit_pets.php?id=<?= $row['id'] ?>" class="button"> ✏️Edit</a>  
          <a href="hapus_pets.php?id=<?= $row['id'] ?>" class="button" onclick="return confirm('Yakin hapus data ini?')">🗑️Hapus</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<br>
<a href="../index.php" class="button">← Kembali ke Dashboard</a>

<?php include '../assets/footer.php'; ?>