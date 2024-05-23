<?php
    ob_start();
    include('config.php');
    $db = new database();
    if (isset($_GET['id'])) {
        $id_banner = $_GET['id'];
        if ($id_banner != 0) {
            $judul = $_POST['judul'];
            $keterangan = $_POST['keterangan'];
            $link_terkait = $_POST['link_terkait'];
            // echo $id_banner."<br>";
            // echo $judul."<br>";
            // echo $keterangan."<br>";
            // echo $link_terkait."<br>";
            $db->update_banner_tanpa_gambar($id_banner, $judul,$keterangan,$link_terkait);
            $cekdir=is_dir("../img/banner");
            if ($cekdir) {
                opendir("../img/banner");
            } else {
                mkdir("../img/banner");
                chmod("../img/banner", 0755);
                opendir("../img/banner");
            }
            if($_FILES['gambar']['name'] != ''){
                $daftar_list = array("jpeg", "jpg", "png", "webp");
                $nama_file1 = $_FILES['gambar']['name'];
                $pecah1 = explode(".", $nama_file1);
                $ekstensi1 = $pecah1[count($pecah1) - 1];
                if (in_array($ekstensi1, $daftar_list)) {
                    $lokasi_img_produk1 = $_FILES['gambar']['tmp_name'];
                    $nama_img_produk1 = $_FILES['gambar']['name'];
                    $dir_img_produk1 = "../img/banner/$nama_img_produk1";
                    move_uploaded_file($lokasi_img_produk1, $dir_img_produk1);
                    $img_produk1 = "img/banner/$nama_img_produk1";
                    $db->update_gambar_banner($id_banner, $img_produk1);
                } else {
                    echo "Type file harus berupa gambar <br>";
                }
            }
            header('location: ../home.php');
        }
    }
?>