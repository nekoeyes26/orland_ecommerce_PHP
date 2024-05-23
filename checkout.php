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
    <title>Checkout</title>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        if(isset($_SESSION['sudah_voucher'])){
            $sudah_voucher = $_SESSION['sudah_voucher'];
        }else{
            $sudah_voucher = '';
        }
        if(isset($_SESSION['voucher'])){
            $voucher = $_SESSION['voucher'];
        }else{
            $voucher = '';
        }
        $db = new Database();
        if($email != ''){
    ?>
    <!-- Start Banner Area -->
	<section style="height: 7%;"></section>
	<!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
        <?php
            foreach ($db->tampil_keranjang($email) as $kx) {
                $barang = $db->ambil_data_per_produk($kx['id_produk']);
                if ($barang[0]['stok_produk'] == 0) {
                    $db->delete_1_produk_keranjang($email, $kx['id_produk']);
                }
            }
            $cek = $db->tampil_keranjang($email);
            if (count($cek) > 0) {
                $x = $db->data_user($email);
                $ck = $db->tampil_data_checkout($email);
        ?>
            <?php
                if($sudah_voucher != "Sudah"){
            ?>
            <form action="config/input_voucher.php" method="POST">
            <div class="cupon_area">
                <div class="check_title">
                    <h2>Have a coupon?</a></h2>
                </div>
                <input type="text" name="input_voucher" placeholder="Enter coupon code">
                <!-- <a class="tp_btn" href="#">Apply Coupon</a> -->
                <input type="submit" class="genric-btn primary-border radius" value="Apply Coupon" style="width: 184px; height:40px">
            </div>
            </form>
            <?php
                }
            ?>
            <div class="billing_details">
                <form action="config/proses_pembelian.php" method="POST">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <div class="row contact_form">
                            <div class="col-md-12 form-group">
                                <h6>Nama Penerima<h6>
                                <input type="text" required maxlength="100" class="form-control" name="nama_penerima" placeholder="Nama Lengkap"
                                    style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                    value="<?php echo $x[0]['nama_lengkap']?>">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <h6>Nomor Telepon Penerima</h6>
                                <div class="input_angka">
                                <input type="text" required class="form-control" id="number" name="no_telp_penerima"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                value="<?php echo $x[0]['no_telp']?>">
                                </div>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <h6>Email Penerima</h6>
                                <input type="text" required class="form-control" id="email" name="email_penerima"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                value="<?php echo $x[0]['email']?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <h6>Tujuan<h6>
                                <input type="text" class="form-control" name="tujuan" placeholder="Tujuan"
                                    style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                    value="<?php echo $ck[0]['tujuan']?>" disabled>
                            </div>
                            <div class="col-md-12 form-group">
                                <h6>Kurir<h6>
                                <input type="text" class="form-control" name="kurir" placeholder="Kurir"
                                    style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                    value="<?php echo $ck[0]['kurir']?>" disabled>
                            </div>
                            <div class="col-md-12 form-group">
                                <h6>Detail Alamat</h6>
                                <textarea type="text" required maxlength="100" class="form-control" name="detail_alamat" placeholder="Detail Alamat"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'><?php echo $x[0]['alamat']?></textarea>
                            </div>
                            <!-- <div class="col-md-12 form-group p_star">
                                <select class="country_select" name='asal' id='asal'>
                                    
                                </select>
                            </div> -->
                            <!-- <div class="col-md-12 form-group p_star">
                                <select class="nice-select country_select" name='provinsi' id='provinsi' style="font-family: 'Poppins', sans-serif; font-size: 14px;">
                                    
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="nice-select country_select" id="kabupaten" name="kabupaten" style="font-family: 'Poppins', sans-serif; font-size: 14px;">

                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="nice-select country_select" id="kurir" name="kurir" style="font-family: 'Poppins', sans-serif; font-size: 14px;">
                                    
                                </select>
                            </div>
                            <input type="hidden" id="berat" name="berat" value="500" />
                            <div class="col-md-12 form-group p_star">
                                <select class="nice-select country_select" id="ongkir" name="ongkir" style="font-family: 'Poppins', sans-serif; font-size: 14px;">
                                    
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" name="hasilprovinsi" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" name="hasildistrik" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" name="hasiltipe" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" name="hasilkodepos" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" name="hasilekspedisi" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" name="hasilpaket" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" name="hasilongkir" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" name="hasilestimasi" />
                            </div> -->
                            <!-- <div class="col-md-12 form-group p_star">
                                <input id="cek" type="submit" value="Cek"/>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a>Product <span>Total</span></a></li>
                                <?php
                                    foreach($db->tampil_keranjang($email) as $produk){
                                ?>
                                <li><a><?php echo strlen($produk['nama_produk']) > 15 ? substr($produk['nama_produk'],0,14)."..." : $produk['nama_produk']?><span class="middle">x
                                            <?php echo $produk['jumlah']?></span> <span
                                            class="last">Rp. <?php echo number_format($produk['harga_diskon_produk'] * $produk['jumlah'],0,',','.')?></span></a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                            <ul class="list list_2">
                                <li><a>Subtotal <span>
                                    <?php $subtotal = 0;
                                        foreach ($db->tampil_keranjang($email) as $item) {
                                            $total_peritem = $item['harga_diskon_produk'] * $item['jumlah'];
                                            $subtotal = $subtotal + $total_peritem;
                                        }
                                        echo "Rp. ". number_format($subtotal,0,',','.');?></span></a></li>
                                <li><a>Shipping <span>Rp. <?php 
                                    $ongkir = $ck[0]['ongkir'];
                                    echo number_format($ongkir, 0, ',', '.')?></span></a></li>
                                <li><a>Potongan <span>Rp. <?php 
                                    if ($voucher != ''){
                                        echo number_format($voucher, 0, ',', '.');
                                    }
                                    else{
                                        echo 0;
                                    }
                                    ?></span></a></li>    
                                <li><a>Total <span>Rp. <?php
                                    $total_harga = $subtotal + $ongkir;
                                    if($voucher != ''){
                                        $total_harga = $total_harga - $voucher;
                                        if($total_harga < 0){
                                            $total_harga = 0;
                                        }
                                        echo number_format($total_harga,0,',','.');
                                    }
                                    else{
                                        echo number_format($subtotal + $ongkir,0,',','.');
                                    }
                                ?></span></a></li>
                                <input type="hidden" name="total_pembelian" value="<?php echo $total_harga ?>">
                            </ul>
                            <input type="submit" class="primary-btn" value="Proses Pembayaran" style="border-width: 0;">
                        </div>
                    </div>
                </div>
            </form>
                <?php
                }
                else{
                ?>
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h1>Keranjang Kosong</h1>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
    <?php
        include 'footer.php';
    ?>
    <script>
        document.querySelector(".input_angka").addEventListener("keypress", function (evt) {
			if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
			{
				evt.preventDefault();
			}
		});
    </script>
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
    <!-- <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/popper.min.js"></script> -->
    <!-- <script>
        $(document).ready(function(){
            $.ajax({
                type: 'post',
                url: 'dataprovinsi.php',
                success:function(hasil_provinsi){
                    $("select[name=provinsi]").html(hasil_provinsi);
                }
            })
            $("select[name=provinsi]").on("change", function(){
                var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");
                $.ajax({
                    type:'post',
                    url:'datadistrik.php',
                    data:'id_provinsi='+id_provinsi_terpilih,
                    success:function(hasil_distrik){
                        $("select[name=kabupaten]").html(hasil_distrik);
                    }
                })
            })
            $.ajax({
                type:'post',
                url:'dataekspedisi.php',
                success:function(hasiL_ekspedisi)
                {
                    $("select[name=kurir]").html(hasiL_ekspedisi);
                }
            })
            $("select[name=kurir]").on("change",function(){
                var ekspedisi_terpilih = $("select[name=kurir]").val();
                var distrik_terpilih = $("option:selected","select[name=kabupaten]").attr("id_distrik");
                var total_berat = $("input[name=berat]").val();
                $.ajax({
                    type:'post',
                    url:'datapaket.php',
                    data:'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+total_berat,
                    success:function(hasil_paket)
                    {
                        // console.log(hasil_paket);
                        $("select[name=ongkir]").html(hasil_paket);
                        $("input[name=hasilekspedisi]").val(ekspedisi_terpilih);
                    }
                })
            })
            $("select[name=kabupaten]").on("change",function(){
                var prov = $("option:selected",this).attr("nama_provinsi");
                var dist = $("option:selected",this).attr("nama_distrik");
                var tipe = $("option:selected",this).attr("tipe_distrik");
                var kodepos = $("option:selected",this).attr("kodepos");

                $("input[name=hasilprovinsi]").val(prov);
                $("input[name=hasildistrik]").val(dist);
                $("input[name=hasiltipe]").val(tipe);
                $("input[name=hasilkodepos]").val(kodepos);

            })
            $("select[name=ongkir]").on("change",function(){
                var paket = $("option:selected",this).attr("paket");
                var ongkir = $("option:selected",this).attr("ongkir");
                var etd = $("option:selected",this).attr("etd");
                
                $("input[name=hasilpaket]").val(paket);
                $("input[name=hasilongkir]").val(ongkir);
                $("input[name=hasilestimasi]").val(etd);

            })
        })


    </script> -->
</body>

</html>
<?php
    }else{
        header('Location: login.php');
    }
?>