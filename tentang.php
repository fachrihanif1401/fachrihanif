<?php  
include 'config/class.php';
$instansi1 = $instansi->detail();
$logo = $instansi->logo();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Tentang Kami | <?= $instansi1['nama_instansi'] ?></title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="media/upload-instansi/<?= $instansi1['logo_instansi'] ?>" rel="shortcut icon"/>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
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

	<div id="preloder">
		<div class="loader"></div>
	</div>

	<?php include 'header.php'; ?>

	<div class="page-top-info">
		<div class="container">
			<h4>Tentang Kami </h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Tentang Kami </a>
			</div>
		</div>
	</div>

	<section class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 contact-info">
					<h3>Tentang <?= $instansi1['nama_instansi'] ?></h3>
					<img width="700" class="img-thumbnail" src="media/upload-instansi/<?= $logo['gambar'] ?>" alt="">
				</div>
				<div class="col-lg-6 contact-info" style="margin-top: 82px;">
					<p><?= $instansi1['tentang'] ?>. </p>
				</div>
			</div>
		</div>
	</section>

	<section class="related-product-section spad">

	</section>

	<?php include 'footer.php'; ?>

	<?php include 'whatsapp.php'; ?>

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
