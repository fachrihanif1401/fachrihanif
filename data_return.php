<?php
include 'config/class.php';  
$id = $_GET['id'];
$data  = $pembelian->detail_pembelian($id);
echo json_encode($data);
?>