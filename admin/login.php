<?php  
include '../config/class.php';
$data_instansi = $instansi->detail();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Administrator | <?= $data_instansi['nama_instansi']; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Codedthemes" />
	<link rel="icon" href="../media/upload-instansi/<?= $data_instansi['logo_instansi'] ?>" type="image/x-icon">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<h4>LOGIN <br> <?= $data_instansi['nama_instansi']; ?></h4> <hr>
						<?php  
						if (isset($_POST['masuk'])) 
						{
							$hasil = $user->login($_POST['username'],$_POST['password']);
							if ($hasil=="sukses") 
							{
								echo "<script>location='./';</script>";
							}
							else
							{
								echo "<div class='alert alert-danger alert-slide-up'><i class='feather icon-info'></i> Username atau Password salah!</div>";
							}
						}
						?>
						<form method="post">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-user"></i></span>
								</div>
								<input type="text" name="username" class="form-control" placeholder="Username" required="">
							</div>
							<div class="input-group mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-lock"></i></span>
								</div>
								<input type="password" name="password" class="form-control" placeholder="Password" required="">
							</div>
							<button name="masuk" class="btn btn-block btn-primary mb-4">Signin</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/waves.min.js"></script>
<script type="text/javascript">
	$(".alert-slide-up").alert().delay(3000).slideUp('slow');
</script>
</body>
</html>
