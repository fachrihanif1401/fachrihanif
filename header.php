<?php  
if (isset($_SESSION['pelanggan'])) {
	$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
	$datapelanggan = $pelanggan->detail($id_pelanggan);
}
$totkeranjang = $pembelian->totkeranjang();
$log = $instansi->logo();
?>
<header class="header-section">
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 text-center text-lg-left">
					<!-- logo -->
					<a href="./" class="site-logo">
						<img src="media/upload-instansi/<?= $log['gambar'] ?>" alt="">
					</a>
				</div>
				<div class="col-xl-6 col-lg-5">
					<form method="get" action="pencarian" class="header-search-form">
						<input type="text" name="keyword" placeholder="Cari produk ...." required="">
						<button><i class="flaticon-search"></i></button>
					</form>
				</div>
				<div class="col-xl-4 col-lg-5">
					<div class="user-panel">
						<?php if (isset($_SESSION['pelanggan'])): ?>
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<a href="member" style="color: #A9A9A9;"><?= $datapelanggan['nama_pelanggan'] ?></a> | <a href="logout" style="color: #A9A9A9;">Keluar</a>
							</div>
							<?php else: ?>
								<div class="up-item">
									<i class="flaticon-profile"></i>
									<a href="login" style="color: #A9A9A9;">Masuk</a> | <a href="daftar" style="color: #A9A9A9;">Daftar</a>
								</div>
							<?php endif ?>

							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<?php if (empty($totkeranjang)): ?>
										<?php else: ?>
											<span><?= $totkeranjang ?></span>
										<?php endif ?>
									</div>
									<a href="keranjang">Keranjang</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<nav class="main-navbar">
				<div class="container">
					<!-- menu -->
					<ul class="main-menu">
						<li><a href="./">Home</a></li>
						<li><a href="produk">Produk</a></li>
						<li><a href="tentang">Tentang</a></li>
						<li><a href="kontak">Hubungi Kami
						</a></li>
						<li><a href="testimoni.php">Testimoni</a></li>
						<li><a href="bantuan">Bantuan</a></li>
						<li><a href="promo.php">Promo</a></li>
					</ul>
				</div>
			</nav>
		</header>