<?php  
$id_pengiriman = $_GET['id'];
$pembelian->terima_pembayaran($id_pengiriman);
echo "<script>alert('Pembayaran berhasil diterima, silahkan proses pembelian dengan memasukan no. resi jika barang telah dikirimkan!');</script>";
echo "<script>location='index.php?halaman=pembelian';</script>";
?>