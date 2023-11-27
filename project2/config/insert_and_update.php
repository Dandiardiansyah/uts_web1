<?php
require_once 'koneksi.php';

$nama = $_POST['nama'];
$merek = $_POST['merek'];
$harga = $_POST['harga'];
$judul = $_POST['judul'];
$keterangan = $_POST['keterangan'];
$photo_name = $_FILES['filePhoto']['name'];
$photo_tmp = $_FILES['filePhoto']['tmp_name'];

if(!empty($_POST['id'])){
    try {
        move_uploaded_file($photo_tmp, '../photo/' . $photo_name);
        $sql = 'UPDATE `data_barang` SET `nama` = ?, `merek` = ?, `harga` = ?, `judul` = ?,`keterangan` = ?,
        `foto` = ? WHERE id = ?';
        $qonnect = $database_connection->prepare($sql);
        $qonnect->execute([$nama, $merek, $harga, $judul,$keterangan, 'foto/' . $photo_name, $_POST['id']]);

        echo "Data Updated Succesfully!";
    } catch (PDOException $err) {
        die("Error Updating data: " . $err->getMessage());
    }
} else{

    try{
        move_uploaded_file($photo_tmp, '../photo' . $photo_name);
        $sql = 'INSERT INTO `data_barang` (`nama`,`merek`,`harga`,`judul`,`keterangan`,`foto`)
        VALUES (?,?,?,?,?,?)';
        $qonnect = $database_connection->prepare($sql);
        $qonnect->execute([$nama, $merek, $harga, $judul,$keterangan, 'foto/' . $photo_name]);

        echo "Data Inserted Succesfully!";  
    } catch (PDOException $err) {
        die("Error Inserting data: " . $err->getMessage());
}
}