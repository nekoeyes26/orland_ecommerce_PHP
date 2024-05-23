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
    <title>Tambah Produk</title>
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
        $db = new Database();
?>

    <!-- Start Banner Area -->
	<section style="height: 20%;">
	</section>
	<!-- End Banner Area -->
    
    <div class="whole-wrap pb-100">
        <div class="container">
            <div class="section-top-border">
                <h3 class="mb-30">Tambah produk</h3>
                <div class="row">
                    <div class="col-lg-2 col-md-4 mt-sm-30" style="padding-left: 0px; padding-right: 0px;">
                        <div class="single-input" style="background-color: transparent;">
                            Nama Produk
                        </div>
                        <div class="single-input" style="background-color: transparent;">
                            Kategori Produk
                        </div>
                        <div class="single-input" style="background-color: transparent; height: 102px;">
                            Detail Produk
                        </div>
                        <div class="single-input" style="background-color: transparent;">
                            Harga Asli Produk
                        </div>
                        <div class="single-input" style="background-color: transparent;">
                            Harga Diskon Produk
                        </div>
                        <div class="single-input" style="background-color: transparent;">
                            Stok Produk
                        </div>
                        <div class="single-input" style="background-color: transparent; height: 46px; padding-top: 3px; padding-bottom: 3px;">
                            Gambar Produk
                        </div>
                        <div class="single-input" style="background-color: transparent; height: 46px; padding-top: 3px; padding-bottom: 3px;">
                            Gambar Produk
                        </div>
                        <div class="single-input" style="background-color: transparent; height: 46px; padding-top: 3px; padding-bottom: 3px;">
                            Gambar Produk
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-8">
                        <form action="./config/simpan_data_produk.php" method="post" enctype="multipart/form-data">
                            <div class="mt-10">
                                <input type="text" required maxlength="100" placeholder="Nama Produk" name="nama_produk"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Produk'"
                                    class="single-input">
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-tags"></i></div>
                                <div class="form-select" id="default-select"">
                                    <select name=" kode_kategori" required>
                                    <option value="--">Kategori Produk</option> <?php
                                            $no = 1;
                                    foreach ($db->ambil_data_kategori() as $x) {
                                        echo '<option value="'.$x['kode_kategori'].'">'.$x['nama_kategori'].'</option>';
                                    }
                                    ?> </select>
                                </div>
                            </div>
                            <div class="mt-10">
                                <textarea type="text" required maxlength="5000" placeholder="Detail Produk" name="detail_produk"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Detail Produk'"
                                    class="single-textarea"></textarea>
                            </div>
                            <div class="mt-10">
                                <div class="input_angka">
                                <input type="number" min="0" required max="999999999999999" maxlength="14" placeholder="Harga Asli Produk"
                                        onkeypress="if(this.value.length == 10) return false;" name="harga_asli_produk"
                                        class="single-input">
                                </div>
                            </div>
                            <div class="mt-10">
                                <div class="input_angka">
                                <input type="number" min="0" required max="999999999999999" maxlength="14" placeholder="Harga Setelah Diskon"
                                        onkeypress="if(this.value.length == 10) return false;" name="harga_diskon_produk"
                                        class="single-input">
                                </div>
                            </div>
                            <div class="mt-10">
                                <div class="input_angka">
                                <input type="number" min="0" required max="9999999999" maxlength="11" placeholder="Stok Produk"
                                        onkeypress="if(this.value.length == 10) return false;" name="stok_produk"
                                        class="single-input">
                                </div>
                            </div>
                            <div class="mt-10">
                                <div class="single-input" style="padding-top: 3px; padding-bottom: 3px;"> Gambar 1 : 
                                    <label class="genric-btn primary radius">
                                        <input type="file" name="gambar_produk1" class="inputfile"
                                        accept="image/jpg, image/jpeg, image/png, image/webp" required
                                        style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; position: absolute; z-index: -1;">
                                        <label style="pointer-events: none;"><span>Pilih File</span></label>
                                        <i class="fa fa-upload"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-10">
                                <div class="single-input" style="padding-top: 3px; padding-bottom: 3px;"> Gambar 2 :
                                    <label class="genric-btn primary radius">
                                        <input type="file" name="gambar_produk2" class="inputfile"
                                        accept="image/jpg, image/jpeg, image/png, image/webp" required
                                        style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; position: absolute; z-index: -1;">
                                        <label style="pointer-events: none;"><span>Pilih File</span></label>
                                        <i class="fa fa-upload"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-10">
                                <div class="single-input" style="padding-top: 3px; padding-bottom: 3px;"> Gambar 3 :
                                    <label class="genric-btn primary radius">
                                        <input type="file" name="gambar_produk3" class="inputfile"
                                        accept="image/jpg, image/jpeg, image/png, image/webp" required
                                        style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; position: absolute; z-index: -1;">
                                        <label style="pointer-events: none;"><span>Pilih File</span></label>
                                        <i class="fa fa-upload"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-8" style="padding-top: 14px; padding-bottom: 10px">
                                <input class="genric-btn primary circle" type="submit" value="Simpan" style="width: 50%">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include "footer.php";
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
    }
    else{
        header('Location: home.php');
    }
?>