<?php
require_once 'koneksi.php';
$id = $_POST['id'];

try {
    $sql = 'DELETE FROM data_barang WHERE id = ?';
    $qonnect = $database_connection->prepare($sql);
    $qonnect->execute([$id]);
    echo "data deleted succesfully!";
} catch (PDOException $err) {
    die("Error deleting data: " . $err->getMessage());
}