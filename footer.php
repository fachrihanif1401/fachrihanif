<?php  
	$logi = $instansi->logo();
	$finstansi = $instansi->detail();
?>

<section class="footer-section">
	<div class="container">
		<div class="footer-logo text-center">
			<a href="./"><img width="200" src="media/upload-instansi/<?= $logi['gambar'] ?>" alt=""></a>
		</div>

	</div>
	<div class="social-links-warp">
		<div class="container">
			

			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
			<p class=" text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <?= $finstansi['nama_instansi'] ?></p>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

		</div>
	</div>
</section>