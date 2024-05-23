<?php
    ob_start();
    session_start();
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
    }else{
        $email = '';
    };
    include('config.php');
    $db = new Database();
    if($email != ''){
        if (isset($_GET['id'])) {
            $kode_produk = $_GET['id'];
            if ($kode_produk != 0) {
                $db->delete_wishlist($email, $kode_produk);
                header('location: ../wishlist.php');
            }else{
                header('location:javascript://history.go(-1)');
            }
        }
        else{
            header('location:javascript://history.go(-1)');
        }
    }
    else{
        header('location: ../login.php');
    }
?>