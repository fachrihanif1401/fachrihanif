<?php  
include 'config/class.php';
$pinstansi = $instansi->detail();
if (isset($_SESSION['pelanggan'])) 
{
	echo "<script>location='member';</script>";
	exit();
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Daftar | <?= $pinstansi['nama_instansi'] ?></title>
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
							<h5 class="text-center">DAFTAR SEKARANG</h5>
							<hr>
							<?php  
							if (isset($_POST['masuk'])) 
							{
								$hasil = $pelanggan->daftar($_POST['nama'],$_POST['email'],$_POST['password'],$_POST['telepon'],$_POST['alamat']);
								if ($hasil=="sukses") 
								{
									echo "<script>alert('Pendaftaran berhasil, silahkan gunakan email dan password yang baru saja Anda daftarkan!');</script>";
									echo "<script>location='login';</script>";
								}
								else
								{
									echo "<div class='alert alert-danger'><i class='fa fa-info-circle'></i> Email tidak tersedia.</div>";
								}
							}
							?>
							<form method="post">
								<div class="form-group">
									<label for="">Nama Lengkap</label>
									<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required="">
								</div>
								<div class="form-group">
									<label for="">Email</label>
									<input type="email" name="email" class="form-control" placeholder="Email" required="">
								</div>
								<div class="form-group">
									<label for="">Password</label>
									<input type="password" name="password" minlength="8" class="form-control" placeholder="Password" required="">
								</div>
								<div class="form-group">
									<label for="">Telepon</label>
									<input type="number" name="telepon" class="form-control" placeholder="Telepon" required="">
								</div>
								<div class="form-group">
									<label for="">Alamat</label>
									<textarea name="alamat" class="form-control" placeholder="Alamat Lengkap"></textarea>
								</div>
								<button name="masuk" class="btn btn-primary btn-block">Daftar</button>
							</form>

							<hr>
							<p class="text-center"> Sudah punya akun ? <a href="login">Masuk</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
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
