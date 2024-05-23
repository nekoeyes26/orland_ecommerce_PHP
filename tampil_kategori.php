<!DOCTYPE html>
<html lang="zxx" class="no-js">

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
	<title>Produk Orland</title>

	<!--
            CSS
            ============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        include "header.php";
        $db = new Database();
		if (isset($_GET['id'])) {
			$kode_kategori = $_GET['id'];
			if ($kode_kategori != 0) {
    ?>
    <!-- Start Banner Area -->
	<section style="height: 20%;">
	</section>
	<!-- End Banner Area -->
    <?php
        $halaman = 6;
        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
        $result = $db->ambil_produk_by_kategori($kode_kategori);
        $total = count($result);
        $pages = ceil($total/$halaman);
        $data = $db->ambil_produk_by_kategori_9($kode_kategori,$mulai, $halaman);
        $no =$mulai+1;
    ?>
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
					<ul class="main-categories">
						<?php
							foreach ($db->ambil_data_kategori() as $kt) {
						?>
						<li class="main-nav-list"><a href="tampil_kategori.php?id=<?php echo $kt['kode_kategori']?>" aria-expanded="false" aria-controls="fruitsVegetable">
							<span class="lnr lnr-arrow-right"></span><?php echo $kt['nama_kategori'] ?><span class="number">(
								<?php
									$jml_per_kt = $db->ambil_produk_by_kategori($kt['kode_kategori']);
									echo count($jml_per_kt);
								?>
							)</span></a>
						</li>
						<?php
							}
						?>
					</ul>
				</div>
			</div>
                <?php
                    if (count($data) > 0) {
                ?>
			<div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting"></div>
					<div class="sorting mr-auto"></div>
                    <div class="pagination">
						<?php for ($i=1; $i<=$pages ; $i++){ ?>
							<?php if ($page==$i) { ?>
								<li><a class="active"><?php echo $i; ?></a></li>
							<?php } else {
								$c = "";
							?>
								<li><a href="?halaman=<?php echo $i; ?><?php echo $c ?>"><?php echo $i; ?></a></li>
						<?php
							}
						}
						?>
					</div>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
                    <?php
                            foreach ($data as $x) {
                    ?>
						<!-- single product -->
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<a href="detail_produk.php?id=<?php echo $x['id_produk']; ?>">
									<img class="img-fluid" src="<?php echo $x['gambar_produk1']?>" alt="" style="width: 225px; height: 225px; object-fit: contain;">
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
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting mr-auto"></div>
					<div class="pagination">
						<?php for ($i=1; $i<=$pages ; $i++){ ?>
							<?php if ($page==$i) { ?>
								<li><a class="active"><?php echo $i; ?></a></li>
							<?php } else {
								$c = "";
							?>
								<li><a href="?id=<?php echo $kode_kategori?>&halaman=<?php echo $i; ?><?php echo $c ?>"><?php echo $i; ?></a></li>
							<!-- <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
							<a href="#" class="active">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
							<a href="#">6</a>
							<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> -->
						<?php
							}
						}
						?>
					</div>
				</div>
				<!-- End Filter Bar -->
            <?php
                }
                else{
            ?>
                <div class="col-xl-9 col-lg-8 col-md-7" style="text-align: center;">
                <h2>Tidak Ada Produk</h2>
                </div>
            <?php
                }
            ?>
			</div>
		</div>
	</div>

	<!-- Start related-product Area -->
    <section class="related-product-area section_gap_bottom" style="padding-top: 10%;">
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
                        foreach ($db->tampil_produk_random_by_kategori($kode_kategori) as $produk) {
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
        include "footer.php";
    ?>
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
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
			header('location: all_products.php');
		}
	}
	else{
		header('location: all_products.php');
	}
?>