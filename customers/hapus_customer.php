<?php
include '../koneksi.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $conn->query("DELETE FROM customers WHERE id=$id");
}
header("Location: customers.php");
exit;
?>