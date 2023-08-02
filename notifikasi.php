<?php  
$datapembelian = $pembelian->tampil_pembelian_pelanggan($id_pelanggan);
$sql = "UPDATE tbl_notifikasi SET status='1' WHERE status='0' AND id_pelanggan='$id_pelanggan'";
$r = mysqli_query($mysqli, $sql);
?>
<div class="card">
	<div class="card-body">
		<h3 class="text-center"> Notifikasi</h3>
		<hr>
		<?php if (empty($datapembelian)): ?>
			<div class="tidakadapembelian">
				<center>
					<img width="150" src="img/tidakada.png" alt=""><br>
					<p><strong>Tidak ada notifikasi</strong></p>
				</center>
			</div>
			<?php else: ?>
				<?php foreach ($datapembelian as $key => $value): ?>
					<?php if ($value['status_pembelian']=="Belum Bayar"): ?>
						<?php  
						$tanggal = date('Y-m-d', strtotime($value['tanggal_pembelian']));
						?>
						<div class="card">
							<div class="card-body">
								<p><strong>Pembelian Dibuat</strong> - Tanggal Transaksi : <strong><?= tanggal_indo($tanggal, true); ?></strong></p>
								<p>Pembelian <strong>#<?= $value['id_pengiriman'] ?>PB</strong>, Untuk menyelesaikan pembelian Anda, silahkan melakukan pembayaran sebesar <b>Rp. <?= number_format($value['total_pembelian'])?>, jika sudah silahkan lakukan konfirmasi pembayaran untuk mempercepat proses verifikasi!</b></p>
								<a href="carapembayaran.php?id=<?= $value['id_pengiriman']; ?>" class="btn btn-success btn-xs" style="background: #54d44e; border-color: #54d44e; color: #fff;" > Cara Pembayaran</a>
							</div>
						</div>
						<br>
						<?php elseif ($value['status_pembelian']=="Menunggu Konfirmasi"): ?>
							<?php  
							$tanggal = date('Y-m-d', strtotime($value['tanggal_pembelian']));
							$id_pengiriman = $value['id_pengiriman'];
							$detailpembelian = $pembelian->detail($id_pengiriman);
							?>
							<div class="card">
								<div class="card-body">
									<p><strong>Pembelian Menunggu Konfirmasi</strong> - Tanggal Transaksi : <strong><?= tanggal_indo($tanggal, true); ?></strong></p>
									<p>Terima kasih telah melakukan pembayaran sebesar <strong>Rp. <?= number_format($detailpembelian['total_pembelian']) ?></strong>, Mohon menunggu pembanyaran Anda akan kami konfirmasi paling lambat <strong>1x24 jam</strong>.</p>
								</div>
							</div>
							<br>
							<?php elseif ($value['status_pembelian']=="Dikemas"): ?>
								<?php  
								$tanggal = date('Y-m-d', strtotime($value['tanggal_pembelian']));
								$id_pembelian = $value['id_pengiriman'];
								$detailpembelian = $pembelian->detail($id_pembelian);
								?>
								<div class="card">
									<div class="card-body">
										<p><strong>Pembelian Dikemas</strong> - Tanggal Transaksi : <strong><?= tanggal_indo($tanggal, true); ?></strong></p>
										<p>Pembayaran telah kami terima, selanjutnya mohon menunggu barang Anda sedang dalam proses pengemasan, kami akan memberitakukan jika barang telah dikirimkan!</p>
									</div>
								</div>
								<br>
								<?php elseif ($value['status_pembelian']=="Dikirim"): ?>
									<?php  
									$tanggal = date('Y-m-d', strtotime($value['tanggal_pembelian']));
									$id_pembelian = $value['id_pengiriman'];
									$detailpembelian = $pembelian->detail($id_pembelian);
									?>
									<div class="card">
										<div class="card-body">
											<p><strong>Pembelian Dikirim</strong> - Tanggal Transaksi : <strong><?= tanggal_indo($tanggal, true); ?></strong></p>
											<p>Pembelian Anda telah kami kirim dengan nomor resi <strong><?= $detailpembelian['resi_pengiriman'] ?></strong>, mohon konfirmasi pembelian diterima jika barang Anda telah sampai, Terima kasih!</p>
										</div>
									</div>
									<br>
									<?php elseif ($value['status_pembelian']=="Selesai"): ?>
										<?php  
										$tanggal = date('Y-m-d', strtotime($value['tanggal_pembelian']));
										$id_pembelian = $value['id_pengiriman'];
										$detailpembelian = $pembelian->detail($id_pembelian);
										?>
										<div class="card">
											<div class="card-body">
												<p><strong>Pembelian Selesai</strong> - Tanggal Transaksi : <strong><?= tanggal_indo($tanggal, true); ?></strong></p>
												<p>Pembelian Anda selesai, terima kasih telah melakukan pembelian di toko kami, ditunggu pembelian selanjutnya :)</p>
											</div>
										</div>
										<br>
										<?php elseif ($value['status_pembelian']=="Pembayaran Ditolak"): ?>
											<?php  
											$tanggal = date('Y-m-d', strtotime($value['tanggal_pembelian']));
											$id_pembelian = $value['id_pengiriman'];
											$detailpembelian = $pembelian->detail($id_pembelian);
											?>
											<div class="card">
												<div class="card-body">
													<p><strong>Pembayaran ditolak</strong> - Tanggal Transaksi : <strong><?= tanggal_indo($tanggal, true); ?></strong></p>
													<p>Pembayaran ditolak dengan alasan : <strong><?= $detailpembelian['alasan_ditolak'] ?></strong>, Jumlah tagihan yang harus Anda bayar sebesar <strong>Rp. <?= number_format($detailpembelian['total_pembelian']) ?></strong>!</p>
												</div>
											</div>
											<br>
											<?php elseif ($value['status_pembelian']=="Menunggu Konfirmasi Ulang"): ?>
												<?php  
												$tanggal = date('Y-m-d', strtotime($value['tanggal_pembelian']));
												$id_pembelian = $value['id_pengiriman'];
												$detailpembelian = $pembelian->detail($id_pembelian);
												?>
												<div class="card">
													<div class="card-body">
														<p><strong>Pembelian Menunggu Konfirmasi</strong> - Tanggal Transaksi : <strong><?= tanggal_indo($tanggal, true); ?></strong></p>
														<p>Terima kasih telah melakukan pembayaran sebesar <strong>Rp. <?= number_format($detailpembelian['total_pembelian']) ?></strong>, Mohon menunggu pembanyaran Anda akan kami konfirmasi paling lambat <strong>1x24 jam</strong>.</p>
													</div>
												</div>
												<br>
												<?php elseif ($value['status_pembelian']=="Return Barang"): ?>
												<?php  
												$tanggal = date('Y-m-d', strtotime($value['tanggal_pembelian']));
												$id_pembelian = $value['id_pengiriman'];
												$detailpembelian = $pembelian->detail($id_pembelian);
												?>
												<div class="card">
													<div class="card-body">
														<p><strong>Pembelian Return Barang</strong> - Tanggal Transaksi : <strong><?= tanggal_indo($tanggal, true); ?></strong></p>
														<p>Saat ini status barang Anda sedang menunggu konfirmasi untuk <b>return barang</b>, Mohon menunggu, permohonan Anda akan kami konfirmasi paling lambat <strong>1x24 jam</strong>.</p>
													</div>
												</div>
												<br>
												<?php elseif ($value['status_pembelian']=="Barang return ditolak"): ?>
												<?php  
												$tanggal = date('Y-m-d', strtotime($value['tanggal_pembelian']));
												$id_pembelian = $value['id_pengiriman'];
												$detailpembelian = $pembelian->detail($id_pembelian);
												?>
												<div class="card">
													<div class="card-body">
														<p><strong>Pembelian Return Barang Ditolak</strong> - Tanggal Transaksi : <strong><?= tanggal_indo($tanggal, true); ?></strong></p>
													
														<p>Terima Kasih telah bersedia menunggu. Namun mohon maaf permohonan Anda kami tolak, karena tidak memenuhi kebijakan syarat & ketentuan pengembalian barang & dana.</p>
													</div>
												</div>
												<br>
												<?php elseif ($value['status_pembelian']=="Barang return disetujui"): ?>
												<?php  
												$tanggal = date('Y-m-d', strtotime($value['tanggal_pembelian']));
												$id_pembelian = $value['id_pengiriman'];
												$detailpembelian = $pembelian->detail($id_pembelian);
												?>
												<div class="card">
													<div class="card-body">
														<p><strong>Pembelian Return Barang Disetujui</strong> - Tanggal Transaksi : <strong><?= tanggal_indo($tanggal, true); ?></strong></p>
															<p>Terima Kasih telah bersedia menunggu, proses permintaan return barang Anda berhasil disetujui dan akan kami proses sesuai dengan ketentuan yang berlaku.</p>
													</div>
												</div>
												<br>
											<?php endif ?>
										<?php endforeach ?>
									<?php endif ?>
								</div>
							</div>