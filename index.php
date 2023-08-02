<?php  
include 'config/class.php';
$produk = $produk->show();
$data_instansi = $instansi->detail();
$banner = $instansi->banner();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Home | <?= $data_instansi['nama_instansi'] ?></title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="media/upload-instansi/<?= $data_instansi['logo_instansi'] ?>" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css
	">
</head>
<body>

	<div id="preloder">
		<div class="loader"></div>
	</div>

	<?php include 'header.php'; ?>
	
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="media/upload-instansi/<?= $banner['gambar'] ?>">
				
			</div>
			<div class="hs-item set-bg" data-setbg="media/upload-instansi/<?= $banner['gambar'] ?>">
			</div>
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->



	<!-- Features section -->
	<!-- <section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/1.png" alt="#">
						</div>
						<h2>Fast Secure Payments</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/2.png" alt="#">
						</div>
						<h2>Premium Products</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/3.png" alt="#">
						</div>
						<h2>Free & fast Delivery</h2>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- Features section end -->


	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>PRODUK TERBARU</h2>
			</div>
			<div class="product-slider owl-carousel">
				<?php foreach ($produk as $key => $value): ?>
					<div class="product-item">
						<div class="pi-pic">
							<img src="media/upload-produk/<?= $value['gambar_produk'] ?>" alt="">
							<div class="pi-links">
								<a href="detail-produk.php?id=<?= $value['id_produk'] ?>" class="add-card"><i class="flaticon-visible"></i><span>DETAIL</span></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>Rp. <?= $value['harga_produk'] ?></h6>
							<p><?= $value['nama_produk'] ?></p>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
	<!-- letest product section end -->



	<!-- Product filter section -->
	
	<!-- Product filter section end -->


	<!-- Banner section -->
	<!-- <section class="banner-section">
		<div class="container">
			<div class="banner set-bg" data-setbg="img/banner.jpg">
				<div class="tag-new">NEW</div>
				<span>New Arrivals</span>
				<h2>STRIPED SHIRTS</h2>
				<a href="#" class="site-btn">SHOP NOW</a>
			</div>
		</div>
	</section> -->
	<!-- Banner section end  -->


	<!-- Footer section -->
	<?php include 'footer.php'; ?>
	<?php include 'whatsapp.php'; ?>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
	<script >
		$(document).ready(function() {
			var table = $('#example').DataTable( {
				rowReorder: {
					selector: 'td:nth-child(2)'
				},
				responsive: true
			} );
		} );
	</script>
</body>
</html>
