<?php
    session_start();
    include('config.php');
    $db = new Database();
    if(isset($_SESSION['akses_id'])){
        $akses_id = $_SESSION["akses_id"];
    }else{
        $akses_id = '';
    };
    if($akses_id == 1){
        $id_produk = $_POST['id_produk'];
        $db->delete_produk($id_produk);
        header('location: ../lihat_edit_produk.php');
    }
    else{
        header('location: ../all_products.php');
    }
?>