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
	<title>Konfirmasi Delete Produk?</title>

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
                    <div class="col-lg-12" style="text-align: center;">
                        <h2>Konfirmasi Delete Produk</h2>
                        <form class="row contact_form" action="config/delete_produk.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_produk" value="<?php echo $kode_produk ?>">
                            <div class="col-md-12 form-group" style="text-align: center;">
                            <img src="<?php echo $x[0]['gambar_produk1']?>" alt="" height="280" width="263" style="object-fit: contain;">
                            <img src="<?php echo $x[0]['gambar_produk2']?>" alt="" height="280" width="263" style="object-fit: contain;">
                            <img src="<?php echo $x[0]['gambar_produk3']?>" alt="" height="280" width="263" style="object-fit: contain;">
                            </div>
                            <div class="col-md-12 form-group" style="text-align: center;">
                                <h4><?php echo $x[0]['nama_produk'] ?></h4>
                            </div>
                            <div class="col-md-12 form-group" style="text-align: center;">
                                <h5>Yakin Hapus Produk ini?</h5>
                            </div>
                            <div class="col-md-12" style="text-align: center;">                                
                                <input class="genric-btn primary radius" type="button" value="Batal" onclick="window.history.go(-1); return false;"/>                                                                
                                <input type="submit" value="Hapus" class="genric-btn danger radius" style="padding-left: 7%; padding-right: 7%">                                
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
    </script>
    <script>
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