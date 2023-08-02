<?php  
include 'config/class.php';
$pinstansi = $instansi->detail();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Kebijakan Return | <?= $pinstansi['nama_instansi'] ?></title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
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
						<p style="font-size: 30px;" class="text-center atas"><img width="40" class="packing" src="img/undo.png" alt=""> KEBIJAKAN PENGEMBALIAN DANA DAN BARANG </p>
						<hr>
						<h4>Permohonan untuk Pengembalian Barang dan/atau Pengembalian Dana</h4><br>
						<p>
							Pembeli hanya boleh mengajukan permohonan pengembalian Barang dan/atau pengembalian dana dalam situasi berikut: <br><br>

							Barang belum diterima oleh Pembeli;<br><br>

							Barang tersebut cacat dan/atau rusak saat diterima;<br><br>

							Kami telah mengirimkan Barang yang tidak sesuai dengan spesifikasi yang disepakati (misalnya salah ukuran, warna, dsb.) kepada Pembeli;<br><br>

							Barang yang dikirimkan kepada Pembeli secara material berbeda dari deskripsi yang diberikan oleh Kami dalam daftar Barang; atau<br><br>	

							Melalui kesepakatan pribadi harus mengirimkan konfirmasi kepada Kami mengenai kesepakatan tersebut.
						</p>

						<div id="accordion">
							<div class="card">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Apa ada batas waktu untuk mengembalikan / menukar produk? 
										</button>
									</h5>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="card-body">
										<p>Garansi pengembalian sampai dengan  30 hari sejak Anda menerima produk.</p>
										
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											Tukar Barang
										</button>
									</h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="card-body">
										<p>
											Penukaran hanya berlaku untuk tukar ukuran dan atau warna dengan model yang sama. Penukaran tidak berlaku untuk penukaran dengan produk lain.
										</p>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											Pengembalian Dana
										</button>
									</h5>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="card-body">
										<p>Uang Pembeli hanya akan dikembalikan setelah Kami telah menerima Barang yang dikembalikan. Apabila Kami tidak menerima dalam jangka waktu yang ditentukan. Selanjutnya dana akan dikirimkan ke nomor rekening saat Pembeli melakukan transaksi</p>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingFour">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
											Kirim Kembali
										</button>
									</h5>
								</div>
								<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
									<div class="card-body">
										<p>Kirim kembali akan diproses ketika kami telah mencek dan dipastikan bahwa benar memang barang yang dimaksud tidak dimasukan pada saat packing barang!</p>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6"></div>
							<div class="col-md-6"></div>
						</div>
						<center><img class="thumbnail" width="800" id="gambar" src="img-panduan/livechat.png" alt=""></center><br>
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