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
		<div class="container" id="DataProfil">
			<div class="order_details_table" style="box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.07); background-color: white;">
				<h2>User Profile</h2>
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<td style="width: 30%;">
									<p>Username</p>
								</td>
								<td>
									<h5><?php echo $x[0]['username']?></h5>
								</td>
							</tr>
							<tr>
								<td>
									<p>Email</p>
								</td>
								<td>
									<h5><?php echo $x[0]['email']?></h5>
								</td>
							</tr>
							<tr>
								<td>
									<p>Password</p>
								</td>
								<td>
                                    <div id="password" style="display:none;">
									    <h5><?php echo $x[0]['password']?></h5>
                                    </div>
                                    <button class="genric-btn primary small" onclick="lihatPassword()">Show Password</button>
									<button class="genric-btn primary small" onclick="editPassword()">Edit Password</button>
								</td>
							</tr>
							<tr>
								<td>
									<p>Nama Lengkap</p>
								</td>
								<td>
									<h5><?php echo $x[0]['nama_lengkap']?></h5>
								</td>
							</tr>
							<tr>
								<td>
									<p>Jenis Kelamin</p>
								</td>
								<td>
									<h5><?php echo $x[0]['keterangan_jk']?></h5>
								</td>
							</tr>
							<tr>
								<td>
									<p>No Telepon</p>
								</td>
								<td>
									<h5><?php echo $x[0]['no_telp']?></h5>
								</td>
							</tr>
                            <tr>
								<td>
									<p>Alamat</p>
								</td>
								<td>
									<h5><?php echo $x[0]['alamat']?></h5>
								</td>
							</tr>
                            <tr>
								<td>
									<p></p>
								</td>
								<td>
									<h5></h5>
								</td>
							</tr>
						</tbody>
					</table>
                    <button class="genric-btn primary radius" onclick="editProfil()">Edit Profil</button>
				</div>
			</div>
		</div>
        <div class="container" id="EditProfil" style="display:none;">
            <div class="billing_details" style="box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.07); background-color: white; padding: 3%; margin-top: 4%;">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Edit Profil</h3>
                        <form class="row contact_form" action="config/edit_profil_user.php" method="POST">
                            <div class="col-md-12 form-group">
                                <input type="text" required maxlength="30" class="form-control" name="username" placeholder="Username"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                value="<?php echo $x[0]['username']?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" required maxlength="50" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                value="<?php echo $x[0]['nama_lengkap']?>">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="country_select" name="jenis_kelamin">
								<?php
                                $kode_jenis_kelamin = $x[0]['jenis_kelamin'];
								foreach ($db->tampil_data_jenis_kelamin() as $jk) {
									echo "<option value".$jk['kode_jk'];
									if ($jk['kode_jk']==$kode_jenis_kelamin) {
										echo " selected=selected";
									}
									echo ">" .$jk['keterangan_jk'] . "</option>";
								}
								?>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
								<div class="input_angka">
                                <input type="number" min="0" required max="9999999999999" class="form-control" name="no_telp" placeholder="Nomor Telepon"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'
                                value="<?php echo $x[0]['no_telp']?>">
								</div>
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea type="text" required maxlength="100" class="form-control" name="alamat" placeholder="Alamat"
                                style='font-family: "Poppins", sans-serif; color: #222222; font-weight: 400;'><?php echo $x[0]['alamat']?></textarea>
                            </div>
							<div style="margin-left: 1.35%;">
								<input class="genric-btn primary-border radius" type="button" value="Batal" onclick="editProfil()"/>
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
		<div class="container" id="EditPassword" style="display:none;">
            <div class="billing_details" style="box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.07); background-color: white; padding: 3%; margin-top: 4%;">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Edit Password</h3>
                        <form class="row contact_form" action="config/edit_password.php" method="POST">
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
								<input class="genric-btn primary-border radius" type="button" value="Batal" onclick="editPassword()"/>
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
    <script>
        function lihatPassword() {
        var x = document.getElementById("password");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
        }
        function editProfil() {
        var x = document.getElementById("EditProfil");
        var y = document.getElementById("DataProfil");
        if (y.style.display === "none") {
            x.style.display = "none";
            y.style.display = "block";
        } else {
            x.style.display = "block";
            y.style.display = "none";
        }
        }
		function editPassword() {
        var x = document.getElementById("EditPassword");
        var y = document.getElementById("DataProfil");
        if (y.style.display === "none") {
            x.style.display = "none";
            y.style.display = "block";
        } else {
            x.style.display = "block";
            y.style.display = "none";
        }
        }
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
</body>
</html>
<?php
    }else{
        header('Location: home.php');
    }
?>