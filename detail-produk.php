<?php  
include 'config/class.php';
$id_produk = $_GET['id'];
$detail = $produk->detail($id_produk);
$gambarproduk = $produk->gambarproduk($id_produk);
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Detail Produk | Hawamini Store</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

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


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<?php include 'header.php'; ?>

	<div class="page-top-info">
		<div class="container">
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href=""><?= $detail['nama_produk'] ?></a>
			</div>
		</div>
	</div>

	<section class="product-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="media/upload-produk/<?= $detail['gambar_produk'] ?>" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							<div class="pt active" data-imgbigurl="media/upload-produk/<?= $detail['gambar_produk'] ?>"><img src="media/upload-produk/<?= $detail['gambar_produk'] ?>" alt=""></div>
							<?php foreach ($gambarproduk as $key => $value): ?>
								
								<div class="pt" data-imgbigurl="media/upload-gambar/<?= $value['gambar'] ?>"><img src="media/upload-gambar/<?= $value['gambar'] ?>" alt=""></div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title"><?= $detail['nama_produk'] ?></h2>
					<h3 class="p-price">Rp. <?= number_format($detail['harga_produk']) ?></h3>
					<h4 class="p-stock">
						<?php if ($detail['stok']==0): ?>
							Stok : <span>Tidak Tersedia</span>
							<?php else: ?>
								Stok : <span>Tersedia (<?= $detail['stok'] ?>)</span>
							<?php endif ?>
						</h4>
					<h4 class="p-stock">Berat : <?= $detail['berat_produk'] ?> gr</h4>
					<!-- <div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div> -->
					<!-- <div class="p-review">
						<a href="">3 reviews</a>|<a href="">Add your review</a>
					</div> -->
					<!-- <div class="fw-size-choose">
						<p>Size</p>
						<div class="sc-item">
							<input type="radio" name="sc" id="xs-size">
							<label for="xs-size">32</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="s-size">
							<label for="s-size">34</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="m-size" checked="">
							<label for="m-size">36</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="l-size">
							<label for="l-size">38</label>
						</div>
						<div class="sc-item disable">
							<input type="radio" name="sc" id="xl-size" disabled>
							<label for="xl-size">40</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="xxl-size">
							<label for="xxl-size">42</label>
						</div>
					</div> -->
					<?php if ($detail['stok']==0): ?>
						<?php else: ?>
							<form method="post">
								<div class="quantity">
									<p>Jumlah</p>
									<div class="pro-qty"><input type="text" value="1" name="jumlah" required=""></div>
								</div>


								<button name="masukankeranjang" class="site-btn">MASUKAN KERANJANG</button>
							<?php endif ?>
						</form>
						<?php  
						if (isset($_POST['masukankeranjang'])) 
						{
							$jumlah = $_POST['jumlah'];
							if ($jumlah < 1) 
							{
								echo "<script>alert('Mohon maaf, jumlah minimal pembelian 1 produk!');</script>";
								echo "<script>location='';</script>";
							}
							else
							{
								if ($jumlah > $detail['stok']) 
								{
									echo "<script>alert('Mohon maaf, stok tidak mencukupi!');</script>";
									echo "<script>location='';</script>";
								}
								else
								{
									$pembelian->masukankeranjang($_POST['jumlah'],$id_produk);
									echo "<script>alert('Produk berhasil dimasukan ke keranjang');</script>";
									echo "<script>location='keranjang';</script>";
								}
							}
						}
						?>
						<div id="accordion" class="accordion-area">
							<div class="panel">
								<div class="panel-header" id="headingOne">
									<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">DESKRIPSI</button>
								</div>
								<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="panel-body">
										<p><?= $detail['deskripsi_produk'] ?></p>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</section>

		<?php include 'footer.php'; ?>

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
