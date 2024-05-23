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
	<title>Banner Setting</title>

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
    ?>
    <section class="order_details section_gap">
        <?php 
            foreach($db->ambil_data_banner() as $banner){
        ?>
        <div class="container">
            <div class="billing_details" style="box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.07); background-color: white; padding: 3%; margin-top: 4%;">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Edit Banner Slider <?php echo $banner['id_banner']?></h3>
                        <form class="row contact_form" action="config/update_banner.php?id=<?php echo $banner['id_banner']?>" method="POST"  enctype="multipart/form-data">
                            <div class="col-md-12 form-group" style="text-align: center;">
                                <div class="col-md-6 form-group" style="margin: 0 auto; position: relative;">
                                    <img src="<?php echo $banner['gambar']?>" style="max-width: 100%;">
                                </div>
                            </div>
                            <div class="col-md-2 form-group">
                                <h5 style="padding-top: 10px;">Judul</h5>
                            </div>
                            <div class="col-md-10 form-group">
                                <input type="text" required maxlength="50" class="form-control" name="judul" placeholder="Judul"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                value="<?php echo $banner['judul']?>">
                            </div>
                            <div class="col-md-2 form-group">
                                <h5 style="padding-top: 10px;">Keterangan</h5>
                            </div>
                            <div class="col-md-10 form-group">
                                <textarea type="text" required maxlength="500" class="form-control" name="keterangan" placeholder="Keterangan"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'><?php echo $banner['keterangan']?></textarea>
                            </div>
                            <div class="col-md-2 form-group">
                                <h5 style="padding-top: 10px;">Link Terkait</h5>
                            </div>
                            <div class="col-md-10 form-group">
                                <input type="text" required maxlength="100" class="form-control" name="link_terkait" placeholder="Link Terkait"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                value="<?php echo $banner['link_terkait']?>">
                            </div>
                            <div class="col-md-2 form-group">
                                <h5 style="padding-top: 10px;">Gambar</h5>
                            </div>
                            <div class="col-md-10 form-group">
                                <label class="genric-btn primary radius">
                                    <input type="file" name="gambar" class="inputfile"
                                    accept="image/jpg, image/jpeg, image/png, image/webp"
                                    style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; position: absolute; z-index: -1;">
                                    <label style="pointer-events: none;"><span>Pilih File</span></label>
                                    <i class="fa fa-upload"></i>
                                </label>
                            </div>
							<div style="margin-left: 1.35%;">
								<input class="genric-btn primary-border radius" type="button" value="Batal" onclick="location.href='home.php';"/>
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
        <?php } ?>
	</section>
	<!--================End Order Details Area =================-->
    <?php
        include 'footer.php';
    ?>
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
                
        }
        else{
            header('location: home.php');
        }
?>