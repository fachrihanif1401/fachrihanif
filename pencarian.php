<?php  
include 'config/class.php';
include 'config/fungsi.php';
$keyword=$_GET["keyword"];
$page = (isset($_GET['page']))? $_GET['page'] : 1;
$batas=8;
if (isset($_GET["page"]) AND !empty($_GET["page"])) 
{
	$posisi = ($_GET["page"]-1)*$batas;
}
else
{
	$posisi = 0;
	$_GET["page"]= 1;
}
$hasilcari=$produk->cariproduk($keyword,$posisi,$batas);
$totcari = count($hasilcari);
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Pencarian | Hawamini Store</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="img/favicon.ico" rel="shortcut icon"/>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>

	<!-- <div id="preloder">
		<div class="loader"></div>
	</div> -->

	<?php include 'header.php'; ?>

	<div class="page-top-info">
		<div class="container">
			<div class="site-pagination">
				<a href="">Menampilkan <?= $totcari ?> produk untuk pencarian "<?= $keyword ?>"</a>
			</div>
		</div>
	</div>
	<section class="category-section spad">
		<div class="container">
			<div class="row">

				<div class="col-lg-12  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						<?php foreach ($hasilcari as $key => $value): ?>
							<div class="col-lg-3 col-sm-6">
								<div class="product-item">
									<div class="pi-pic" style="border: 2px solid #F0F0F0;">
										<a href="">
											<img src="media/upload-produk/<?= $value['gambar_produk'] ?>" alt="">
										</a>
										<div class="pi-links">
											<a href="detail-produk.php?id=<?= $value['id_produk'] ?>" class="add-card"><i class="flaticon-visible"></i><span>DETAIL</span></a>
										</div>
									</div>
									<div class="pi-text">
										<h6>Rp. <?= number_format($value['harga_produk']) ?></h6>
										<p><?= word_limiter($value['nama_produk'], 6) ?></p>
									</div>
								</div>
							</div>
							<?php  
							$nomor=$key+1;
							if (($key+1)%8==0) {
								echo "<div class='clearfix'></div>";
							}
							?>
						<?php endforeach ?>
						
						
						<div class="text-center w-100 pt-3">
							<?php if (empty($hasilcari)): ?>

								<?php else: ?>
									<div class="store-filter clearfix">
										<ul class="store-pagination">
											<?php
                if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                	?>
                	<li><a class="disabled">First</a></li>
                	<li><a class="disabled"><i class="fa fa-angle-double-left"></i></a></li>
                	<?php
                }else{ // Jika page bukan page ke 1
                	$link_prev = ($page > 1)? $page - 1 : 1;
                	?>
                	<li><a href="pencarian?keyword=<?= $keyword; ?>&page=1">First</a></li>
                	<li><a href="pencarian?keyword=<?= $keyword; ?>&page=<?php echo $link_prev; ?>"><i class="fa fa-angle-double-left"></i></a></li>
                	<?php
                }
                ?>
                <?php 
                $keyword=$_GET["keyword"];
                $total = $produk->semuaprodukcari($keyword);
                $banyakpage=ceil($total/$batas);
                $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                $end_number = ($page < ($banyakpage - $jumlah_number))? $page + $jumlah_number : $banyakpage;
                for($i = $start_number; $i <= $end_number; $i++){
                	$link_active = ($page == $i)? ' class="active"' : '';
                	?>
                	<li<?php echo $link_active; ?>><a href="pencarian?keyword=<?= $keyword ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                	<?php
                }
                ?>
                
                <!-- LINK NEXT AND LAST -->
                <?php
                // Jika page sama dengan jumlah page, maka disable link NEXT nya
                // Artinya page tersebut adalah page terakhir 
                if($page == $banyakpage){ // Jika page terakhir
                	?>
                	<li><a class="disabled"><i class="fa fa-angle-double-right"></i></a></li>
                	<li><a class="disabled">Last</li>
                		<?php
                }else{ // Jika Bukan page terakhir
                	$link_next = ($page < $banyakpage)? $page + 1 : $banyakpage;
                	?>
                	<li><a href="pencarian?keyword=<?= $keyword; ?>&page=<?php echo $link_next; ?>"><i class="fa fa-angle-double-right"></i></a></li>
                	<li><a href="pencarian?keyword=<?= $keyword; ?>&page=<?php echo $banyakpage; ?>">Last</a></li>
                	<?php
                }
                ?>
            </ul>
        </div> 
    <?php endif ?> 
</div>
</div>
</div>
</div>
</div>
</section>	

<?php include 'footer.php'; ?>
<?php include 'whatsapp.php'; ?>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
