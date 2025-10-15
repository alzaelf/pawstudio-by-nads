<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>PawStudio 🐾</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo (file_exists('assets/script.js') ? 'assets/script.js' : '../assets/script.js'); ?>"></script>

  <?php
    $cssPath = file_exists('assets/style.css') ? 'assets/style.css' : '../assets/style.css';
  ?>
  <link rel="stylesheet" href="<?= $cssPath ?>">
</head>
<body>
  <div class="paw-bg"></div>
  <header class="navbar">
    <h1>🐾 PawStudio</h1>
    <nav>
      <a href="<?= (file_exists('index.php') ? 'index.php' : '../index.php') ?>">Dashboard</a>
      <a href="<?= (file_exists('customers/customers.php') ? 'customers/customers.php' : '../customers/customers.php') ?>">Pelanggan</a>
      <a href="<?= (file_exists('pets/pets.php') ? 'pets/pets.php' : '../pets/pets.php') ?>">Hewan</a>
      <a href="<?= (file_exists('services/services.php') ? 'services/services.php' : '../services/services.php') ?>">Layanan</a>
    </nav>
  </header>
  <main class="content">