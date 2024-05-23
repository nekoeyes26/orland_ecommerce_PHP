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
	<title>Edit Produk</title>

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
        $db = new Database();
        if(isset($_SESSION['akses_id'])){
            $akses_id = $_SESSION['akses_id'];
        }else{
            $akses_id = '';
        };
        if ($akses_id == 1) {
            if (isset($_GET['id'])) {
                $kode_produk = $_GET['id'];
                if ($kode_produk != 0) {
                    $x = $db->data_produk($kode_produk);
    ?>
    <section class="order_details section_gap">
        <div class="container">
            <div class="billing_details" style="box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.07); background-color: white; padding: 3%; margin-top: 4%;">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Edit Produk</h3>
                        <form class="row contact_form" action="config/update_produk.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_produk" value="<?php echo $kode_produk ?>">
                            <div class="col-md-12 form-group" style="text-align: center;">
                            <img src="<?php echo $x[0]['gambar_produk1']?>" alt="" height="280" width="263" style="object-fit: contain;">
                            <img src="<?php echo $x[0]['gambar_produk2']?>" alt="" height="280" width="263" style="object-fit: contain;">
                            <img src="<?php echo $x[0]['gambar_produk3']?>" alt="" height="280" width="263" style="object-fit: contain;">
                            </div>
                            <div class="col-md-2 form-group">
                                <h5 style="padding-top: 10px;">Nama Produk</h5>
                            </div>
                            <div class="col-md-10 form-group">
                                <input type="text" required maxlength="100" class="form-control" name="nama_produk" placeholder="Nama Produk"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                value="<?php echo $x[0]['nama_produk']?>">
                            </div>
                            <div class="col-md-2 form-group">
                                <h5 style="padding-top: 10px;">Detail Produk</h5>
                            </div>
                            <div class="col-md-10 form-group">
                                <textarea type="text" required maxlength="5000" class="form-control" name="detail_produk" placeholder="Detail Produk"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'><?php echo $x[0]['detail_produk']?></textarea>
                            </div>
                            <div class="col-md-2 form-group">
                                <h5 style="padding-top: 10px;">Kategori</h5>
                            </div>
                            <div class="col-md-10 form-group p_star">
                                <select class="country_select" name="kategori">
								<?php
                                    $kode_kategori = $x[0]['kode_kategori'];
                                    foreach ($db->ambil_data_kategori() as $k) {
                                        echo "<option value".$k['kode_kategori'];
                                        if ($k['kode_kategori']==$kode_kategori) {
                                            echo " selected=selected";
                                        }
                                        echo ">" .$k['nama_kategori'] . "</option>";
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <h5 style="padding-top: 10px;">Harga Asli Produk</h5>
                            </div>
                            <div class="col-md-10 form-group">
								<div class="input_angka">
                                <input type="number" min="0" required max="9999999999999" class="form-control" name="harga_asli_produk" placeholder="Harga Asli Produk"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                value="<?php echo $x[0]['harga_asli_produk']?>">
								</div>
                            </div>
                            <div class="col-md-2 form-group">
                                <h5 style="padding-top: 10px;">Harga Diskon</h5>
                            </div>
                            <div class="col-md-10 form-group">
								<div class="input_angka">
                                <input type="number" min="0" required max="9999999999999" class="form-control" name="harga_diskon_produk" placeholder="Harga Diskon Produk"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                value="<?php echo $x[0]['harga_diskon_produk']?>">
								</div>
                            </div>
                            <div class="col-md-2 form-group">
                                <h5 style="padding-top: 10px;">Stok Produk</h5>
                            </div>
                            <div class="col-md-10 form-group">
								<div class="input_angka">
                                <input type="number" min="0" required max="9999999999999" class="form-control" name="stok_produk" placeholder="Stok Produk"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                value="<?php echo $x[0]['stok_produk']?>">
								</div>
                            </div>
                            <div class="col-md-2 form-group">
                                <h5 style="padding-top: 10px;">Gambar 1</h5>
                            </div>
                            <div class="col-md-10 form-group">
                                <label class="genric-btn primary radius">
                                    <input type="file" name="gambar_produk1" class="inputfile"
                                    accept="image/jpg, image/jpeg, image/png, image/webp"
                                    style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; position: absolute; z-index: -1;">
                                    <label style="pointer-events: none;"><span>Pilih File</span></label>
                                    <i class="fa fa-upload"></i>
                                </label>
                            </div>
                            <div class="col-md-2 form-group">
                                <h5 style="padding-top: 10px;">Gambar 2</h5>
                            </div>
                            <div class="col-md-10 form-group">
                                <label class="genric-btn primary radius">
                                    <input type="file" name="gambar_produk2" class="inputfile"
                                    accept="image/jpg, image/jpeg, image/png, image/webp"
                                    style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; position: absolute; z-index: -1;">
                                    <label style="pointer-events: none;"><span>Pilih File</span></label>
                                    <i class="fa fa-upload"></i>
                                </label>
                            </div>
                            <div class="col-md-2 form-group">
                                <h5 style="padding-top: 10px;">Gambar 3</h5>
                            </div>
                            <div class="col-md-10 form-group">
                                <label class="genric-btn primary radius">
                                    <input type="file" name="gambar_produk3" class="inputfile"
                                    accept="image/jpg, image/jpeg, image/png, image/webp"
                                    style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; position: absolute; z-index: -1;">
                                    <label style="pointer-events: none;"><span>Pilih File</span></label>
                                    <i class="fa fa-upload"></i>
                                </label>
                            </div>
							<div style="margin-left: 1.35%;">
								<input class="genric-btn primary-border radius" type="button" value="Batal" onclick="window.history.go(-1); return false;"/>
							</div>
							<!-- <button class="genric-btn primary-border radius" onclick="editProfil()" style="margin-left: 1.35%;">Batal</button> -->
                            <div style="margin: 0 auto; text-align: right;width: 87.65%;">
                                <input type="submit" value="Simpan" class="genric-btn primary radius" style="padding-left: 7%; padding-right: 7%">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</section>
	<!--================End Order Details Area =================-->
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
        var inputs = document.querySelectorAll( '.inputfile' );
        Array.prototype.forEach.call( inputs, function( input )
        {
            var label	 = input.nextElementSibling,
                labelVal = label.innerHTML;

            input.addEventListener( 'change', function( e )
            {
                var fileName = '';
                if( this.files && this.files.length > 1 )
                    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else
                    fileName = e.target.value.split( '\\' ).pop();

                if( fileName )
                    label.querySelector( 'span' ).innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });
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
</body>
</html>
<?php
                } else {
                    header('location:javascript://history.go(-1)');
                }
            } else {
                header('location:javascript://history.go(-1)');
            }
        }
        else{
            header('location: home.php');
        }
?>