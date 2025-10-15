<?php
include '../koneksi.php';

if (!isset($_GET['id'])) {
    die("ID layanan tidak ditemukan!");
}

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM services WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: services.php");
exit;
?>