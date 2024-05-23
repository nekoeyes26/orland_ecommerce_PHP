<?php
    date_default_timezone_set("Asia/Jakarta");
    $mysqldate = date ('Y-m-d');
    $mysqldatetime = date ('Y-m-d H:i:s');
    include('config.php');
    ob_start();
    session_start();
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
    }else{
        $email = '';
    };
    $db = new Database();
    if ($email != '') {
        echo $email;
        foreach ($db->tampil_keranjang($email) as $kx) {
            $barang = $db->ambil_data_per_produk($kx['id_produk']);
            if ($barang[0]['stok_produk'] == 0) {
                $db->delete_1_produk_keranjang($email, $kx['id_produk']);
            }
        }
        $barang = $db->tampil_keranjang($email);
        if (count($barang) > 0) {
            $jumlah_item = count($barang);
            echo "<br>".$jumlah_item;
            $harga_pembelian = $_POST['total_pembelian'];
            echo "<br>".$harga_pembelian;
            echo "<br>".$mysqldatetime;
            $data_checkout = $db->tampil_data_checkout($email);
            $ongkir = $data_checkout[0]['ongkir'];
            echo "<br>".$ongkir;
            $kurir = $data_checkout[0]['kurir'];
            echo "<br>".$kurir;
            $tujuan = $data_checkout[0]['tujuan'].", ".$_POST['detail_alamat'];
            echo "<br>".$tujuan;
            $nama_penerima = $_POST['nama_penerima'];
            echo "<br>".$nama_penerima;
            $no_telp_penerima = $_POST['no_telp_penerima'];
            echo "<br>".$no_telp_penerima;
            $email_penerima = $_POST['email_penerima'];
            echo "<br>".$email_penerima;
            $db->insert_pembelian($email,$jumlah_item,$harga_pembelian,$mysqldatetime,$ongkir,$kurir,$tujuan,$nama_penerima,$no_telp_penerima,$email_penerima);
            $pembelian = $db->tampil_data_pembelian($email);
            $id_pembelian = $pembelian[0]['id_pembelian'];
            echo "<br>".$id_pembelian;
            echo "<br>Daftar Barang:";
            foreach($barang as $item){
                echo "<br>".$item['id_produk'];
                echo "<br>".$item['jumlah'];
                $db->insert_detail_pembelian($email,$id_pembelian,$item['id_produk'],$item['jumlah']);
                $produk_untuk_diupdate = $db->ambil_data_per_produk($item['id_produk']);
                $db->update_stock($item['id_produk'], $produk_untuk_diupdate[0]['stok_produk'] - $item['jumlah']);
            }
            $_SESSION["sudah_voucher"] = '';
            $_SESSION["voucher"] = '';
            $db->kosongkan_keranjang($email);
            $db->delete_checkout($email);
            header('location: ../setelah_pembelian.php');
        }
        else{
            header('location: ../keranjang.php');
        }
    }
    else{
        header('location: ../login.php');
    }
?>