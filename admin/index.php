<?php  
include '../config/class.php';
include '../config/fungsi.php';
if (!isset($_SESSION['user'])) 
{
	echo "<script>alert('Anda belum login!');</script>";
	echo "<script>location='login';</script>";
}
else
{
	$id_user = $_SESSION['user']['id_user'];
	$data_user =  $user->detail($id_user);
}
$data_instansi = $instansi->detail();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Administrator | <?= $data_instansi['nama_instansi'] ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Codedthemes" />
	<link rel="icon" href="../media/upload-instansi/<?= $data_instansi['logo_instansi'] ?>" type="image/x-icon">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css
	">
</head>
<style>
	.pp
	{
		height: 40px;
	}
</style>
<body class="">
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<nav class="pcoded-navbar menupos-fixed menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Navigation</label>
					</li>
					<li class="nav-item">
						<a href="./" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					
					<li class="nav-item">
						<a href="index.php?halaman=kategori" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Data Kategori</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Data Produk</span></a>
						<ul class="pcoded-submenu">
							<li><a href="index.php?halaman=produk">Produk</a></li>
							<li><a href="index.php?halaman=pengadaan">Pengadaan Produk</a></li>
							<!-- <li><a href="index.php?halaman=penjualan">Penjualan Produk</a></li> -->
						</ul>
					</li>
					<li class="nav-item">
						<a href="index.php?halaman=promo" class="nav-link "><span class="pcoded-micon"><i class="feather icon-percent"></i></span><span class="pcoded-mtext">Data Promo</span></a>
					</li>
					<li class="nav-item">
						<a href="index.php?halaman=supplier" class="nav-link "><span class="pcoded-micon"><i class="feather icon-download	"></i></span><span class="pcoded-mtext">Data Supplier</span></a>
					</li>
					<li class="nav-item">
						<a href="index.php?halaman=pelanggan" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Data Pelanggan</span></a>
					</li>
					<li class="nav-item">
						<a href="index.php?halaman=pembelian" class="nav-link "><span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span><span class="pcoded-mtext">Data Pembelian</span></a>
					</li>
					<li class="nav-item">
						<a href="index.php?halaman=return" class="nav-link "><span class="pcoded-micon"><i class="feather icon-package"></i></span><span class="pcoded-mtext">Data Return</span></a>
					</li>
					<li class="nav-item">
						<a href="index.php?halaman=bank" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Data Bank</span></a>
					</li>
					<li class="nav-item">
						<a href="index.php?halaman=laporan" class="nav-link "><span class="pcoded-micon"><i class="feather icon-printer"></i></span><span class="pcoded-mtext">Data Laporan</span></a>
					</li>
					<li class="nav-item">
						<a href="index.php?halaman=pengguna" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Data Pengguna</span></a>
					</li>
					<li class="nav-item">
						<a href="index.php?halaman=testimoni" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Testimoni</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Pengaturan</span></a>
						<ul class="pcoded-submenu">
							<li><a href="index.php?halaman=instansi">Identitas Website</a></li>
							<li><a href="index.php?halaman=banner">Banner</a></li>
							<li><a href="index.php?halaman=logo">Logo</a></li>
							<li><a href="index.php?halaman=profil">Profil</a></li>
							<li><a href="index.php?halaman=ubah_password">Ubah Password</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="index.php?halaman=grafik" class="nav-link "><span class="pcoded-micon"><i class="feather icon-bar-chart"></i></span><span class="pcoded-mtext">Keuangan & Grafik</span></a>
					</li>
					<li class="nav-item">
						<a href="logout" class="nav-link" onclick="return confirm('Apakah anda yakin?')"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Keluar</span></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue">
		

		<div class="m-header">
			<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
			<a href="#!" class="b-brand">
				<!-- ========   change your logo hear   ============ -->
				<h5 class="text-white">ADMINISTRATOR</h5>
			</a>
			<a href="#!" class="mob-toggler">
				<i class="feather icon-more-vertical"></i>
			</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav mr-auto">
				
				<li class="nav-item">
					<a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<!-- <li>
					<div class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i><span class="badge bg-danger"><span class="sr-only"></span></span></a>
						<div class="dropdown-menu dropdown-menu-right notification">
							<div class="noti-head">
								<h6 class="d-inline-block m-b-0">Notifikasi</h6>
							</div>
							<ul class="noti-body">
								<li class="notification">
									<div class="media">
										<img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
										<div class="media-body">
											<p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
											<p>New ticket Added</p>
										</div>
									</div>
								</li>
							</ul>
							<div class="noti-footer">
							</div>
						</div>
					</div>
				</li> -->
				<li>
					<div class="dropdown drp-user">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown">
							<?php if (empty($data_user['foto'])): ?>
								<img src="../media/upload-pengguna/no-img.jpg" class="img-radius wid-40 pp" alt="User-Profile-Image">
								<?php else: ?>
									<img src="../media/upload-pengguna/<?= $data_user['foto'] ?>" class="img-radius wid-40 pp" alt="User-Profile-Image">
								<?php endif ?>
								<?= $data_user['nama'] ?> <i class="feather icon-chevron-down"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right profile-notification">
								<div class="pro-head">
									<?php if (empty($data_user['foto'])): ?>
										<img src="../media/upload-pengguna/no-img.jpg" class="img-radius pp" alt="User-Profile-Image">
										<?php else: ?>
											<img src="../media/upload-pengguna/<?= $data_user['foto'] ?>" class="img-radius pp" alt="User-Profile-Image">
										<?php endif ?>
										<span><?= $data_user['nama'] ?></span>
									</div>
									<ul class="pro-body">
										<li><a href="index.php?halaman=profil" class="dropdown-item"><i class="feather icon-user"></i> Profil</a></li>
										<li><a href="index.php?halaman=ubah_password" class="dropdown-item"><i class="feather icon-lock"></i> Ubah Password</a></li>
										<li><a href="logout" class="dropdown-item" onclick="return confirm('Apakah anda yakin?')"><i class="feather icon-power"></i> Keluar</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>


			</header>
			<?php  
			if (!isset($_GET['halaman'])) 
			{
				include 'dashboard.php';
			}
			else
			{
				if ($_GET['halaman']=='kategori') 
				{
					include 'kategori/list.php';
				}
				elseif ($_GET['halaman']=='tambahkategori') 
				{
					include 'kategori/add.php';
				}
				elseif ($_GET['halaman']=='ubahkategori') 
				{
					include 'kategori/edit.php';
				}
				elseif ($_GET['halaman']=='hapuskategori') 
				{
					include 'kategori/delete.php';
				}
				elseif ($_GET['halaman']=='pengguna') 
				{
					include 'pengguna/list.php';
				}
				elseif ($_GET['halaman']=='tambahpengguna') 
				{
					include 'pengguna/add.php';
				}
				elseif ($_GET['halaman']=='ubahpengguna') 
				{
					include 'pengguna/edit.php';
				}
				elseif ($_GET['halaman']=='hapuspengguna') 
				{
					include 'pengguna/delete.php';
				}
				elseif ($_GET['halaman']=='supplier') 
				{
					include 'supplier/list.php';
				}
				elseif ($_GET['halaman']=='tambahsupplier') 
				{
					include 'supplier/add.php';
				}
				elseif ($_GET['halaman']=='ubahsupplier') 
				{
					include 'supplier/edit.php';
				}
				elseif ($_GET['halaman']=='hapussupplier') 
				{
					include 'supplier/delete.php';
				}
				elseif ($_GET['halaman']=='produk') 
				{
					include 'produk/list.php';
				}
				elseif ($_GET['halaman']=='tambahproduk') 
				{
					include 'produk/add.php';
				}
				elseif ($_GET['halaman']=='ubahproduk') 
				{
					include 'produk/edit.php';
				}
				elseif ($_GET['halaman']=='hapusproduk') 
				{
					include 'produk/delete.php';
				}
				elseif ($_GET['halaman']=='detailproduk') 
				{
					include 'produk/detail.php';
				}
				elseif ($_GET['halaman']=='stok') 
				{
					include 'stok/list.php';
				}
				elseif ($_GET['halaman']=='gambarproduk') 
				{
					include 'produk/gambar.php';
				}
				elseif ($_GET['halaman']=='hapusgambar') 
				{
					include 'produk/deletegambar.php';
				}
				elseif ($_GET['halaman']=='pengadaan') 
				{
					include 'pengadaan/list.php';
				}
				elseif ($_GET['halaman']=='transaksi') 
				{
					include 'pengadaan/transaksi.php';
				}
				elseif ($_GET['halaman']=='bataltransaksi') 
				{
					include 'pengadaan/bataltransaksi.php';
				}
				elseif ($_GET['halaman']=='hapuskeranjang') 
				{
					include 'pengadaan/hapuskeranjang.php';
				}
				elseif ($_GET['halaman']=='detailpengadaan') 
				{
					include 'pengadaan/detail.php';
				}
				elseif ($_GET['halaman']=='penjualan') 
				{
					include 'penjualan/list.php';
				}
				elseif ($_GET['halaman']=='transaksi_penjualan') 
				{
					include 'penjualan/transaksi.php';
				}
				elseif ($_GET['halaman']=='notapengadaan') 
				{
					include 'pengadaan/nota.php';
				}
				elseif ($_GET['halaman']=='pelanggan') 
				{
					include 'pelanggan/list.php';
				}
				elseif ($_GET['halaman']=='tambahpelanggan') 
				{
					include 'pelanggan/add.php';
				}
				elseif ($_GET['halaman']=='ubahpelanggan') 
				{
					include 'pelanggan/edit.php';
				}
				elseif ($_GET['halaman']=='hapuspelanggan') 
				{
					include 'pelanggan/delete.php';
				}
				elseif ($_GET['halaman']=='profil') 
				{
					include 'pengaturan/profil.php';
				}
				elseif ($_GET['halaman']=='ubah_password') 
				{
					include 'pengaturan/ubah_password.php';
				}
				elseif ($_GET['halaman']=='instansi') 
				{
					include 'pengaturan/instansi.php';
				}
				elseif ($_GET['halaman']=='laporan') 
				{
					include 'laporan/list.php';
				}
				elseif ($_GET['halaman']=='bank') 
				{
					include 'bank/list.php';
				}
				elseif ($_GET['halaman']=='tambahbank') 
				{
					include 'bank/add.php';
				}
				elseif ($_GET['halaman']=='ubahbank') 
				{
					include 'bank/edit.php';
				}
				elseif ($_GET['halaman']=='hapusbank') 
				{
					include 'bank/delete.php';
				}
				elseif ($_GET['halaman']=='promo') 
				{
					include 'promo/list.php';
				}
				elseif ($_GET['halaman']=='tambahpromo') 
				{
					include 'promo/add.php';
				}
				elseif ($_GET['halaman']=='editpromo') 
				{
					include 'promo/edit.php';
				}
				elseif ($_GET['halaman']=='hapuspromo') 
				{
					include 'promo/delete.php';
				}
				elseif ($_GET['halaman']=='pembelian') 
				{
					include 'pembelian/list.php';
				}
				elseif ($_GET['halaman']=='pembayaran') 
				{
					include 'pembelian/pembayaran.php';
				}
				elseif ($_GET['halaman']=='detailpembelian') 
				{
					include 'pembelian/detail.php';
				}
				elseif ($_GET['halaman']=="terima_pembayaran") 
				{
					include 'pembelian/terima_pembayaran.php';
				}
				elseif ($_GET['halaman']=="tolak_pembayaran") 
				{
					include 'pembelian/tolak_pembayaran.php';
				}
				elseif ($_GET['halaman']=="resi") 
				{
					include 'pembelian/resi.php';
				}
				elseif ($_GET['halaman']=="testimoni") 
				{
					include 'testimoni/list.php';
				}
				elseif ($_GET['halaman']=="grafik") 
				{
					include 'grafik/list.php';
				}
				elseif ($_GET['halaman']=="return") 
				{
					include 'return/list.php';
				}
				elseif ($_GET['halaman']=="setujui_return") 
				{
					include 'return/setujui.php';
				}
				elseif ($_GET['halaman']=="tolak_return") 
				{
					include 'return/tolak.php';
				}
				elseif ($_GET['halaman']=="logo") 
				{
					include 'logo/list.php';
				}
				elseif ($_GET['halaman']=="banner") 
				{
					include 'banner/list.php';
				}
				elseif ($_GET['halaman']=="laba") 
				{
					include 'grafik/laba.php';
				}


			}
			?>

			<script src="assets/js/vendor-all.min.js"></script>
			<script src="assets/js/plugins/bootstrap.min.js"></script>
			<script src="assets/js/pcoded.min.js"></script>
			<script src="assets/js/plugins/apexcharts.min.js"></script>
			<script src="assets/js/pages/dashboard-main.js"></script>
			<script src="assets/bower_components/ckeditor/ckeditor.js"></script>
			<script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
			<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
			<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
			<script src="assets/js/Chart.js"></script>

			<script src="assets/chart.js/Chart.min.js"></script>

			<script>
				$(function () {
					CKEDITOR.replace('editor1')
					$('.textarea').wysihtml5()
				})
			</script>
			<?php  
			$label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
			?>
			<script>
				var ctx = document.getElementById("myChart").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: <?php echo json_encode($label); ?>,
						datasets: [{
							label: 'Grafik Penjualan',
							data: <?php echo json_encode($penjualan); ?>,
							borderWidth: 1,
							backgroundColor : '#17A2B8'
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero:true
								}
							}]
						}
					}
				});
			</script>

			<script>
				var ctx = document.getElementById("myChartp").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: <?php echo json_encode($label); ?>,
						datasets: [{
							label: 'Grafik Pembelian',
							data: <?php echo json_encode($pembelian); ?>,
							borderWidth: 1,
							backgroundColor : '#FFBE60'
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero:true
								}
							}]
						}
					}
				});
			</script>
			<script>
				var ctx = document.getElementById("myCharta").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: <?php echo json_encode($label); ?>,
						datasets: [{
							label: 'Grafik Pendapatan',
							data: <?php echo json_encode($pendapatan); ?>,
							borderWidth: 1,
							backgroundColor : '#40DBBC'
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero:true
								}
							}]
						}
					}
				});
			</script>
			<script>
				var ctx = document.getElementById("myChartb").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: <?php echo json_encode($label); ?>,
						datasets: [{
							label: 'Grafik Pengeluaran',
							data: <?php echo json_encode($pengeluaran); ?>,
							borderWidth: 1,
							backgroundColor : '#FF6E86'
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero:true
								}
							}]
						}
					}
				});
			</script>
			<script>
				var ctx = document.getElementById("myChartPt").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: <?php echo json_encode($produk); ?>,
						datasets: [{
							label: 'Grafik Produk Terlaris',
							data: <?php echo json_encode($terjual); ?>,
							borderWidth: 1,
							backgroundColor : '#15A38B'
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero:true
								}
							}]
						}
					}
				});
			</script>
			<script type="text/javascript">
				$(".alert-slide-up").alert().delay(3000).slideUp('slow');
			</script>
			<script>
				$(document).ready(function() {
					var table = $('#example').DataTable( {
						rowReorder: {
							selector: 'td:nth-child(2)'
						}
					} );
				} );
			</script>

			<script>
				$(function () {
					$('#example1').DataTable()
					$('#example2').DataTable({
						'paging'      : true,
						'lengthChange': false,
						'searching'   : false,
						'ordering'    : true,
						'info'        : true,
						'autoWidth'   : false
					})
				})
			</script>

		</body>
		</html>
