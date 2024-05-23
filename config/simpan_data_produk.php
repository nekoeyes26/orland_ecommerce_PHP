<?php
    include('config.php');
    $koneksi = new database();

    $cekdir=is_dir("../img_produk");
    if ($cekdir) {
        opendir("../img_produk");
    } else {
        mkdir("../img_produk");
        chmod("../img_produk", 0755);
        opendir("../img_produk");
    }
    $daftar_list = array("jpeg", "jpg", "png", "webp");
    $nama_file1 = $_FILES['gambar_produk1']['name'];
    $pecah1 = explode(".", $nama_file1);
    $ekstensi1 = $pecah1[count($pecah1) - 1];
    if (in_array($ekstensi1, $daftar_list)) {
        $lokasi_img_produk1 = $_FILES['gambar_produk1']['tmp_name'];
        $nama_img_produk1 = $_FILES['gambar_produk1']['name'];
        $dir_img_produk1 = "../img_produk/$nama_img_produk1";
        move_uploaded_file($lokasi_img_produk1, $dir_img_produk1);
        $img_produk1 = "img_produk/$nama_img_produk1";

        $nama_file2 = $_FILES['gambar_produk2']['name'];
        $pecah2 = explode(".", $nama_file2);
        $ekstensi2 = $pecah2[count($pecah2) - 1];
        if (in_array($ekstensi2, $daftar_list)) {
            $lokasi_img_produk2 = $_FILES['gambar_produk2']['tmp_name'];
            $nama_img_produk2 = $_FILES['gambar_produk2']['name'];
            $dir_img_produk2 = "../img_produk/$nama_img_produk2";
            move_uploaded_file($lokasi_img_produk2, $dir_img_produk2);
            $img_produk2 = "img_produk/$nama_img_produk2";

            $nama_file3 = $_FILES['gambar_produk3']['name'];
            $pecah3 = explode(".", $nama_file3);
            $ekstensi3 = $pecah3[count($pecah3) - 1];
            if (in_array($ekstensi3, $daftar_list)) {
                $lokasi_img_produk3 = $_FILES['gambar_produk3']['tmp_name'];
                $nama_img_produk3 = $_FILES['gambar_produk3']['name'];
                $dir_img_produk3 = "../img_produk/$nama_img_produk3";
                move_uploaded_file($lokasi_img_produk3, $dir_img_produk3);
                $img_produk3 = "img_produk/$nama_img_produk3";
    
                $koneksi->tambah_data_produk(
                    $_POST['nama_produk'],
                    $_POST['kode_kategori'],
                    $_POST['detail_produk'],
                    $_POST['harga_diskon_produk'],
                    $_POST['harga_asli_produk'],
                    $_POST['stok_produk'],
                    $img_produk1,
                    $img_produk2,
                    $img_produk3
                );
                header('location: ../home.php');
            } else {
                echo "Type file harus berupa gambar <br>";
            }
        } else {
            echo "Type file harus berupa gambar <br>";
        }
    } else {
        echo "Type file harus berupa gambar <br>";
    }
?>