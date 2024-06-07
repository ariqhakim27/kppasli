<?php
include('../../conf/config.php'); 
if(isset($_GET["id_barang"])) {
    $barang_to_delete = $_GET["id_barang"];

    $query = mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id_barang = '$barang_to_delete'");

    if ($query) {
        header("Location: data_barang.php");
        exit();
    } else {
        echo "Gagal menghapus data";
    }
} else {
    echo "Id tidak diberikan";
}

mysqli_close($koneksi);
?>