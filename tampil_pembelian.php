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
	<title>Tampil Pembelian</title>

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>
<?php
	ob_start();
	include "header.php";
    if(isset($_SESSION['akses_id'])){
        $akses_id = $_SESSION['akses_id'];
    }else{
        $akses_id = '';
    };
    if ($akses_id == 1) {
?>

	<!-- Start Banner Area -->
	<section style="height: 6%;">
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap" style="padding-bottom: 50px; padding-top: 105px">
		<div class="container">
			<div class="section-top-border">
				<h3 class="mb-30">Riwayat Pembelian</h3>
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							<div class="serial">ID</div>
							<div class="country">Email</div>
							<div class="visit" style="max-width: 5%;">Item</div>
							<div class="country">Total Pembelian</div>
                            <div class="country">Waktu Pembelian</div>
                            <div class="country">No Telp Penerima</div>
                            <div class="country">Email Penerima</div>
                            <div class="percentage">Tujuan</div>
						</div>
                        <?php 
                            foreach ($db->tampil_semua_pembelian() as $data) {
                        ?>
						<div class="table-row">
							<div class="serial"><?php echo $data['id_pembelian']?></div>
							<div class="country"><?php echo $data['email']?></div>
							<div class="visit" style="max-width: 5%;"><?php echo $data['jumlah_item']?></div>
							<div class="country">Rp. <?php echo number_format($data['harga_pembelian'], 0, ',', '.')?></div>
                            <div class="country"><?php echo $data['tanggal_pembelian']?></div>
                            <div class="country"><?php echo $data['no_telp_penerima']?></div>
                            <div class="country"><?php echo $data['email_penerima']?></div>
                            <div class="percentage"><?php echo $data['tujuan']?></div>
						</div>
                        <?php }
                        ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
    <?php
        include "footer.php"
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
    }
    else{
        header('Location: home.php');
    }
?>