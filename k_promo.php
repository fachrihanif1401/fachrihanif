<?php 
// panggil class.php
include 'config/class.php';
$kode = $_POST['kode'];
// obyek api ongkir menjalankan fungsi update_provinsi
$row=$promo->get_promo($kode);
echo json_encode($row);
?>
