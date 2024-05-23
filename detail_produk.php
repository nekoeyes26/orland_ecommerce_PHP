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
	<title>Detail Produk</title>
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
		ob_start();
        include "header.php";
        $db = new Database();
		if (isset($_GET['id'])) {
			$kode_produk = $_GET['id'];
			if ($kode_produk != 0) {
				$x = $db->data_produk($kode_produk);
    ?>
    <!-- Start Banner Area -->
	<section style="height: 3%;"></section>
	<!-- End Banner Area -->
    
    <!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="<?php echo $x[0]['gambar_produk1']?>" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="<?php echo $x[0]['gambar_produk2']?>" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="<?php echo $x[0]['gambar_produk3']?>" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo $x[0]['nama_produk']?></h3>
						<h2><?php echo "Rp. ".number_format($x[0]['harga_diskon_produk'], 0, ',', '.')?></h2>
						<ul class="list">
							<li><a class="active" href="tampil_kategori.php?id=<?php echo $x[0]['kode_kategori']?>"><span>Kategori</span> : <?php echo $x[0]['nama_kategori']?></a></li>
							<li><a href="#"><span>Stock</span> : <?php echo $x[0]['stok_produk']?></a></li>
						</ul>
						<p><?php echo $x[0]['detail_produk']?></p>
						<form action="./config/tambah_keranjang.php?id=<?php echo $x[0]['id_produk'];?>" method="post">
						<div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="text" name="jumlah" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
							 class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div>
						<div class="card_area d-flex align-items-center">
							<input type="submit" class="primary-btn" value="Add to Cart" style="border-width: 0;">
							<a class="icon_btn" href="config/tambah_wishlist.php?id=<?php echo $x[0]['id_produk'];?>"><i class="lnr lnr lnr-heart"></i></a>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p>
						<?php 
							$data = $db->tampil_produk_by_id($kode_produk);
							echo $data[0]['detail_produk'];
						?>
					</p>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->
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
			header('location: home.php');
		}
	}
	else{
		header('location: home.php');
	}
?>