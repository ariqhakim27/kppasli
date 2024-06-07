<?php
include('../../conf/config.php');

if(isset($_GET["id_bidang"])) {
    $bidang_to_delete = $_GET["id_bidang"];

    $query = mysqli_query($koneksi, "DELETE FROM tb_bidang WHERE id_bidang = '$bidang_to_delete'");

    if ($query) {
        header("Location: data_bidang.php");
        exit();
    } else {
        echo "Gagal menghapus data";
    }
} else {
    echo "ID tidak diberikan";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
