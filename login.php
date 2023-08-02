<?php  
include 'config/class.php';
$dinstansi = $instansi->detail();
if (isset($_SESSION['pelanggan'])) 
{
	echo "<script>location='member';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Login Member | <?= $dinstansi['nama_instansi']; ?></title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="media/upload-instansi/<?= $dinstansi['logo_instansi'] ?>" type="image/x-icon">
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
	
	<div style="margin-top: 40px; margin-bottom: 40px;">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<h5 class="text-center">MASUK</h5>
							<hr>
							<?php  
							if (isset($_POST['masuk'])) 
							{
								$hasil = $pelanggan->login($_POST['email'],$_POST['password']);
								if ($hasil=='sukses') 
								{
									echo "<script>location='member';</script>";
								}
								else
								{
									echo "<div class='alert alert-danger'><i class='fa fa-info-circle'></i> Username dan Password tidak cocok.</div>";
								}
							}
							?>
							<form method="post">
								<div class="form-group">
									<label for="">Email</label>
									<input type="email" name="email" class="form-control" placeholder="Email" required="">
								</div>
								<div class="form-group">
									<label for="">Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" required="">
								</div>
								<center>
									<button name="masuk" class="btn btn-primary btn-block">Masuk</button>
								
								</center>
							</form>
							<hr>
							<p class="text-center">Belum punya akun ? <a href="daftar">Daftar</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Lupa Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" name="email" class="form-control" placeholder="Email">
						</div>
						<button name="ubah_password" class="btn btn-primary">Kirim</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					</form>
					<?php  
					if (isset($_POST['ubah_password'])) 
					{
						$hasil = $pelanggan->lupa_password($_POST['email']);
						if ($hasil=="sukses") 
						{
							echo "<script>alert('Password baru telah kami kirimkan ke alamat email Anda!');</script>";
							echo "<script>location='login';</script>";
						}
						else
						{
							echo "<script>alert('Email yang Anda masukan tidak valid!');</script>";
							echo "<script>location='login';</script>";
						}
					}
					?>
				</div>

			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
	<?php include 'whatsapp.php'; ?>
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
