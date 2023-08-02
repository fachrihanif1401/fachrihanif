<?php  
$id_pengiriman = $_GET['id'];
$detail = $pembelian->detail($id_pengiriman);
$cek = $pembelian->cek_status_pembayaran($id_pengiriman);
?>
<div class="card">
	<div class="card-body">
		<a href="member.php?halaman=pembelian" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
		<h3 class="text-center"> Pembayaran</h3>
		<hr>
		<?php if ($cek=="belumkirim"): ?>
			<h5 class="alert alert-info text-center"> Jumlah tagihan yang harus Anda bayar sebesar Rp. <?= number_format($detail['total_pembelian']) ?></h5>

			<p style="background-color: #F8F8F8; padding-bottom: 10px; padding-top: 10px;"><img width="25" class="tip" src="img/tip.png" alt=""> Unggah bukti pembayaran dapat mempercepat verifikasi pembayaran</p>
			<p>Pastikan bukti pembayaran menampilkan:</p>
			<div class="row">
				<div class="col-md-6">
					<p><i class="fa fa-circle" style="color: #4BC34B;"></i> <strong>Tanggal/Waktu Transfer</strong> <br>&nbsp;&nbsp;&nbsp;&nbsp; contoh: tgl. 14/01/01 / jam 07:14:01</p>
					<p><i class="fa fa-circle" style="color: #4BC34B;"></i> <strong>Status Berhasil</strong> <br>&nbsp;&nbsp;&nbsp;&nbsp; contoh: Transfer BERHASIL, Transaksi Sukses</p>
				</div>
				<div class="col-md-6">
					<p><i class="fa fa-circle" style="color: #4BC34B;"></i> <strong>Detail Penerima</strong> <br>&nbsp;&nbsp;&nbsp;&nbsp; contoh: Transfer ke Rekening Fachri</p>
					<p><i class="fa fa-circle" style="color: #4BC34B;"></i> <strong>Status Berhasil</strong> <br>&nbsp;&nbsp;&nbsp;&nbsp; contoh: Rp 123.456,00</p>
				</div>
			</div>
			<center> <img width="40" src="img/bar.png" alt=""><br>
				<p>Format gambar: .JPG, .JPEG, .PNG</p>
			</center>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Bukti Pembayaran</label>
					<input type="file" name="bukti" class="form-control">
				</div>
				<div class="text-center">
					<a href="member.php?halaman=pembelian" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
					<button class="btn btn-success" name="unggah" style="background:#4BC34B; border-color: #4BC34B;"><i class="fa fa-upload"></i> Unggah</button>
				</div>
			</form>
			<?php  
			if (isset($_POST['unggah'])) 
			{
				$pembelian->unggahbukti($_FILES['bukti'],$id_pengiriman);
				echo "<script>alert('Bukti pembayaran berhasil di unggah');</script>";
				echo "<script>location='member.php?halaman=pembelian';</script>";
			}
			?>
			<br>
			<?php else: ?>
				<?php if ($detail['status_pembelian']=="Menunggu Konfirmasi"): ?>
					<div class="alert alert-info"><i class="fa fa-info-circle"></i> Pembayaran anda sedang menunggu konfirmasi, mohon menunggu paling lambat 1 x 24 jam.</div>
					<?php elseif ($detail['status_pembelian']=="Dikemas"): ?>
						<div class="alert alert-info"><i class="fa fa-info-circle"></i> Pembayaran anda telah kami konfirmasi & pembelian anda sedang dalam proses pengemasan. Kami akan memberitahukan jika pembelian ada telah kami kirim!</div>
						<?php elseif ($detail['status_pembelian']=="Dikirim"): ?>
							<div class="alert alert-info"><i class="fa fa-info-circle"></i> Produk Anda sedang dalam pengiriman oleh kurir!</div>
							<?php elseif ($detail['status_pembelian']=="Selesai"): ?>
								<div class="alert alert-success"><i class="fa fa-info-circle"></i> Produk telah diterima, terima kasih telah order di toko kami!</div>
								<?php elseif ($detail['status_pembelian']=="Pembayaran Ditolak"): ?>
									<div class="alert alert-danger"><i class="fa fa-info-circle"></i> Pembayaran ditolak dengan alasan : <?= $detail['alasan_ditolak'] ?></div>
									<h5 class="alert alert-info text-center"> Jumlah tagihan yang harus Anda bayar sebesar Rp. <?= number_format($detail['total_pembelian']) ?></h5>

									<p style="background-color: #F8F8F8; padding-bottom: 10px; padding-top: 10px;"><img width="25" class="tip" src="img/tip.png" alt=""> Silahkan lakukan pembayaran sesuai dengan total pembelian Anda!</p>
									<p>Pastikan bukti pembayaran menampilkan:</p>
									<div class="row">
										<div class="col-md-6">
											<p><i class="fa fa-circle" style="color: #4BC34B;"></i> <strong>Tanggal/Waktu Transfer</strong> <br>&nbsp;&nbsp;&nbsp;&nbsp; contoh: tgl. 04/06/19 / jam 07:24:06</p>
											<p><i class="fa fa-circle" style="color: #4BC34B;"></i> <strong>Status Berhasil</strong> <br>&nbsp;&nbsp;&nbsp;&nbsp; contoh: Transfer BERHASIL, Transaksi Sukses</p>
										</div>
										<div class="col-md-6">
											<p><i class="fa fa-circle" style="color: #4BC34B;"></i> <strong>Detail Penerima</strong> <br>&nbsp;&nbsp;&nbsp;&nbsp; contoh: Transfer ke Rekening Luciffer Inc</p>
											<p><i class="fa fa-circle" style="color: #4BC34B;"></i> <strong>Status Berhasil</strong> <br>&nbsp;&nbsp;&nbsp;&nbsp; contoh: Rp 123.456,00</p>
										</div>
									</div>
									<center> <img width="40" src="img/bar.png" alt=""><br>
										<p>Format gambar: .JPG, .JPEG, .PNG</p>
									</center>
									<form action="" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label for="">Bukti Pembayaran</label>
											<input type="file" name="bukti" class="form-control">
										</div>
										<div class="text-center">
											<a href="member.php?halaman=pembelian" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
											<button class="btn btn-success" name="unggah2" style="background:#4BC34B; border-color: #4BC34B;"><i class="fa fa-upload"></i> Unggah</button>
										</div>
									</form>
									<?php  
									if (isset($_POST['unggah2'])) {
										$pembelian->unggahbukti2($_FILES['bukti'],$id_pengiriman);
										echo "<script>alert('Bukti pembayaran berhasil di unggah');</script>";
										echo "<script>location='member.php?halaman=pembelian';</script>";
									}
									?>
									<hr>
									<?php elseif ($detail['status_pembelian']=="Menunggu Konfirmasi Ulang"): ?>
										<div class="alert alert-info"><i class="fa fa-info-circle"></i> Pembayaran anda sedang menunggu konfirmasi, mohon menunggu paling lambat 1 x 24 jam.</div>
									<?php endif ?>
									<div class="row">
										<?php foreach ($cek as $key => $value): ?>
											<div class="col-md-8">
												<table class="table table-striped">
													<tr>
														<th>ID Transaksi</th>
														<td>:</td>
														<td>#<?= $detail['id_pengiriman'] ?></td>
													</tr>
													<tr>
														<th>Tgl. Transaksi</th>
														<td>:</td>
														<td><?= format_hari_tanggal($detail['tanggal_pembelian']) ?></td>
													</tr>
													<tr>
														<th>Total Belanja</th>
														<td>:</td>
														<td>Rp. <?= number_format($detail['total_belanja']) ?></td>
													</tr>
													<tr>
														<th>Total Ongkir</th>
														<td>:</td>
														<td>Rp. <?= number_format($detail['total_ongkir']) ?></td>
													</tr>
													<tr>
														<th>Total Tagihan</th>
														<td>:</td>
														<td>Rp. <?= number_format($detail['total_pembelian']) ?></td>
													</tr>
													<tr>
														<th>Status</th>
														<td>:</td>
														<td><?= $detail['status_pembelian'] ?></td>
													</tr>
												</table>
											</div>
											<div class="col-md-4">
												<div class="card">
													<div class="card-body">
														<img src="media/upload-bukti/<?= $value['bukti'] ?>" alt="">
													</div>
												</div>
											</div>
										<?php endforeach ?>

									</div>
								<?php endif ?>
							</div>
						</div>