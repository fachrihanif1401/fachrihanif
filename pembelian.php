<div class="card">
	<div class="card-body">
		<h3 class="text-center"> Pembelian</h3>
		<hr>
		<table class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th>No</th>
					<th>Tgl. Transaksi</th>
					<th>Status</th>
					<th>Total</th>
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data_pembelian as $key => $value): ?>
					<tr>
						<td width="3%"><?= $key+1 ?></td>
						<td width="17%"><?= format_hari_tanggal($value['tanggal_pembelian']) ?></td>
						<td width="14%">
							<?php if ($value['status_pembelian']=="Belum Bayar"): ?>
								<span class="badge badge-danger"><?= $value['status_pembelian'] ?></span>
							<?php elseif ($value['status_pembelian']=="Menunggu Konfirmasi"): ?>
								<span class="badge badge-warning"><?= $value['status_pembelian'] ?></span>
							<?php elseif ($value['status_pembelian']=="Dikemas"): ?>
								<span class="badge badge-info"><?= $value['status_pembelian'] ?></span>
							<?php elseif ($value['status_pembelian']=="Dikirim"): ?>
								<span class="badge badge-info"><?= $value['status_pembelian'] ?></span>
							<?php elseif ($value['status_pembelian']=="Selesai"): ?>
								<span class="badge badge-success"><?= $value['status_pembelian'] ?></span>
							<?php elseif ($value['status_pembelian']=="Pembayaran Ditolak"): ?>
								<span class="badge badge-danger"><?= $value['status_pembelian'] ?></span>
							<?php elseif ($value['status_pembelian']=="Menunggu Konfirmasi Ulang"): ?>
								<span class="badge badge-warning"><?= $value['status_pembelian'] ?></span>
							<?php elseif ($value['status_pembelian']=="Return Barang"): ?>
								<span class="badge badge-warning"><?= $value['status_pembelian'] ?></span>
							<?php elseif ($value['status_pembelian']=="Barang return disetujui"): ?>
								<span class="badge badge-success"><?= $value['status_pembelian'] ?></span>
							<?php elseif ($value['status_pembelian']=="Barang return ditolak"): ?>
								<span class="badge badge-danger"><?= $value['status_pembelian'] ?></span>
							<?php endif ?>
						</td>
						<td width="13%">Rp. <?= number_format($value['total_pembelian']) ?></td>
						<td width="27%">
							<?php if ($value['status_pembelian']=="Belum Bayar"): ?>
								<a href="deadline.php?id=<?= $value['id_pengiriman'] ?>" class="btn btn-info btn-xs"><i class="fa fa-clock-o"></i> Deadline</a>
							<?php elseif ($value['status_pembelian']=="Dikirim"): ?>
								<a href='#penilaian' class='btn btn-warning btn-xs' data-toggle='modal' data-id="<?= $value['id_pengiriman'] ?>" data-idpelanggan="<?= $id_pelanggan ?>" style="background-color: #f7ae09; border-color: #f7ae09;"><i class="fa fa-info-circle"></i> Pembelian Diterima</a>
								<a href="#" onclick="return t_return(<?= $value['id_pengiriman'] ?>)" class="btn btn-info btn-xs"><i class="fa fa-cube"></i> Return Barang</a>
							<?php elseif ($value['status_pembelian']=="Selesai"): ?>
								<a href='#penilaian' class='btn btn-warning btn-xs' data-toggle='modal' data-id="<?= $value['id_pengiriman'] ?>" data-idpelanggan="<?= $id_pelanggan ?>" style="background-color: #f7ae09; border-color: #f7ae09;"><i class="fa fa-star"></i> Penilaian</a>
							<?php endif ?>
							<a href="member.php?halaman=pembayaran&id=<?= $value['id_pengiriman'] ?>" class="btn btn-success btn-xs"><i class="fa fa-money"></i> Pembayaran</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<div class="modal fade" id="penilaian" role="dialog">
	<div class="modal-dialog" style="margin-top: 120px;" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fa fa-user-cubes"></i> Penilaian Produk</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">

				<div class="hasil-data"></div>
				<?php 
				if (isset($_POST['kirimpenilaian'])) {
					$pembelian->penilaian($_POST['id_pengiriman'],$_POST['id_pelanggan'],$_FILES['gambar'],$_POST['penilaian']);
					echo "<script>alert('Penilaian berhasil di kirim, terima kasih telah membeli produk di toko kami!');</script>";
					echo "<script>location='member.php?halaman=pembelian';</script>"; 
				}
				?> 
			</div>
		</div>
	</div>
</div>



<div id="m_return" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Return Produk</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
			<div class="alert alert-success"><i class="fa fa-info"></i> Silahkan baca kebijakan return produk sebelum anda melanjutkan! <a href="kebijakan" target="_blank"><b>Klik Disini!</b></a></div>
				<table class="table table-striped table-bordered" id="mydata">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Harga</th>
							<th>Gambar</th>
						</tr>
					</thead>
					<tbody id="show_data">

					</tbody>
				</table>
				<form method="post" enctype="multipart/form-data">	
					<input type="hidden" name="id_pengiriman" id="id">
					<div class="form-group">
						<label>Jenis Return</label> <br>	
						<input type="radio" name="jenis" value="Tukar Barang"> Tukar Barang &nbsp;&nbsp;
						<!-- <input type="radio" name="jenis" value="Uang Kembali"> Uang Kembali &nbsp;&nbsp; -->
						<input type="radio" name="jenis" value="Kirim Kembali"> Kirim Kembali 
					</div>
					<div class="form-group">
						<label>Bukti Barang</label>	
						<input type="file" name="bukti" class="form-control" required=""> 
					</div>
					<div class="form-group">
						<label>Alasan Return</label>	
						<textarea name="alasan" class="form-control" placeholder="Alasan Return" required=""></textarea>
					</div>
					<button name="submit" class="btn btn-success"> Submit</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
				</form>
				<?php 	
				if (isset($_POST['submit'])) 
				{
					$pembelian->return($_POST['jenis'],$_FILES['bukti'],$_POST['alasan'],$_POST['id_pengiriman']);
					echo "<script>alert('Data return berhasil di simpan!');</script>";
					echo "<script>location='member.php?halaman=pembelian';</script>";
				}
				?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>


