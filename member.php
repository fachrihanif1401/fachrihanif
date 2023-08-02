	<?php  
	include 'config/class.php';
	include 'config/fungsi.php';
	if (!isset($_SESSION['pelanggan'])) 
	{
		echo "<script>alert('Anda harus login terlebih dahulu!');</script>";
		echo "<script>location='login';</script>";
		exit();
	}
	else
	{
		$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
		$data_pelanggan = $pelanggan->detail($id_pelanggan);
		$data_pembelian = $pembelian->tampil_pembelian_pelanggan($id_pelanggan);
	}
	$pinstansi = $instansi->detail();
	?>
	<!DOCTYPE html>
	<html lang="zxx">
	<head>
		<title>Member | <?= $pinstansi['nama_instansi'] ?></title>
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
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css
		">
		<style>
		.btn-xs
		{
			font-size: 12px;
			padding: 1px 10px
		}
	</style>
</head>
<body>
	<!-- <div id="preloder">
		<div class="loader"></div>
	</div> -->

	<?php include 'header.php'; ?>
	<div class="page-top-info">
		<div class="container">
			<h4>Member</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Member</a>
			</div>
		</div>
	</div>

	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
						<div class="card-body">
							<style>
							.pp
							{
								border-radius: 50%;
								height: 100px;
							}
						</style>
						<center>
							<?php if (empty($data_pelanggan['foto_pelanggan'])): ?>
								<img width="100" class="img-thumbnail pp" src="media/upload-pelanggan/no-img.jpg" alt="">
							<?php else: ?>
								<img width="100" src="media/upload-pelanggan/<?= $data_pelanggan['foto_pelanggan'] ?>" class="img-thumbnail pp" alt="">
								<?php endif ?><br><br>
								<h6><?= $data_pelanggan['nama_pelanggan'] ?></h6>
								<p style="margin-top: 10px;"><a href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-edit"></i> Ubah Profil</a></p>
							</center> 
						</div>
					</div><br>
					<div class="card">
						<div class="card-body">
							<p><a href="member"><img width="25" class="packing" src="img/usericon.png" alt="">&nbsp;&nbsp; <strong>Profil</strong></a></p>
							<hr>
							<p><a href="member.php?halaman=pembelian"><img width="25" class="packing" src="img/online-shop.png" alt="">&nbsp;&nbsp; <strong>Pembelian</strong></a></p>
							<hr>
							<p><a href="member.php?halaman=notifikasi"><img width="25" class="packing" src="img/bell.png" alt="">&nbsp;&nbsp; <strong>Notifikasi</strong> 
								<span class="pull-right-container" >
									<small class="badge badge-danger pull-right bg-blue count" style="margin-top: 7px;"></small>
								</span></a></p>
								<hr>
								<p><a href="member.php?halaman=promo"><img width="25" class="packing" src="img/tidakada.png" alt="">&nbsp;&nbsp; <strong>Promo</strong></a></p>
								<hr>
							</div>

						</div>
					</div>
					<div class="col-md-9">
						<?php  
						if (!isset($_GET['halaman'])) 
						{
							include 'profil.php';
						}
						else
						{
							if ($_GET['halaman']=="pembelian") 
							{
								include 'pembelian.php';
							}
							elseif ($_GET['halaman']=="notifikasi") 
							{
								include 'notifikasi.php';
							}
							elseif ($_GET['halaman']=="pembayaran") 
							{
								include 'pembayaran.php';
							}
							elseif ($_GET['halaman']=="ubah_password") 
							{
								include 'ubah_password.php';
							}
							elseif ($_GET['halaman']=="promo") 
							{
								include 'notif_promo.php';
							}
						}
						?>
					</div>
				</div>
			</div>
		</section>

		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Ubah Profil</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="form-group col-md-12">
									<label for="">Nama Lengkap</label>
									<input type="text" name="nama_pelanggan" value="<?= $data_pelanggan['nama_pelanggan'] ?>" class="form-control" required="">
								</div>
								<div class="form-group col-md-12">
									<label for="">Email</label>
									<input type="text" name="email_pelanggan" value="<?= $data_pelanggan['email_pelanggan'] ?>" class="form-control" required="">
								</div>
								<div class="form-group col-md-12">
									<label for="">Telepon</label>
									<input type="text" name="telepon_pelanggan" value="<?= $data_pelanggan['telepon_pelanggan'] ?>" class="form-control" required="">
								</div>
								<div class="form-group col-md-12">
									<div class="row">
										<div class="col-md-3">
											<?php if (empty($data_pelanggan['foto_pelanggan'])): ?>
												<img width="200" class="img-thumbnail" src="media/upload-pelanggan/no-img.jpg" alt="">
											<?php else: ?>
												<img width="200" class="img-thumbnail" src="media/upload-pelanggan/<?= $data_pelanggan['foto_pelanggan'] ?>" alt="">
											<?php endif ?>
										</div>
										<div class="col-md-9">
											<label for="">Foto</label>
											<input type="file" name="foto_pelanggan" class="form-control">
										</div>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label for="">Alamat</label>
									<textarea name="alamat_pelanggan" id="" class="form-control" placeholder="Alamat" required=""><?= $data_pelanggan['alamat_pelanggan'] ?></textarea>
								</div>
							</div>
							<hr>
							<button name="ubahprofil" class="btn btn-primary">Simpan</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						</form>
						<?php  
						if (isset($_POST['ubahprofil'])) 
						{
							$pelanggan->ubah_profil($_POST['nama_pelanggan'],$_POST['email_pelanggan'],$_POST['telepon_pelanggan'],$_FILES['foto_pelanggan'],$_POST['alamat_pelanggan'],$id_pelanggan);
							echo "<script>alert('Profil berhasil diperbaharui!');</script>";
							echo "<script>location='member';</script>";
						}
						?>
					</div>
				</div>
			</div>
		</div>

		<?php include 'footer.php'; ?>
		<?php include 'whatsapp.php'; ?>

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
		<script src="js/jquery.slicknav.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.nicescroll.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/main.js"></script>
		<script >
			$(document).ready(function() {
				var table = $('#example').DataTable( {
					rowReorder: {
						selector: 'td:nth-child(2)'
					},
					responsive: true
				} );
			} );
		</script>
		<script type="text/javascript">

			$(document).ready(function(){

				$('#penilaian').on('show.bs.modal', function (e) {

					var idx = $(e.relatedTarget).data('id');
					var idp = $(e.relatedTarget).data('idpelanggan');

            //menggunakan fungsi ajax untuk pengambilan data

            $.ajax({

            	type : 'post',

            	url : 'penilaian.php',

            	data :  {idx: idx, idp: idp},

            	success : function(data){

                $('.hasil-data').html(data);//menampilkan data ke dalam modal

            }

        });

        });

			});

		</script>
		<script>
			$(document).ready(function() {
				selesai();
			});

			function selesai() {
				setTimeout(function() {
					update();
					selesai();
				}, 200);
			}

			function update() {
				$.getJSON("api/notifikasi.php", function(data) {
					$(".count").empty();
					$.each(data.result, function() {
						var hasil = this['totnotifikasi']
						if (hasil > 0) 
						{
							$('.count').html(hasil);
						}
					});
				});
			}
		</script>
		<script type="text/javascript">
			function t_return(id)
			{
				$('#m_return').modal('show');

				$('#id').val(id);

				$.ajax({
					type  : 'GET',
					url   : 'data_return.php',
					data  : {id:id},
					dataType : 'json',
					success : function(data){
						var html = '';
						var i;
						for(i=0; i<data.length; i++){
							html += '<tr>'+
							'<td>'+data[i].nama_produk+'</td>'+
							'<td>'+data[i].harga_produk+'</td>'+
							'<td><img width="100" src="media/upload-produk/'+data[i].gambar_produk+'"></td>'+
							
							'</tr>';
						}
						$('#show_data').html(html);
					}

				});
			}
		</script>
	</body>
	</html>
