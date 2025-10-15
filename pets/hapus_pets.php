<?php
include '../koneksi.php';

if (!isset($_GET['id'])) {
    die("ID hewan tidak ditemukan!");
}

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM pets WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: pets.php");
exit;
?>