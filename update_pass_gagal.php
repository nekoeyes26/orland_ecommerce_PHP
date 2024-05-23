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
	<title>User Profile</title>

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
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
        }else{
            $email = '';
        };
        if ($akses_id == 1 || $akses_id == 2) {
            $x = $db->data_user($email);
            ?>
    <section class="order_details section_gap">
		<div class="container" id="EditPassword"">
            <div class="billing_details" style="box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.07); background-color: white; padding: 3%; margin-top: 4%;">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Edit Password</h3>
                        <form class="row contact_form" action="config/edit_password.php" method="POST">
							<div class="col-md-12 form-group">
								<h5>Harap masukkan data dengan benar</h5>
							</div>
                            <div class="col-md-12 form-group">
                                <input type="password" maxlength="30" class="form-control" name="password_old" placeholder="Password Lama"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" maxlength="50" class="form-control" name="password_new" placeholder="Password Baru"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'>
                            </div>
							<div class="col-md-12 form-group">
                                <input type="password" maxlength="50" class="form-control" name="password_new_confirm" placeholder="Konfirmasi Password Baru"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'>
                            </div>
                            <div style="margin-left: 1.35%;">
								<input class="genric-btn primary-border radius" type="button" value="Batal" onclick="location.href='user_profile.php';"/>
							</div>
                            <div style="margin: 0 auto; text-align: right;width: 87.65%;">
                                <input type="submit" value="Simpan" class="genric-btn primary radius" style="padding-left: 7%; padding-right: 7%" name="submit">
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
        header('Location: home.php');
    }
?>