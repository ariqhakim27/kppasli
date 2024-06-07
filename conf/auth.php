<?php
// session_start();
if (isset($_POST['login'])) {


    $username = htmlentities($_POST['username']);
    $password = MD5($_POST['password']);
    include('config.php');

    $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password' ");
    if (mysqli_num_rows($query) == 1) {
        session_start();
        $data = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        // header('Location:../app/pages/dashboard.php');
        header('Location:../admin/index.php');
    } else {
        header('Location:../index.php?error=1');
    }

    mysqli_close($koneksi);
} else {
    header('location:logout.php');
}
