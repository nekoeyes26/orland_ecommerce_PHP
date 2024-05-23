<?php
    include('config.php');
    $db = new database();
    $tidak_ada = $db->cek_user_tidak_ada($_POST['email']);
    if(count($tidak_ada) == 0){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $akses_id = $_POST['akses_id'];
        echo $username."<br>";
        echo $email."<br>";
        echo $password."<br>";
        echo $akses_id."<br>";
        $db->tambah_akun($username, $email, $password, $_POST['akses_id']);
        header('location: ../home.php');
    } else{
        header('Location: ../login.php');
    }
?>