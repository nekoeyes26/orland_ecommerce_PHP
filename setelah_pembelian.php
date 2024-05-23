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
	<title>Thank You!</title>

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
        include 'header.php';
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
        }else{
            $email = '';
        };
        $db = new Database();
		$data_pembelian = $db->tampil_data_pembelian($email);
        if($email != ''){
    ?>
	<!-- Start Banner Area -->
	<section style="height: 9%;"></section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation">Thank you. Your order has been received.</h3>
			<div class="row order_d_inner">
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Ringkasan Pembelian</h4>
						<ul class="list">
							<li><a><span>Email Pembeli</span> : <?php echo $data_pembelian[0]['email'] ?></a></li>
							<li><a><span>Total Item Dibeli</span> : <?php echo $data_pembelian[0]['jumlah_item']?></a></li>
							<li><a><span>Waktu Pembelian</span> : <?php echo $data_pembelian[0]['tanggal_pembelian']?></a></li>
							<li><a><span>Total Pembelian</span> : Rp. <?php echo number_format($data_pembelian[0]['harga_pembelian'],0,',','.')?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Ringkasan Pengiriman</h4>
						<ul class="list">
							<li><a><span>Ongkos Kirim</span> : Rp. <?php echo number_format($data_pembelian[0]['ongkir'],0,',','.') ?></a></li>
							<li><a><span>Kurir</span> : <?php echo $data_pembelian[0]['kurir']?></a></li>
							<li><a><span>Tujuan Pengiriman</span> : <?php echo $data_pembelian[0]['tujuan']?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Ringkasan Penerima</h4>
						<ul class="list">
							<li><a><span>Nama Penerima</span> : <?php echo $data_pembelian[0]['nama_penerima'] ?></a></li>
							<li><a><span>No Telp Penerima</span> : <?php echo $data_pembelian[0]['no_telp_penerima']?></a></li>
							<li><a><span>Email Penerima</span> : <?php echo $data_pembelian[0]['email_penerima']?></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<h2>Detail Ringkasan Pembelian</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($db->tampil_detail_pembelian($email,$data_pembelian[0]['id_pembelian']) as $detail){
							?>
							<tr>
								<td>
									<p><?php echo strlen($detail['nama_produk']) > 55 ? substr($detail['nama_produk'],0,52)."..." : $detail['nama_produk']?></p>
								</td>
								<td>
									<h5>x <?php echo $detail['jumlah_dibeli']?></h5>
								</td>
								<td>
									<p>Rp. <?php echo number_format($detail['jumlah_dibeli'] * $detail['harga_diskon_produk'],0,',','.')?></p>
								</td>
							</tr>
							<?php
								}
							?>
							<tr>
								<td>
									<h4>Subtotal</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p><?php $subtotal = 0;
                                        foreach ($db->tampil_detail_pembelian($email, $data_pembelian[0]['id_pembelian']) as $item) {
                                            $total_peritem = $item['harga_diskon_produk'] * $item['jumlah_dibeli'];
                                            $subtotal = $subtotal + $total_peritem;
                                        }
                                        echo "Rp. ". number_format($subtotal,0,',','.');?></p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Pengiriman</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Rp. <?php echo number_format($data_pembelian[0]['ongkir'],0,',','.')?></p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Potongan Voucher</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Rp. <?php echo number_format(($subtotal + $data_pembelian[0]['ongkir']) - $data_pembelian[0]['harga_pembelian'],0,',','.')?></p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Rp. <?php echo number_format($data_pembelian[0]['harga_pembelian'],0,',','.')?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->
	<?php
        include 'footer.php';
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
        header('Location: login.php');
    }
?>