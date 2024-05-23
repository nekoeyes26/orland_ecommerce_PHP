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
                $jumlah = $_POST['jumlah'];
                if($jumlah == 0){
                    $db->delete_keranjang($email, $kode_produk);
                }
                else{
                    $barang = $db->ambil_data_per_produk($kode_produk);
                    if ($jumlah > $barang[0]['stok_produk']) {
                        $jumlah = $barang[0]['stok_produk'];
                    }
                    $db->update_jumlah_di_keranjang($email, $kode_produk, $jumlah);
                }
                header('location: ../keranjang.php');
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