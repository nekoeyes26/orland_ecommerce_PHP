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
    <title>Keranjang</title>

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
    <!--================Cart Area =================-->
    <div class="container">
        <div class="cart_inner">
            <?php
                foreach ($db->tampil_keranjang($email) as $kx) {
                    $barang = $db->ambil_data_per_produk($kx['id_produk']);
                    if ($barang[0]['stok_produk'] == 0) {
                        $db->delete_1_produk_keranjang($email, $kx['id_produk']);
                    }
                }
                $cek = $db->tampil_keranjang($email);
                if (count($cek) > 0) {
            ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col" style="width: 160px;">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col" style="width: 160px;">Total</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($db->tampil_keranjang($email) as $x) {
                    ?>    
                        <form action="./config/update_cart.php?id=<?php echo $x['id_produk'];?>" method="post">
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="<?php echo $x['gambar_produk1'] ?>" alt="" style="height: 102px; width: 152px; object-fit:contain">
                                    </div>
                                    <div class="media-body">
                                        <p><?php echo $x['nama_produk'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>Rp. <?php echo number_format($x['harga_diskon_produk'],0,',','.') ?></h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input type="number" name="jumlah" id="sst" maxlength="12" value="<?php echo $x['jumlah'] ?>" title="Quantity:"
                                        class="input-text qty">
                                    <!-- <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                        class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                        class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button> -->
                                </div>
                            </td>
                            <td>
                                <h5>Rp. <?php echo number_format($x['harga_diskon_produk'] * $x['jumlah'],0,',','.')?></h5>
                            </td>
                            <td>
                                <input type="submit" class="gray_btn" value="Update Cart" style="cursor:pointer; width: 110px; padding: 0px;">
                            </td>
                        </tr>
                        </form>
                    <?php
                        }
                    ?>
                    </tbody>
                    </table>
                    <table class="table">
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td style="width: 200px;">
                                <h5>Subtotal</h5>
                            </td>
                            <td style="width: 160px;">
                                <h5>
                                <?php
                                    $cek = $db->tampil_keranjang($email);
                                    if (count($cek) > 0) {
                                        $subtotal = 0;
                                        foreach ($db->tampil_keranjang($email) as $x) {
                                            $total_peritem = $x['harga_diskon_produk'] * $x['jumlah'];
                                            $subtotal = $subtotal + $total_peritem;
                                        }
                                        echo "Rp. ". number_format($subtotal,0,',','.');
                                    }
                                    else{
                                        echo "Rp. 0";
                                    }
                                ?>
                                </h5>
                            </td>
                        </tr>
                        <form action="./config/checkout_ke_pembayaran.php" method="post">
                        <tr class="shipping_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <!-- <h5>Alamat Pengiriman</h5> -->
                            </td>
                            <td>
                                <div class="shipping_box">
                                    <h6>Alamat Pengiriman <i class="fa fa-truck" aria-hidden="true"></i></h6>
                                    <select class="nice-select shipping_select" id='provinsi' name='provinsi' style="font-family: 'Roboto', sans-serif; font-size: 14px;" required>
                                        
                                    </select>
                                    <select class="nice-select shipping_select" id="kabupaten" name="kabupaten" style="font-family: 'Roboto', sans-serif; font-size: 14px;" required>
                                        
                                    </select>
                                    <select class="nice-select shipping_select" id="kurir" name="kurir" style="font-family: 'Roboto', sans-serif; font-size: 14px;" required>
                                        
                                    </select>
                                    <input type="hidden" id="berat" name="berat" value="500" />
                                    <select class="nice-select shipping_select" id="ongkir" name="ongkir" style="font-family: 'Roboto', sans-serif; font-size: 14px;" required>
                                        
                                    </select>
                                    <input type="text" name="hasilprovinsi" hidden/>
                                    <input type="text" name="hasildistrik" hidden/>
                                    <input type="text" name="hasiltipe" hidden/>
                                    <input type="text" name="hasilkodepos" hidden/>
                                    <input type="text" name="hasilekspedisi" hidden/>
                                    <input type="text" name="hasilpaket" hidden/>
                                    <input type="text" name="hasilongkir" hidden/>
                                    <input type="text" name="hasilestimasi" hidden/>
                                    <!-- <a class="gray_btn" href="#">Update Details</a> -->
                                </div>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="all_products.php">Continue Shopping</a>
                                    <input type="submit" class="primary-btn" value="Proceed to checkout" style="border-width: 0;">
                                    <!-- <a class="primary-btn" href="checkout.php">Proceed to checkout</a> -->
                                </div>
                            </td>
                        </tr>
                        </form>
                </table>
            </div>
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
    <!--================End Cart Area =================-->
    <?php
        include 'footer.php';
    ?>
    <!-- <script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script> -->
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
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/popper.min.js"></script>
    <script>
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
    </script>
</body>

</html>
<?php
    }else{
        header('Location: login.php');
    }
?>