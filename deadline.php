<?php  
include 'config/class.php';
$id_pengiriman = $_GET['id'];
$detail = $pembelian->detail($id_pengiriman);
$bank = $bank->show();
$pinstansi = $instansi->detail();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Deadline Pembayaran | <?= $pinstansi['nama_instansi'] ?></title>
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
		#clockdiv{ 
			font-family: sans-serif; 
			color: #fff; 
			display: inline-block; 
			font-weight: 100; 
			text-align: center; 
			font-size: 30px; 
			margin-top: 10px;
			margin-bottom: 10px;
		} 
		#clockdiv > div{ 
			padding: 10px; 
			border-radius: 3px; 
			background: #54d44e; 
			display: inline-block; 
		} 
		#clockdiv div > span{ 
			padding: 10px; 
			border-radius: 3px; 
			background: #40b149; 
			display: inline-block; 
		} 
		.smalltext{ 
			padding-top: 5px; 
			font-size: 15px; 
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
			<h4>Pembayaran</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Pembayaran</a>
			</div>
		</div>
	</div>
	<input type="hidden" id="deadline" value="<?php echo $detail['deadline_pembayaran'] ?>">
	<input type="hidden" id="status" value="<?php echo $detail['status_pembelian'] ?>">
	<input type="hidden" id="id_pembelian" value="<?php echo $id_pengiriman ?>">
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card">
						<div class="card-body">
							<h4 class="text-center"> Menunggu Pembayaran</h4><br>
							<p class="text-center"> Nomor pesanan anda #<?= $id_pengiriman ?></p>
							<p class="text-center">Segera selesaikan pembayaran Anda sebelum stok habis.</p>
							<hr>
							<center>
								<div id="clockdiv">  
									<h6>Sisa waktu pembayaran Anda</h6>
									<div style="margin-top: 12px;"> 
										<span class="days" id="day"></span> 
										<div class="smalltext">Hari</div> 
									</div> 
									<div> 
										<span class="hours" id="hour"></span> 
										<div class="smalltext">Jam</div> 
									</div> 
									<div> 
										<span class="minutes" id="minute"></span> 
										<div class="smalltext">Menit</div> 
									</div> 
									<div> 
										<span class="seconds" id="second"></span> 
										<div class="smalltext">Detik</div> 
									</div> 
								</div>

								<div class="alert alert-warning pastikan">
									<p>Pastikan untuk tidak menginformasikan bukti dan data pembayaran kepada pihak manapun kecuali Admin Golden Petshop</p>
								</div>
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
								<p>Jumlah yang harus dibayarkan : <b style="color: #FF6636;">Rp. <?= number_format($detail['total_pembelian']) ?></b></p>
								<hr>
								<p>
									Pastikan pembayaran Anda sudah BERHASIL dan unggah bukti
									untuk mempercepat proses verifikasi
								</p>
								<hr>
								<a href="member.php?halaman=pembelian" class="btn btn-primary">Cek Status Pembelian</a>
								<a href="carapembayaran.php?id=<?= $id_pengiriman ?>" class="btn btn-primary">Cara Pembayaran</a>
							</center>
						</div>
					</div>
				</div>
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
	<script> 

		var deadline = $('#deadline').val();
		var id_pembelian = $('#id_pembelian').val();
		var status = $('#status').val();
		var countDownDate = new Date(deadline).getTime(); 

		var x = setInterval(function() { 

			var now = new Date().getTime(); 

			var distance  = countDownDate - now; 
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance %(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)); 
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			document.getElementById("day").innerHTML =days ; 
			document.getElementById("hour").innerHTML =hours; 
			document.getElementById("minute").innerHTML = minutes;  
			document.getElementById("second").innerHTML =seconds;  

			if (distance < 0 && status==="Belum Bayar") 
			{ 
				$.get("batalpesanan.php", {id:id_pembelian});
				clearInterval(x); 
			} 
		},1000); 
	</script> 
</body>
</html>