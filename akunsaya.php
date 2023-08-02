<?php  
include 'config/class.php';
$pinstansi = $instansi->detail();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Akun Saya | <?= $pinstansip['nama_instansi'] ?></title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="media/upload-instansi/<?= $pinstansip['logo_instansi'] ?>" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
	<!-- Page Preloder -->
	<!-- <div id="preloder">
		<div class="loader"></div>
	</div> -->

	<!-- Header section -->
	<?php include 'header.php'; ?>
	<div class="page-top-info">
		<div class="container">
			<h4>Bantuan</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Bantuan</a>
			</div>
		</div>
	</div>
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
						<div class="card-body">
							<a href="akunsaya"><img width="40" class="packing" src="img/pelanggan.png" alt=""> Akun Saya</a>
							<hr>
							<a href="panduanpembelian"><img width="40" class="packing" src="img/panduan pembelian.png" alt=""> Panduan Pemesanan</a>
							<hr>
							<a href="kebijakan"><img width="40" class="packing" src="img/undo.png" alt=""> Kebijakan Return</a>
							<hr>
							<a href="pertanyaan"><img width="40" class="packing" src="img/pertanyaan.png" alt=""> Pertanyaan</a>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<p style="font-size: 30px;" class="text-center atas"><img width="40" class="packing" src="img/panduan pemesanan.png" alt=""> Akun Saya </p>
						<hr>
						<div id="accordion">
							<div class="card">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Bagaimana cara daftar akun <?= $pinstansi['nama_instansi'] ?>?
										</button>
									</h5>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="card-body">
										<p>1. Klik daftar pada menu diatas. <a href="daftar"> Klik Disini!</a></p>
										<p>2. Isi seluruh data dengan benar, lalu klik Daftar.</p>                                    <p>3. Gunakan email dan password yang Anda daftarkan untuk login ke akun Anda.</p>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											Bagaimana cara ubah kata sandi?
										</button>
									</h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="card-body">
										<p>1. Login ke Akun Anda.</p>
										<p>2. Arahkan kursor <img class="packing" src="http://luciffer.rancangdesainrumah.com/img/akunsaya.PNG" alt="">, lalu pilih akun saya.</p>
										<p>3. Pada halaman Profil Saya terdapat <img class="packing" src="http://luciffer.rancangdesainrumah.com/img/ubahpassword.PNG" alt="">, lalu klik Ubah Password.</p>
										<p>4. Isi seluruh data dengan benar, lalu klik Ubah Password.</p>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											Bagaimana jika lupa kata sandi?
										</button>
									</h5>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="card-body">
										<p>1. Klik login pada menu diatas. <a href="login"> Klik Disini!</a></p>
										<p>2. Pada halaman login <img class="packing" src="http://luciffer.rancangdesainrumah.com/img/lupa.PNG" alt="">, lalu klik Lupa Password ?. </p>
										<p>3. Masukan email dengan benar.</p>
										<p>4. Anda akan mendapatkan email yang berisi password yang telah direset.</p>
										<p>5. Gunakan password yang telah direset untuk login.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>

		</div>
	</div>
</section>


<?php include 'footer.php'; ?>
<!-- Footer section end -->



<!--====== Javascripts & Jquery ======-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>