<?php  
$id_supplier = $_GET['id'];
$supplier->delete($id_supplier);
echo "<script>alert('Data supplier berhasil dihapus!!');</script>";
echo "<script>location='index.php?halaman=supplier';</script>";
?>