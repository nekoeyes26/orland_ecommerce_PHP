<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.php"><img src="img/logo_orland.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <?php
                            include "./config/config.php";
                            $db = new Database();
                            session_start();
                            if(isset($_SESSION['header'])){
                                $header = $_SESSION['header'];
                            }else{
                                $header = '';
                            };
                            if ($header == 1) {
                        ?>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Admin Tools</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="tambah_produk.php">Tambah Produk</a></li>
                                <li class="nav-item"><a class="nav-link" href="tambah_user.php">Tambah User</a></li>
                                <li class="nav-item"><a class="nav-link" href="lihat_edit_produk.php">Edit Produk</a></li>
                                <li class="nav-item"><a class="nav-link" href="banner_setting.php">Banner Setting</a></li>
                                <li class="nav-item"><a class="nav-link" href="tampil_pembelian.php">Data Pembelian</a></li>
                            </ul>
                        </li>
                        <?php
                            }
                        ?>
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Kategori</a>
                            <ul class="dropdown-menu">
                                <?php 
                                    foreach ($db->ambil_data_kategori() as $kt) {
                                ?>
                                <li class="nav-item"><a class="nav-link" href="tampil_kategori.php?id=<?php echo $kt['kode_kategori']?>"><?php echo $kt['nama_kategori'] ?></a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="all_products.php">Semua Produk</a></li>
                        <?php
                            ob_start();
                            if(isset($_SESSION['email'])){
                                $email = $_SESSION['email'];
                            }else{
                                $email = '';
                            };
                            $db = new Database();
                            if($header == 1 || $header == 2) {
                                $cek_sudah_beli = $db->tampil_riwayat_pembelian_per_user($email);
                                    if (count($cek_sudah_beli) > 0) {
                        ?>
                        <li class="nav-item"><a class="nav-link" href="riwayat_pembelian.php">Riwayat Pembelian</a></li>
                        <?php
                                }
                            }
                        ?>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">User</a>
                            <ul class="dropdown-menu">
                                <?php
                                    if($header == 1 || $header == 2){
                                ?>
                                    <li class="nav-item"><a class="nav-link" href="user_profile.php">User Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                                <?php
                                    }
                                    else{
                                ?>
                                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="wishlist.php" class="cart"><span class="ti-heart"></span></a></li>
                        <li class="nav-item"><a href="keranjang.php" class="cart"><span class="ti-bag"></span></a></li>
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between" method="POST" action="search_page.php">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here" name="cari">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- End Header Area -->