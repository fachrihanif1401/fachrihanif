<?php  
if (isset($_SESSION['user'])) 
{
	unset($_SESSION['user']);
}
echo "<script>alert('Logout berhasil!')</script>";
echo "<script>location='login';</script>";
?>