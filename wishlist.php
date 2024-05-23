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
    <title>Wishlist</title>
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
        ob_start();
        include 'header.php';
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
        }else{
            $email = '';
        };
        $db = new Database();
        if($email != ''){
    ?>
    <!-- Start Banner Area -->
	<section style="height: 20%;"></section>
	<!-- End Banner Area -->
    <!-- start product Area -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>WISHLIST</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php
                    $cek = $db->tampil_wishlist($email);
                    if (count($cek) > 0) {
                        foreach ($db->tampil_wishlist($email) as $x) {
                ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <a href="detail_produk.php?id=<?php echo $x['id_produk']; ?>">
                            <img src="<?php echo $x['gambar_produk1']?>" alt="" height="280" width="263" style="object-fit: contain;">
                            </a>
                            <div class="product-details">
                                <h6><?php echo $x['nama_produk'] ?></h6>
                                <div class="price">
                                    <h6>Rp. <?php echo number_format($x['harga_diskon_produk'],0,',','.')?></h6>
                                    <h6 class="l-through">Rp. <?php echo number_format($x['harga_asli_produk'],0,',','.')?></h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="config/tambah_keranjang.php?id=<?php echo $x['id_produk']; ?>" class="social-info" type="submit">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="config/delete_wishlist.php?id=<?php echo $x['id_produk']; ?>" class="social-info" type="submit">
                                        <span class="lnr lnr-cross"></span>
                                        <p class="hover-text" style="font-size: xx-small;">Delete Wishlist</p>
                                    </a>
                                    <a href="detail_produk.php?id=<?php echo $x['id_produk']; ?>" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                    <?php
                                        if(isset($_SESSION['header'])){
                                            $header = $_SESSION['header'];
                                        }else{
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
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    else{
                    ?>
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h3>Tidak ada Produk</h3>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
    <!-- end product Area -->
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
<?php
    }else{
        header('Location: login.php');
    }
?>