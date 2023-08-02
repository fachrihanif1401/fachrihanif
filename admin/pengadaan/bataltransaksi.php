<?php  
// menghapus produk dari session keranjang dengan id_produk pada url
unset($_SESSION["keranjang"]);

echo "<script>alert('Transaksi Telah Dibatalkan');</script>";
echo "<script>location='index.php?halaman=pengadaan';</script>";
?>