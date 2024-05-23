<?php
    include('config.php');
    $db = new database();
    session_start();
    $jenis_kelamin = $_POST['jenis_kelamin'];
    if ($jenis_kelamin == "Perempuan") {
        $kode_jk = 'P';
    } elseif ($jenis_kelamin == "Laki-Laki") {
        $kode_jk = 'L';
    }
    $db->update_profil($_POST['username'], $_POST['nama_lengkap'], $kode_jk, $_POST['no_telp'], $_POST['alamat'], $_SESSION['email']);
    header('location: ../user_profile.php');
?>