<?php  

// mendapatkan id produk dari url
$id_produk=$_GET["id"];
// menghapus produk dari session keranjang dengan id_produk pada url
unset($_SESSION["keranjang"][$id_produk]);

echo "<script>alert('Produk telah terhapus');</script>";
echo "<script>location='index.php?halaman=transaksi';</script>";
?>