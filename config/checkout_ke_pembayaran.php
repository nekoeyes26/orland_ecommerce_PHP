<?php
    $mysqldate = date ('Y-m-d');
    $mysqltime = date ('Y-m-d H:i:s');
    include('config.php');
    ob_start();
    session_start();
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
    }else{
        $email = '';
    };
    $db = new Database();
    if($email != ''){
        $barang = $db->tampil_keranjang($email);
        if (count($barang) > 0) {
            $jumlah_item = count($barang);
            // echo $jumlah_item;
            $subtotal = 0;
            foreach ($db->tampil_keranjang($email) as $x) {
                $total_peritem = $x['harga_diskon_produk'] * $x['jumlah'];
                $subtotal = $subtotal + $total_peritem;
            }
            // echo "<br>".$subtotal;
            $ongkir = $_POST['hasilongkir'];
            if($ongkir != ''){
                // echo "<br>".$ongkir;
                $kurir = $_POST['hasilekspedisi'];
                // echo "<br>".$kurir;
                $tujuan = $_POST['hasilprovinsi']." ".$_POST['hasildistrik'];
                // echo "<br>".$tujuan;
                $cek = $db->cek_checkout_tidak_ada($email);
                if(count($cek) == 0){
                    $db->insert_checkout($email,$jumlah_item,$subtotal,$ongkir,$kurir,$tujuan);
                }
                else{
                    $db->update_checkout($email,$jumlah_item,$subtotal,$ongkir,$kurir,$tujuan);
                }
                header('location: ../checkout.php');
            }
        }
        else{
            header('location: ../keranjang.php');
        }
    }
    else{
        header('location: ../login.php');
    }
?>