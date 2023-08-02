<?php  
include 'config/class.php';
// obyek apiongkir menjalankan fungsi update(ongkir)
$dataongkir=$apiongkir->update_ongkir(294,$_POST["id_kota"],$_POST["total_berat"],$_POST["ekspedisi"]);
// 419 diasumsikan pengiriman dari sleman
?>
<pre><?php print_r($dataongkir); ?></pre>
<option value="">- Pilih Jenis -</option>
<?php foreach ($dataongkir as $key => $value): ?>
	<option value=""
	nama="<?php echo $value['service']; ?>"
	biaya="<?php echo $value['cost']['0']['value']; ?>"
	lama="<?php echo $value['cost']['0']['etd']; ?>">

	<?php echo $value['service']; ?>
	Rp. <?php echo number_format($value['cost']['0']['value']); ?>
	<?php echo $value['cost']['0']['etd']; ?>
</option>
<?php endforeach ?>