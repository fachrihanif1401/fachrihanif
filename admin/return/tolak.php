<?php  
	$id = $_GET['id'];
	$id_p = $_GET['id_p'];

	$pembelian->tolak_return($id,$id_p);
	echo "<script>alert('Return barang berhasil ditolak!');</script>";
	echo "<script>location='index.php?halaman=return';</script>";
?>