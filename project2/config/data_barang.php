<?php
require_once 'koneksi.php';

try{
    $sql = 'SELECT * FROM data_barang';
    $qonnect = $database_connection->prepare($sql);
    $qonnect->execute();

    $data = array();
    while($row = $qonnect->fetch(PDO::FETCH_ASSOC)){
        array_push($data, $row);
    }
    echo json_encode($data);
} catch(PDOException $err){
    die("Tidak dapat memuat database $database_name: " . $err->getMessage());
}