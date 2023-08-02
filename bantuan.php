<?php  
include 'config/class.php';
$pinstansi = $instansi->detail();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Bantuan | <?= $pinstansi['nama_instansi'] ?></title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="media/upload-instansi/<?= $pinstansi['logo_instansi'] ?>" rel="shortcut icon"/>
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
	<style>
		.pusatbantuan
		{
			width: 100%;
			height: 300px;
			margin-top: -100px;
			padding-top: 64px;
			margin-bottom: 32px;
			background-image: url(img/pusatbantuan.png);
			background-size: 100% 100%;
			background-repeat: no-repeat;
			background-position: center;
		}
		h2 {
			color: #333;
			text-align: center;
			text-transform: uppercase;
			font-family: "Roboto", sans-serif;
			font-weight: bold;
			position: relative;
			margin: 40px 0 10px;
		}
		h2::after {
			content: "";
			width: 100px;
			position: absolute;
			margin: 0 auto;
			height: 3px;
			background: #E7AB3C;
			left: 0;
			right: 0;
			bottom: -10px;
		}
	</style>
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<?php include 'header.php'; ?>
	<!-- Header section end -->
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
				<div class="pusatbantuan">
					<h3 class="text-center" style="margin-top: 100px;">Hai, ada yang bisa kami bantu?</h3>
				</div>
				<div class="col-md-4">
					<div class="card">
						<center>
							<a href="akunsaya">
								<img src="img/pelanggan.png" alt="">
								<p>Akun Saya</p>
							</a>
						</center>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<center>
							<a href="panduanpembelian">
								<img src="img/panduan pembelian.png" alt="">
								<p>Panduan Pembelian</p>
							</a>
						</center>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<center>
							<a href="pertanyaan">
								<img width="" src="img/pertanyaan.png" alt="">
								<p>Pertanyaan</p>
							</a>
						</center>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include 'footer.php'; ?>
	<?php include 'whatsapp.php'; ?>
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
