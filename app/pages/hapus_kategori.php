<?php
include ('../../conf/config.php');

if(isset($_GET["id_kategori"])) {
    $kategori_to_delete = $_GET["id_kategori"];

    $query = mysqli_query($koneksi, "DELETE FROM tb_kategori WHERE id_kategori = '$kategori_to_delete'");

    if ($query) {
        echo "<script>window.location.href = 'data_kategori.php';</script>";
        exit();
    } else {
        echo "Gagal menghapus data";
    }
} else {
    echo "Id tidak diberikan";
}?>