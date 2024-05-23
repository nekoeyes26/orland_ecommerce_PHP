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
                $produk = $db->ambil_data_per_produk($kode_produk);
                if($produk[0]['stok_produk'] > 0){
                    $tidak_ada = $db->cek_keranjang_tidak_ada($email, $kode_produk);
                    if(count($tidak_ada) == 0){
                        if(isset($_POST['jumlah'])){
                            $jumlah = $_POST['jumlah'];
                        }
                        else{
                            $jumlah = 1;
                        }
                        if($jumlah != 0){
                            $barang = $db->ambil_data_per_produk($kode_produk);
                            if ($jumlah > $barang[0]['stok_produk']) {
                                $jumlah = $barang[0]['stok_produk'];
                            }
                            $db->tambah_keranjang($email, $kode_produk, $jumlah);
                        }
                    }
                    else{
                        if(isset($_POST['jumlah'])){
                            $jumlah = $_POST['jumlah'];
                        }
                        else{
                            $jumlah = 1;
                        }
                        $jumlah_tambah = $tidak_ada[0]['jumlah'] + $jumlah;
                        $db->update_jumlah_di_keranjang($email, $kode_produk, $jumlah_tambah);
                    }
                    header('location: ../keranjang.php');
                }else{
                    header('location: ../stok_habis.php');
                }
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