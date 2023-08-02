<?php  
include 'config/class.php';
$pinstansi = $instansi->detail();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Panduan Pembelian | <?= $pinstansi['nama_instansi'] ?></title>
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
						<p style="font-size: 30px;" class="text-center atas"><img width="40" class="packing" src="img/panduan pemesanan.png" alt=""> Panduan Pembelian </p>
						<hr>
						<p id="a"><b>1. Anda belum punya akun ?</b> Silahkan Daftar <a href="daftar"> <u style="color: blue;">Klik Disini!</u></a> </p>
						<center><img class="thumbnail" width="800" id="gambar" src="img-panduan/daftar.png" alt=""></center>
						<p class="b"><b>2. </b> Jika anda sudah mempunyai akun silahkan login <a href="login"> <u style="color: blue;">Klik Disini!</u></a></p>
						<center><img class="thumbnail" width="800" id="gambar" src="img-panduan/login.png" alt=""></center>
						<p class="b"><b>3. </b> Jika anda sudah mempunyai akun dan anda sudah login langkah selanjutnya, klik Menu produk dan pilih produk yang ingin anda pesan!</p>
						<center><img class="thumbnail" width="800" id="gambar" src="img-panduan/paket.png" alt=""></center>
						<p class="b"><b>4. </b> Jika sudah sesuai dengan menu yang ingin anda pesan, langkah selanjutnya pilih paket menu mana yang ingin anda pesan! Masukan jumlah yang ingin anda pesan dan langkah selanjutnya masukan ke keranjang!</p>
						<center><img class="thumbnail" width="800" id="gambar" src="img-panduan/menu.png" alt=""></center>
						<p class="b"><b>5. </b> Jika sudah sesuai dengan menu yang ingin anda pesan, langkah selanjutnya pilih paket menu mana yang ingin anda pesan! Masukan jumlah yang ingin anda pesan dan langkah selanjutnya masukan ke keranjang, didalam halaman keranjang anda dapat melihat pilihan paket menu yang anda pesan, jika anda ingin membeli lebih dari satu paket anda bisa klik Lanjutkan Belanja, jika tidak langsung saja dengan mengklik tombol Checkout untuk melakukan transaksi pesanan anda!</p>
						<center><img class="thumbnail" width="800" id="gambar" src="img-panduan/keranjang.png" alt=""></center>
						<p class="b"><b>6. </b> Pada halaman checkout silahkan lihat apakah pesanan anda sudah benar, jika sudah benar pilih keterangan diambil / diantar. jika diantar makan akan dikenalan biaya transportasi pengantaran pesanan dengan jumlah yag sudah di tentukan oleh perusahaan! Setelah itu isi data anda dengan lengkap!</p>
						<center><img class="thumbnail" width="800" id="gambar" src="img-panduan/checkout.png" alt=""></center>
						<p class="b"><b>7. </b> Jika sudah menyelesaikan tahap checkout, selanjutnya anda akan dialihkan ke halaman nota. Pada halaman nota anda akan diberitahu rincian pesanan anda, jumlah yang harus dibayarkan dan cara pembayaran untuk pesanan anda!</p>
						<center><img class="thumbnail" width="800" id="gambar" src="img-panduan/nota.png" alt=""></center>
						<p class="b"><b>8. </b> Pada halaman cara pembayaran anda akan diberitahu jumlah pembayaran yang harus dibayar, dan transfer ke salah satu rekening dibawah ini!</p>
						<center><img class="thumbnail" width="800" id="gambar" src="img-panduan/pembayaran.png" alt=""></center>
						<p class="b"><b>9. </b> Jika anda sudah membayar sesuai dengan pesanan, tahap selanjutnya silahkan klik tombol saya sudah bayar pada halaman bawah menu cara pembayaran. Maka anda akan dialihkan ke halaman unggah buti pembayaran dengan memasukan jumlah yang anda transfer dan upload bukti struk transfer, anda juga akan mendapatkan notifikasi pesanan update tiap proses!</p>
						<center><img class="thumbnail" width="800" id="gambar" src="img-panduan/unggah.png" alt=""></center>
						<p id="a"><b>Menunggu konfirmasi pembayaran dari admin</b> - Silahkan menunggu konfirmasi dari admin paling lambat 1x24 Jam, jika disetujui maka pesanan anda akan diproses, dan jika sudah diproses anda akan diminta untuk melakukan pelunasan pesanan Anda, dan terakhir pesanan anda siap diambil / diantar.</p><br>
						<br>
						<p id="a"><b>Konsultasi</b> - Jika anda bingung bagaimana cara pemesanan, silahkan anda bisa hubungi CS melalui live chat dan jika CS live chat sedang offline anda juga bisa chat melalui whatsapp yang sudah tertera pada halaman website untuk mendapat respon lebih cepat.</p><br>
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