<?php  
$id_promo = $_GET['id'];
$promo->delete($id_promo);
echo "<script>alert('Promo berhasil dihapus!');</script>";
echo "<script>location='index.php?halaman=promo';</script>";
?>