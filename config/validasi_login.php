<?php
    include "config.php";
    $db = new Database();
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $x = $db->login($email, $password);
    if(count($x) > 0){
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        foreach($db->login($email, $password) as $x){
            $_SESSION["akses_id"] = $x['akses_id'];
            $_SESSION["header"] = $x['header'];
        }
        header('Location: ../home.php');
    }
    else {
        header('Location: ../login.php');
    }
?>