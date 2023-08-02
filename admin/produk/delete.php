<?php  
$id_produk = $_GET['id'];
$produk->delete($id_produk);
echo "<script>alert('Produk berhasil dihapus!');</script>";
echo "<script>location='index.php?halaman=produk';</script>";
?>
