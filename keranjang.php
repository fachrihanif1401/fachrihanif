<?php  
include 'config/class.php';
$tampilkeranjang = $pembelian->tampilkeranjang();
$data_instansi = $instansi->detail();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Keranjang | Golden Petshop</title>
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
</head>
<body>

	<div id="preloder">
		<div class="loader"></div>
	</div>

	<?php include 'header.php'; ?>

	<div class="page-top-info">
		<div class="container">
			<h4>Keranjang</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Keranjang</a>
			</div>
		</div>
	</div>

	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<?php if (empty($tampilkeranjang)): ?>
					<div class="col-lg-12">
						<div class="cart-table">
							<h3>Keranjang Belanja</h3>
							<hr>
							<div class="cart-table-warp">
								<center>
									<img width="100" src="img/online-shop.png" alt=""><br><br>
									<h5>Keranjang belanja Anda Kosong</h5><br>
									<a href="produk" class="btn btn-primary"> Belanja Sekarang</a>
								</center>
							</div>
							<br><br>
						</div>
					</div>
					<?php else: ?>
						<div class="col-lg-9">
							<div class="cart-table">
								<h3>Keranjang Belanja</h3>
								<div class="cart-table-warp">
									<table>
										<thead>
											<tr>
												<th class="product-th">Produk</th>
												<th class="quy-th">Jumlah</th>
												<th class="total-th">Subtotal</th>
												<th class="total-th">Tindakan</th>
											</tr>
										</thead>
										<tbody>
											<?php  
											$total = 0;
											?>
											<?php foreach ($tampilkeranjang as $key => $value): ?>
												<?php  
												$total += $value['subharga'];
												?>
												<tr>
													<td class="product-col">
														<img src="media/upload-produk/<?= $value['gambar_produk'] ?>" alt="">
														<div class="pc-title">
															<h4><?= $value['nama_produk'] ?></h4>
															<p>Rp. <?= number_format($value['harga_produk']) ?></p>
														</div>
													</td>
													<td class="quy-col">
														<h5 class="text-center"><?= $value['jumlah'] ?></h5>
													</td>
													<td class="total-col" width="20%"><h4>Rp. <?= number_format($value['subharga']) ?></h4></td>
													<td class="total-col"><a href="hapuskeranjang.php?id=<?= $value['id_produk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></a></td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
								<div class="total-cost">
									<h6>Total <span>Rp. <?= number_format($total) ?></span></h6>
								</div>
							</div>
						</div>
						<div class="col-lg-3 card-right">
							<a href="checkout" class="site-btn">Beli</a>
							<a href="produk" class="site-btn sb-dark">Lanjut Belanja</a>
						</div>
					<?php endif ?>
					
				</div>
			</div>
		</section>
		<?php include 'footer.php'; ?>

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
