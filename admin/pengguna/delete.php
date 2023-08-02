<?php  
$id_user = $_GET['id'];
$user->delete($id_user);
echo "<script>alert('Data Pengguna berhasil dihapus!');</script>";
echo "<script>location='index.php?halaman=pengguna';</script>";
?>