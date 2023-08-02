<?php  
$id_kategori = $_GET['id'];
$kategori->delete($id_kategori);
echo "<script>alert('Kategori berhasil dihapus!');</script>";
echo "<script>location='index.php?halaman=kategori';</script>";
?>