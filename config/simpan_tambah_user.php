<?php
    include('config.php');
    $db = new database();
    $tidak_ada = $db->cek_user_tidak_ada($_POST['email']);
    if(count($tidak_ada) == 0){
        $db->tambah_user($_POST['username'], $_POST['email'], md5($_POST['password']));
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        foreach($db->login($email, $password) as $x){
            $_SESSION["akses_id"] = $x['akses_id'];
            $_SESSION["header"] = $x['header'];
        }
        header('location: ../home.php');
    } else{
        header('Location: ../login.php');
    }
?>