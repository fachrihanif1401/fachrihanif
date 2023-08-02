<?php  
	$id = $_GET['id'];
	$id_p = $_GET['id_p'];

	$pembelian->setujui_return($id,$id_p);
	echo "<script>alert('Return berhasil disetujui!');</script>";
	echo "<script>location='index.php?halaman=return';</script>";
?>