<?php  
include 'config/class.php';
if (isset($_SESSION['pelanggan'])) 
{
	unset($_SESSION['pelanggan']);
}
echo "<script>location='login';</script>";
?>