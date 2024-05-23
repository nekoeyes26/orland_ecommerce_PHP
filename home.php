<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav_orland.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Orland</title>
    <!--CSS ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php
        include 'header.php';
    ?>
    <?php
        $db = new Database();
    ?>
    <!-- start banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel" style="align-items: center;">
                        <!-- single-slide -->
                        <?php
                            foreach($db->ambil_data_banner() as $banner){
                        ?>
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1><?php echo $banner['judul']?></h1>
                                    <p><?php echo $banner['keterangan']?></p>
                                    <div class="add-bag d-flex align-items-center">
                                        <a class="add-btn" href="<?php echo $banner['link_terkait']?>"><span class="lnr lnr-arrow-right"></span></a>
                                        <span class="add-text text-uppercase">Lihat Selengkapnya...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="<?php echo $banner['gambar']?>" alt="">
                                </div>
                            </div>
                        </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <!-- start features Area -->
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon1.png" alt="">
                        </div>
                        <h6>Free Delivery</h6>
                        <p>Gratis ongkir untuk pengiriman barang</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon2.png" alt="">
                        </div>
                        <h6>Return Policy</h6>
                        <p>Garansi barang kembali jika tidak sesuai pesanan</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon5.png" alt="">
                        </div>
                        <h6>Serba Diskon</h6>
                        <p>Temukan harga termurah hanya ada disini</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features Area -->
    <!-- Start category Area -->
    <section class="category-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="img/category/logitech-g304.webp" alt="" style="height: 191px; width: 476px; object-fit :cover;">
                                <a href="img/category/logitech-g304.webp" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Logitech G304</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="img/category/arctis_7_black_hero_wide.jpg" alt="" style="height: 191px; width: 223px; object-fit :cover;">
                                <a href="img/category/arctis_7_black_hero_wide.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Steel Series Arctis 7</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="img/category/maxfit61-rgb-mmechanical-keyboard.jpg" alt="" style="height: 191px; width: 223px; object-fit :cover;">
                                <a href="img/category/maxfit61-rgb-mmechanical-keyboard.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Fantech MAXFIT61</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="img/category/plp-mice-hero-desktop-2.webp" alt="" style="height: 191px; width: 476px; object-fit :cover;">
                                <a href="img/category/plp-mice-hero-desktop-2.webp" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Logitech G502 X Lightspeed Wireless Gaming Mouse</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-deal">
                        <div class="overlay"></div>
                        <img class="img-fluid w-100" src="img/category/Razer-Basilisk-V3-Pro.jpg" alt="" style="height: 413px; width: 350px; object-fit :cover;">
                        <a href="img/category/Razer-Basilisk-V3-Pro.jpg" class="img-pop-up" target="_blank">
                            <div class="deal-details">
                                <h6 class="deal-title">Razer Basilisk V3 Pro</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End category Area -->
    <!-- start product Area -->
    <section class="owl-carousel active-product-area section_gap">
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Produk Terbaru</h1>
                            <p>Telah Hadir Produk Produk Baru di Toko Kami!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php
                    foreach ($db->tampil_produk_terbaru() as $x) {
                ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <a href="detail_produk.php?id=<?php echo $x['id_produk']; ?>">
                            <img src="<?php echo $x['gambar_produk1']?>" alt="" height="280" width="263" style="object-fit: contain;">
                            </a>
                            <div class="product-details">
                                <h6><?php echo strlen($x['nama_produk']) > 46 ? substr($x['nama_produk'], 0, 46)."..." : $x['nama_produk'] ?></h6>
                                <div class="price">
                                    <h6>Rp. <?php echo number_format($x['harga_diskon_produk'], 0, ',', '.')?></h6>
                                    <h6 class="l-through">Rp. <?php echo number_format($x['harga_asli_produk'], 0, ',', '.')?></h6>
                                </div>
                                <?php
                                    if ($x['stok_produk'] > 0) {
                                ?>
                                <div class="prd-bottom">
                                    <a href="config/tambah_keranjang.php?id=<?php echo $x['id_produk']; ?>" class="social-info" type="submit">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="config/tambah_wishlist.php?id=<?php echo $x['id_produk']; ?>" class="social-info" type="submit">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="detail_produk.php?id=<?php echo $x['id_produk']; ?>" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                    <?php
                                    if (isset($_SESSION['header'])) {
                                        $header = $_SESSION['header'];
                                    } else {
                                        $header = '';
                                    };
                                    if ($header == 1) {
                                    ?>
                                    <a href="edit_produk.php?id=<?php echo $x['id_produk']; ?>" class="social-info">
                                        <span class="lnr lnr-pencil"></span>
                                        <p class="hover-text">Edit Info</p>
                                    </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                } else{
                                ?>
                                <div class="prd-bottom">
                                    <button class="genric-btn danger" style="width:100%;cursor: not-allowed; pointer-events: all !important; display: inline-block;">Stok Habis</button>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Mouse Impianmu</h1>
                            <p>Mouse yang kamu idamkan ada disini</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php
                    foreach ($db->tampil_produk_mouse() as $x) {
                ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <a href="detail_produk.php?id=<?php echo $x['id_produk']; ?>">
                            <img src="<?php echo $x['gambar_produk1']?>" alt="" height="280" width="263" style="object-fit: contain;">
                            </a>
                            <div class="product-details">
                                <h6><?php echo strlen($x['nama_produk']) > 46 ? substr($x['nama_produk'],0,46)."..." : $x['nama_produk'] ?></h6>
                                <div class="price">
                                    <h6>Rp. <?php echo number_format($x['harga_diskon_produk'],0,',','.')?></h6>
                                    <h6 class="l-through">Rp. <?php echo number_format($x['harga_asli_produk'],0,',','.')?></h6>
                                </div>
                                <?php
                                    if ($x['stok_produk'] > 0) {
                                ?>
                                <div class="prd-bottom">
                                    <a href="config/tambah_keranjang.php?id=<?php echo $x['id_produk']; ?>" class="social-info" type="submit">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="config/tambah_wishlist.php?id=<?php echo $x['id_produk']; ?>" class="social-info" type="submit">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="detail_produk.php?id=<?php echo $x['id_produk']; ?>" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                    <?php
                                    if (isset($_SESSION['header'])) {
                                        $header = $_SESSION['header'];
                                    } else {
                                        $header = '';
                                    };
                                    if ($header == 1) {
                                    ?>
                                    <a href="edit_produk.php?id=<?php echo $x['id_produk']; ?>" class="social-info">
                                        <span class="lnr lnr-pencil"></span>
                                        <p class="hover-text">Edit Info</p>
                                    </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                } else{
                                ?>
                                <div class="prd-bottom">
                                    <button class="genric-btn danger" style="width:100%;cursor: not-allowed; pointer-events: all !important; display: inline-block;">Stok Habis</button>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Keyboard Impianmu</h1>
                            <p>Keyboard yang kamu cari, tersedia disini!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php
                    foreach ($db->tampil_produk_keyboard() as $x) {
                ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <a href="detail_produk.php?id=<?php echo $x['id_produk']; ?>">
                            <img src="<?php echo $x['gambar_produk1']?>" alt="" height="280" width="263" style="object-fit: contain;">
                            </a>
                            <div class="product-details">
                                <h6><?php echo strlen($x['nama_produk']) > 46 ? substr($x['nama_produk'],0,46)."..." : $x['nama_produk'] ?></h6>
                                <div class="price">
                                    <h6>Rp. <?php echo number_format($x['harga_diskon_produk'],0,',','.')?></h6>
                                    <h6 class="l-through">Rp. <?php echo number_format($x['harga_asli_produk'],0,',','.')?></h6>
                                </div>
                                <?php
                                    if ($x['stok_produk'] > 0) {
                                ?>
                                <div class="prd-bottom">
                                    <a href="config/tambah_keranjang.php?id=<?php echo $x['id_produk']; ?>" class="social-info" type="submit">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="config/tambah_wishlist.php?id=<?php echo $x['id_produk']; ?>" class="social-info" type="submit">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="detail_produk.php?id=<?php echo $x['id_produk']; ?>" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                    <?php
                                    if (isset($_SESSION['header'])) {
                                        $header = $_SESSION['header'];
                                    } else {
                                        $header = '';
                                    };
                                    if ($header == 1) {
                                    ?>
                                    <a href="edit_produk.php?id=<?php echo $x['id_produk']; ?>" class="social-info">
                                        <span class="lnr lnr-pencil"></span>
                                        <p class="hover-text">Edit Info</p>
                                    </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                } else{
                                ?>
                                <div class="prd-bottom">
                                    <button class="genric-btn danger" style="width:100%;cursor: not-allowed; pointer-events: all !important; display: inline-block;">Stok Habis</button>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end product Area -->

    <!-- Start brand Area -->
    <section class="brand-area section_gap">
        <div class="container">
            <div class="row">
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="img/brand/Fantech-Logo.png" alt="" style="max-height: 70px;">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="img/brand/RAZER-logo.png" alt="" style="max-height: 70px;">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="img/brand/logitech-logo.png" alt="" style="max-height: 70px;">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="img/brand/Steelseries-logo.png" alt="" style="max-height: 70px;">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="img/brand/hyper-x-logo.png" alt="" style="max-height: 70px;">
                </a>
            </div>
        </div>
    </section>
    <!-- End brand Area -->
    <!-- Start related-product Area -->
    <section class="related-product-area section_gap_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Produk Rekomendasi</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                    <?php
                        foreach ($db->tampil_produk_random() as $produk) {
                    ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="detail_produk.php?id=<?php echo $produk['id_produk']; ?>"><img src="<?php echo $produk['gambar_produk1']?>" alt="" style="height: 70px; width: 70px;object-fit: contain;"></a>
                                <div class="desc">
                                    <a href="#" class="title"><?php echo strlen($produk['nama_produk']) > 19 ? substr($produk['nama_produk'],0,19)."..." : $produk['nama_produk'] ?></a>
                                    <div class="price">
                                        <h6>Rp. <?php echo number_format($produk['harga_diskon_produk'],0,',','.')?></h6>
                                        <h6 class="l-through">Rp. <?php echo number_format($produk['harga_asli_produk'],0,',','.')?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ctg-right">
                        <?php 
                            $produk_terbaru = $db->tampil_produk_terbaru()
                        ?>
                        <a href="detail_produk.php?id=<?php echo $produk_terbaru[0]['id_produk']?>">
                            <img class="img-fluid d-block mx-auto" src="<?php echo $produk_terbaru[0]['gambar_produk1']?>" alt="" style="height: 301px; width: 255px; object-fit :cover;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End related-product Area -->
    <?php
        include 'footer.php';
    ?>
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>