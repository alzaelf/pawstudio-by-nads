<?php include 'assets/header.php';?>

<section class="dashboard py-10">
  <div class="text-center mb-8">
    <h2 class="text-4xl font-bold text-blue-600">🐾 Selamat Datang di PawStudio by Nads!</h2>
    <p class="text-xl mt-4 text-gray-700"> 
      Di sini, setiap anabul punya tempatnya sendiri untuk dirawat, dimanjakan, dan disayangi.
      Kami percaya, kebahagiaan hewan peliharaan dimulai dari perhatian kecil setiap harinya.
      dari makanan yang bergizi, tempat yang nyaman, hingga sentuhan kasih sayang dari pemiliknya.
      PawStudio hadir bukan sekadar tempat perawatan, tapi ruang penuh cinta 💙
    </p>
    <img src="assets/PawStudio1.png" alt="Ilustrasi PawStudio" class="mx-auto mt-6 w-64 rounded-full shadow-md animate-bounce">
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
    <a href="customers/customers.php" class="button flex items-center justify-center gap-2 p-6 bg-blue-100 border border-blue-200 rounded-xl shadow hover:bg-blue-200 transition">
      🐾 Kelola Pemilik
    </a>
    <a href="pets/pets.php" class="button flex items-center justify-center gap-2 p-6 bg-blue-100 border border-blue-200 rounded-xl shadow hover:bg-blue-200 transition">
      🐶 Kelola Hewan
    </a>
    <a href="services/services.php" class="button flex items-center justify-center gap-2 p-6 bg-blue-100 border border-blue-200 rounded-xl shadow hover:bg-blue-200 transition">
      🛠️ Kelola Layanan
    </a>
    <a href="transactions/transaction.php" class="button flex items-center justify-center gap-2 p-6 bg-blue-100 border border-blue-200 rounded-xl shadow hover:bg-blue-200 transition">
      💳 Kelola Transaksi
    </a>
  </div>
</section>

<?php include 'assets/footer.php'; ?>
