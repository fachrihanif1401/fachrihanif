<?php  
include 'config/class.php';
include 'config/fungsi.php';
$id_pembelian = $_GET['id'];
$detail = $pembelian->detail($id_pembelian);
$bank = $bank->show();
$pinstansi = $instansi->detail();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Cara Pembayaran | <?= $pinstansip['nama_instansi'] ?></title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="media/upload-instansi/<?= $pinstansip['logo_instansi'] ?>" rel="shortcut icon"/>
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
		.cara
		{
			margin-left: 450px;
			font-size: 20px;
		}
	</style>
</head>
<body>

	<div id="preloder">
		<div class="loader"></div>
	</div>
	<div id="breadcrumb" class="section" style="background: linear-gradient(to bottom, #129E8B 0%, #129E8B 100%); padding-top: 15px; padding-bottom: 15px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="member.php?halaman=pembelian" style="color: #fff;"><i class="fa fa-arrow-left"></i> <span class="cara">Cara Pembayaran</span></a>
				</div>
			</div>
		</div>
	</div>
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card">
						<div class="card-body">
							<p class="text-center">Segera selesaikan pembayaran sebelum :</p>
							<p class="text-center"><strong><?= format_hari_tanggal($detail['deadline_pembayaran']) ?></strong></p>
							<hr>
							<center>
								<p>Transfer pembayaran ke nomor rekening :</p>
								<div class="row">
									<?php foreach ($bank as $key => $value): ?>
										<div class="col-md-3">
											<img src="media/upload-bank/<?= $value['logo_bank'] ?>" alt=""><br><br>
											<p><?= $value['nomor_rekening'] ?></p>
											<p>a/n <?= $value['nama_pemilik_rekening'] ?></p>
										</div>
									<?php endforeach ?>
								</div>
								<hr>
								<p>Jumlah yang harus dibayarkan : <br> <b style="color: #FF6636;">Rp. <?= number_format($detail['total_pembelian']) ?></b></p>
								<hr>
								<p>
									Pastikan pembayaran Anda sudah BERHASIL dan unggah bukti
									untuk mempercepat proses verifikasi

								</p>
								<hr>
								<a href="member.php?halaman=pembayaran&id=<?= $id_pembelian ?>" class="btn btn-primary">Saya sudah bayar</a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
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