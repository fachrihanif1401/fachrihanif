<?php  
$dpromo = $promo->show();

?>
<div class="card">
	<div class="card-body">
		<h3 class="text-center"> Notifikasi Promo</h3>
		<hr>
		<?php if (empty($dpromo)): ?>
			<div class="tidakadapembelian">
				<center>
					<img width="150" src="img/tidakada.png" alt=""><br>
					<p><strong>Tidak ada notifikasi</strong></p>
				</center>
			</div>
		<?php else: ?>
			<?php foreach ($dpromo as $key => $value): ?>
				<div class="card">
					<div class="card-body">
						<p><strong>Promo <?= $value['diskon'] ?>%</strong> - Tanggal Transaksi : <strong><?= $value['tgl_promo']; ?></strong></p>
						<p>Promo <strong>#<?= $value['id_promo'] ?>PB</strong></p>
						<p>Kode Promo <strong>: <?= $value['kode_promo'] ?></strong></p>
						<p>Keterangan <strong>: <?= $value['keterangan'] ?></strong></p>
					
					</div>
				</div>
			<?php endforeach ?>
		<?php endif ?>
	</div>
</div>