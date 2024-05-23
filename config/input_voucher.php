<?php
    include "config.php";
    $db = new Database();
    ob_start();
    session_start();
    $_SESSION["sudah_voucher"] = "";
    $_SESSION["voucher"] = '';
    $voucher = $_POST['input_voucher'];
    $cek = $db->cek_voucher($voucher);
    if(count($cek) > 0){
        $_SESSION["sudah_voucher"] = "Sudah";
        $_SESSION["voucher"] = $cek[0]['potongan'];
    }
    header('location: ../checkout.php');
?>