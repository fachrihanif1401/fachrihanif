<?php  
include 'config/class.php';
$pinstansi = $instansi->detail();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Pertanyaan | <?= $pinstansi['nama_instansi'] ?></title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | <?= $pinstansi['nama_instansi'] ?>">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="media/upload-instansi/<?= $pinstansi['logo_instansi'] ?>" rel="shortcut icon"/>

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
							<a href="panduanpembelian"><img width="40" class="packing" src="img/panduan pembelian.png" alt=""> Panduan Pembelian</a>
							<hr>
							<a href="pertanyaan"><img width="40" class="packing" src="img/pertanyaan.png" alt=""> Pertanyaan</a>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<p style="font-size: 30px;" class="text-center atas"><img width="40" class="packing" src="img/pertanyaan.png" alt=""> Pertanyaan </p>
						<hr>
						<h4>Berapa lama waktu pengiriman ?</h4>
						<p>Waktu pengiriman ditentukan oleh ekspedisi yang Anda tentukan</p><br>
						<h4>Apakah ada minimal pembelian ?</h4>
						<p>Demi menjaga kualitas produk dan layanan, kami menerapkan kebijakan minimal order (MOQ) sebesar 1 pcs. Silahkan hubungi kami untuk mendapatkan informasi lebih lanjut.</p><br>
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