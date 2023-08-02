<?php  
$id_gambar = $_GET['id_gambar'];
$id_produk = $_GET['id'];
$produk->hapusgambar($id_gambar);
echo "<script>alert('Gambar berhasil dihapus!');</script>";
echo "<script>location='index.php?halaman=gambarproduk&id=$id_produk';</script>";
?>