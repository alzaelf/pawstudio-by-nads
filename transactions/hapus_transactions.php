<?php
include '../koneksi.php';
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM transactions WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: transaction.php");
exit;
?>