<?php  
include 'config/class.php';
$tampilkeranjang = $pembelian->tampilkeranjang();
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
}
$pinstansi = $instansi->detail();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Ceckout | <?= $pinstansi['nama_instansi'] ?></title>
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

	<!-- <div id="preloder">
		<div class="loader"></div>
	</div> -->

	<?php include 'header.php'; ?>

	<div class="page-top-info">
		<div class="container">
			<h4>Checkout</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Checkout</a>
			</div>
		</div>
	</div>

	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" method="post">
						<div class="cf-title">Alamat Pengiriman</div>
						
						<div class="row address-inputs">
							<div class="col-md-6">
								<label for="">Nama Penerima</label>
								<input type="text" name="nama_penerima" class="form-control" value="<?= $data_pelanggan['nama_pelanggan'] ?>" placeholder="Nama Penerima" required="">
							</div>
							<div class="col-md-6">
								<label for="">Telepon Penerima</label>
								<input type="text" name="telepon_penerima" class="form-control" value="<?= $data_pelanggan['telepon_pelanggan'] ?>" placeholder="Telepon Penerima" required="">
							</div>
							<div class="col-md-12">
								<label for="">Alamat Lengkap Penerima</label>
								<textarea name="alamat" id="" class="form-control" placeholder="Alamat Lengkap Penerima" required=""><?= $data_pelanggan['alamat_pelanggan'] ?></textarea>
							</div>
							<div class="col-md-12">
								<label for="">Catatan Untuk Penjual (Opsional)</label>
								<textarea name="catatan" id="" class="form-control" placeholder="Catatan Untuk Penjual (Opsional)"></textarea>
							</div>
						</div>
						<div class="cf-title">Kurir Pengiriman</div>
						<div class="row shipping-btns">
							<div class="col-6">
								<div class="form-group">
									<label for="">Provinsi</label>
									<select name="provinsi" class="form-control" required=""></select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Kota</label>
									<select name="kota" class="form-control" required=""></select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Ekspedisi</label>
									<select name="ekspedisi" class="form-control" required=""></select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Ongkos Kirim</label>
									<select name="ongkir" class="form-control" required=""></select>
								</div>
							</div>
						</div>
						
						

					</div>
					<div class="col-lg-4 order-1 order-lg-2">
						<div class="checkout-cart">
							<h4 class="text-center">Ringkasan Belanja</h4>
							<hr>
							<ul class="product-list">
								<?php  
								$totalbelanja=0;
								$total_berat=0;
								$jumlah=0;
								?>
								<?php foreach ($tampilkeranjang as $key => $value): ?>
									<?php  
									$totalbelanja+=$value["subharga"];
									$total_berat+=$value["subberat"];
									$jumlah+=$value["jumlah"];
									?>
									<li>
										<div class="pl-thumb"><img src="media/upload-produk/<?= $value['gambar_produk'] ?>" alt=""></div>
										<h6><?= $value['nama_produk'] ?></h6>
										<p>Rp. <?= number_format($value['harga_produk']) ?> x <?= $value['jumlah'] ?></p>
									</li>
								<?php endforeach ?>

							</ul>
							<ul class="price-list">
								<li>Total Harga<span>Rp. <?= number_format($totalbelanja) ?></span></li>
								<li>Total Berat<span>Rp. <?= number_format($total_berat) ?> gr</span></li>
								<li>Total Ongkos Kirim<span id="total_ongkir">Rp.</span></li>
								<li>Promo<span id="total_promo">Rp.</span></li>
								<li class="total">Total Tagihan<span id="total_bayar">Rp.</span></li>
								
							</ul>
						</div><br>
						<input type="hidden" name="total_belanja" value="<?php echo $totalbelanja; ?>">
						<input type="hidden" name="total_berat" value="<?php echo $total_berat; ?>">
						<input type="hidden" name="nama_provinsi" placeholder="nama_provinsi">
						<input type="hidden" name="nama_kota" placeholder="nama_kota">
						<input type="hidden" name="tipe" placeholder="tipe">
						<input type="hidden" name="kode_pos" placeholder="kode_pos">
						<input type="hidden" name="nama_ekspedisi" placeholder="nama_ekspedisi">
						<input type="hidden" name="nama_paket" placeholder="nama_paket">
						<input type="hidden" name="biaya_paket" placeholder="biaya_paket">
						<input type="hidden" name="lama_paket" placeholder="lama_paket">
						<div class="row">
							<div class="col-md-8">
								<input type="hidden" name="total_bayar" class="form-control total_bayar"> 
								<input type="hidden" name="total_promo" value="0" class="form-control total_promo"> 
								<input type="text" id="promo" class="form-control" placeholder="Masukan Kode Promo"> 
							</div>
							<div class="col-md-4">
								<button class="promo" class="btn btn-warning">Cek Kode</button>
							</div>
						</div>
						<br>
						<button name="checkout" class="site-btn submit-order-btn">Checkout</button>
					</form>
					<?php 
					if (isset($_POST['checkout'])) {
						$id_pembelian=$pembelian->checkout($_POST['nama_penerima'],$_POST['telepon_penerima'],$_POST['alamat'],$_POST['catatan'],$_POST['total_belanja'],$_POST['total_berat'],$_POST['nama_provinsi'],$_POST['nama_kota'],$_POST['tipe'],$_POST['kode_pos'],$_POST['nama_ekspedisi'],$_POST['nama_paket'],$_POST['biaya_paket'],$_POST['lama_paket'],$_POST['total_bayar'],$_POST['total_promo']);
						echo "<script>alert('Terima kasih telah melakukan pembelian, anda akan kami alihkan ke halaman pembayaran');</script>";
						echo "<script>location='deadline.php?id=$id_pembelian';</script>";
					}
					?>
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
		$(document).ready(function(){
			$.ajax({
				url:'dataprovinsi.php',
				success:function(hasil)
				{
					$("select[name=provinsi]").html(hasil);
				}
			})
		})
		$(document).ready(function(){
			$("select[name=provinsi]").on("change", function(){
		// mendapatkan id_provinsi yg dipillih
		var id_provinsi = $(this).val();

		// mendapatkan isi atribut nama, dari option yang dipilih
		var nama_provinsi = $("option:selected").attr("nama");
		// menaruh di input yg bernama nama_provinsi
		$("input[name=nama_provinsi]").val(nama_provinsi);
		$.ajax({
			url:'datakota.php',
			type:'POST',
			data:'idprov='+id_provinsi,
			success:function(hasil)
			{
				$("select[name=kota]").html(hasil);
			}
		});
		$("select[name=ekspedisi]").val(null);
		$("select[name=ongkir]").val(null);

		$("input[name=nama_kota]").val(null);
		$("input[name=tipe]").val(null);
		$("input[name=kode_pos]").val(null);
		$("input[name=nama_ekspedisi]").val(null);
		$("input[name=nama_paket]").val(null);
		$("input[name=biaya_paket]").val(null);
		$("input[name=lama_paket]").val(null);
	})
		})
		$(document).ready(function(){
			$("select[name=kota]").on("change", function(){
		// mendapatkan isi atribut nama
		var nama = $("option:selected",this).attr("nama");
		var kodepos = $("option:selected",this).attr("kodepos");
		var tipe = $("option:selected",this).attr("tipe");
		$("input[name=nama_kota]").val(nama);
		$("input[name=tipe]").val(tipe);
		$("input[name=kode_pos]").val(kodepos);
	})
		})
		$(document).ready(function(){
			$.ajax({
				url:'dataekspedisi.php',
				success:function(hasil)
				{
					var ekspedisi=$("select[name=ekspedisi]").html(hasil);
				}
			})
		})
		$(document).ready(function(){
			$("select[name=ekspedisi]").on("change", function(){
				var nama=$("option:selected",this).attr("nama");
				$("input[name=nama_ekspedisi]").val(nama);
			})
		})
		$(document).ready(function(){
			$("select[name=ekspedisi]").on("change", function(){
		// mendapatkan id kota dari selectnya kota
		var id_kota=$("select[name=kota]").val();
		alert(id_kota);
		var ekspedisi=$("select[name=ekspedisi]").val();
		var total_berat=$("input[name=total_berat]").val();
		$.ajax({
			url:'dataongkir.php',
			type:'POST',
			data:'id_kota='+id_kota+'&ekspedisi='+ekspedisi+'&total_berat='+total_berat,
			success:function(hasil)
			{
				// alert(hasil);
				$("select[name=ongkir]").html(hasil);
			}
		})
	})
		})
		$(document).ready(function(){
			$("select[name=ongkir]").on("change", function(){
		// mendapatkan isi dari atribut nama,biata,lama
		var nama = $("option:selected",this).attr("nama");
		var biaya = $("option:selected",this).attr("biaya");
		var lama = $("option:selected",this).attr("lama");

		$("input[name=nama_paket]").val(nama);
		$("input[name=biaya_paket]").val(biaya);
		$("input[name=lama_paket]").val(lama);

		$("#total_ongkir").html("Rp. "+biaya);

		var total_belanja = $("input[name=total_belanja]").val();
		var biaya_paket = $("input[name=biaya_paket]").val();
		
		var total_bayar= parseInt(total_belanja)+parseInt(biaya)		
		$("#total_bayar").html("Rp. "+total_bayar);
		$(".total_bayar").val(total_bayar);
	})
		})

		$(document).ready(function(){
			$(".promo").click(function(e) {
				e.preventDefault();
				var kode = $("#promo").val();
				$.ajax({
					type: "POST",
					url: "k_promo.php",
					data: { 
						kode: kode
					},
					dataType: "json",
					success: function(data) {
						var total_tagihan = $(".total_bayar").val();
						var total_t = $(".total_bayar").val();
						var diskon = parseInt(data.diskon)/100;


						var diskon2 = diskon * total_tagihan;
						$("#total_promo").html("Rp. "+diskon2);
						var harga_diskon = total_t - diskon2;
						var t_promo = total_t - diskon2;
						$("#total_bayar").html("Rp. "+harga_diskon);
						$(".total_bayar").val(harga_diskon);
						$(".total_promo").val(diskon2);
						
					},
					error: function(result) {
						alert('Promo tidak tersedia!');
					}
				});
			});
		})
	</script>
</body>
</html>
