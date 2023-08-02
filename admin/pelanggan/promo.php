<?php  
$id_pelanggan = $_GET['id'];
$pelanggan->kirimpromo($id_pelanggan);
echo "<script>alert('Data pelanggan berhasil dihapus!!');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";
?>