<?php
    include('config.php');
    $db = new database();
    session_start();
    if((md5($_POST['password_old']) == $_SESSION['password']) && ($_POST['password_new'] == $_POST['password_new_confirm'])){
        $db->update_password(md5($_POST['password_new']), $_SESSION['email']);
        $_SESSION['password'] = md5($_POST['password_new']);
        header('location: ../user_profile.php');
    }
    else{
        header('location: ../update_pass_gagal.php');
    }
?>