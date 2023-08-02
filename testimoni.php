<?php  
include 'config/class.php';
$testimoni = $testimoni->show();
$pinstansi = $instansi->detail();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Testimoni | <?= $pinstansi['nama_instansi'] ?></title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="media/upload-instansi/<?= $pinstansi['logo_instansi'] ?>" rel="shortcut icon"/>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<style>
		h2 {
			color: #333;
			text-align: center;
			text-transform: uppercase;
			font-family: "Roboto", sans-serif;
			font-weight: bold;
			position: relative;
			margin: 30px 0 60px;
		}
		h2::after {
			content: "";
			width: 100px;
			position: absolute;
			margin: 0 auto;
			height: 3px;
			background: #8fbc54;
			left: 0;
			right: 0;
			bottom: -10px;
		}
		.col-center {
			margin: 0 auto;
			float: none !important;
		}
		.carousel {
			margin: 50px auto;
			padding: 0 70px;
		}
		.carousel .item {
			color: #999;
			font-size: 14px;
			text-align: center;
			overflow: hidden;
			min-height: 290px;
		}
		.carousel .item .img-box {
			width: 135px;
			height: 135px;
			margin: 0 auto;
			padding: 5px;
			border: 1px solid #ddd;
			border-radius: 50%;
		}
		.carousel .img-box img {
			width: 100%;
			height: 100%;
			display: block;
			border-radius: 50%;
		}
		.carousel .testimonial {
			padding: 30px 0 10px;
		}
		.carousel .overview {	
			font-style: italic;
		}
		.carousel .overview b {
			text-transform: uppercase;
			color: #A9A9A9;
		}
		.carousel .carousel-control {
			width: 40px;
			height: 40px;
			margin-top: -20px;
			top: 50%;
			background: none;
		}
		.carousel-control i {
			font-size: 68px;
			line-height: 42px;
			position: absolute;
			display: inline-block;
			color: rgba(0, 0, 0, 0.8);
			text-shadow: 0 3px 3px #e6e6e6, 0 0 0 #000;
		}
		.carousel .carousel-indicators {
			bottom: -40px;
		}
		.carousel-indicators li, .carousel-indicators li.active {
			width: 20px;
			margin: 1px 3px;
			border-radius: 50%;
		}
		.carousel-indicators li {	
			background: #999;
			border-color: transparent;
			box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
		}
		.carousel-indicators li.active {	
			background: #555;		
			box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
		}
	</style>
</head>
<body>

	<div id="preloder">
		<div class="loader"></div>
	</div>

	<?php include 'header.php'; ?>

	<div class="page-top-info">
		<div class="container">
			<h4>Testimoni</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Testimoni</a>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-center m-auto">
				<?php if (empty($testimoni)): ?>
					<br><br><br>
					<div class="card">
						<div class="card-body">
							<center>
								<img width="100" src="img/interface.png" alt=""><br><br>
								<h5>Belum ada ulasan!</h5>
							</center>
						</div>
					</div>

					<?php else: ?>
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<?php foreach($testimoni as $key=>$value) { ?>
									<li data-target="#myCarousel" data-slide-to="0" class="<?php echo ($key == 0) ? "active" : ""; ?>"></li>
								<?php } ?>
							</ol>   

							<div class="carousel-inner">
								<?php foreach($testimoni as $key=>$value) { ?>
									<div class="item carousel-item <?php echo ($key == 0) ? "active" : ""; ?>">
										<div class="img-box">
											<?php if (empty($value['foto_pelanggan'])): ?>
												<img src="media/upload-pelanggan/no-img.jpg" alt="">
												<?php else: ?>
													<img src="testimoni/<?= $value['gambar'] ?>" alt="">
												<?php endif ?>
											</div>
											<p class="testimonial"><?= $value['testimoni'] ?></p>
											<p class="overview"><b><?= $value['nama_pelanggan'] ?></b></p>
										</div>
									<?php } ?>

								</div>

								<a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						<?php endif ?>

					</div>
				</div>
			</div>

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
