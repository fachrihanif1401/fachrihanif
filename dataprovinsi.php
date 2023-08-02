<?php 
// panggil class.php
include 'config/class.php';
// obyek api ongkir menjalankan fungsi update_provinsi
$datprov=$apiongkir->update_provinsi();
?>
<option value="">Pilih Provinsi</option>
<?php foreach ($datprov as $key => $value): ?>
	<option value="<?php echo $value['province_id'] ?>" nama="<?php echo $value['province'] ?>"><?php echo $value['province'] ?></option>
<?php endforeach ?>