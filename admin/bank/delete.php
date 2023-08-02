<?php  
$id_bank = $_GET['id'];
$bank->delete($id_bank);
echo "<script>alert('Bank berhasil dihapus!');</script>";
echo "<script>location='index.php?halaman=bank';</script>";
?>