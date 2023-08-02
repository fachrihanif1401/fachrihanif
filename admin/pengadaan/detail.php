<?php  
$id_pengadaan = $_GET['id'];
$detail = $pengadaan->detail($id_pengadaan);
?>

<?php  
$data = $pengadaan->show_detail($id_pengadaan);
?>
<section class="pcoded-main-container">
	<div class="pcoded-content">
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Detail Pengadaan Produk</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Data Produk</a></li>
							<li class="breadcrumb-item"><a href="#!">Pengadaan Produk</a></li>
							<li class="breadcrumb-item"><a href="#!">Detail Pengadaan Produk</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<a href="index.php?halaman=pengadaan" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
						<hr>
						<table class="table table-striped">
							<tr>
								<th width="20%">Nomor Transaksi</th>
								<th>:</th>
								<th><?= $detail['nomor_transaksi'] ?></th>
							</tr>
							<tr>
								<th>Nama Supplier</th>
								<th>:</th>
								<th><?= $detail['nama_supplier'] ?></th>
							</tr>
							<tr>
								<th>Tanggal Transaksi</th>
								<th>:</th>
								<th><?= $detail['tanggal_transaksi'] ?></th>
							</tr>
						</table>
						<br>
						<table id="example" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>No.</th>
									<th>Kategori</th>
									<th>Nama Produk</th>
									<th>Jumlah</th>
									<th>Harga Beli</th>
									<th>Subtotal</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data as $key => $value): ?>
									<tr>
										<td width="5%"><?= $key+1 ?></td>
										<td width="15%"><?= $value['nama_kategori'] ?></td>
										<td width="30%"><?= $value['nama_produk'] ?></td>
										<td width="30%"><?= $value['jumlah'] ?></td>
										<td width="30%">Rp. <?= number_format($value['harga_beli']) ?></td>
										<td width="20%">
											Rp. <?= number_format($value['subtotal']) ?>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="5">TOTAL</th>
									<th>Rp. <?= number_format($detail['total']) ?></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>