<?php  
include 'config/class.php';
include 'config/fungsi.php';

$id_kategori = $_GET['id'];
$page = (isset($_GET['page']))? $_GET['page'] : 1;
$batas=8;
if (isset($_GET["page"]) AND !empty($_GET["page"])) 
{
	$posisi = ($_GET["page"]-1)*8;
}
else
{
	$posisi = 0;
	$_GET["page"]= 1;
}
$dataproduk=$produk->produkkategori($id_kategori,$posisi,$batas);
$datakategoriproduk = $kategori->detail($id_kategori);
$nama_kategori=$datakategoriproduk['nama_kategori'];
$kategori = $kategori->show();
$pinstansi = $instansi->detail();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Produk Kategori | <?= $pinstansi['nama_instansi'] ?></title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="media/upload-instansi/<?= $pinstansi['logo_instansi'] ?>" rel="shortcut icon"/>
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

	<div id="preloder">
		<div class="loader"></div>
	</div>

	<?php include 'header.php'; ?>

	<div class="page-top-info">
		<div class="container">
			<h4><?= $nama_kategori ?></h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Produk</a> /
				<a href="">Kategori</a> /
				<a href=""><?= $nama_kategori ?></a>
			</div>
		</div>
	</div>

	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Kategori</h2>
						<ul class="category-menu">
							<?php foreach ($kategori as $key => $value): ?>
								<li><a href="produk-kategori?id=<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></a></li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						<?php if (empty($dataproduk)): ?>
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<center>
											<img width="120" src="img/online-shop.png" alt=""><br><br>
											<p>Mohon maaf, produk dengan kategori <strong>"<?= $nama_kategori ?>"</strong> belum tersedia.</p>
										</center>
									</div>
								</div>
							</div>
							<?php else: ?>
								<?php foreach ($dataproduk as $key => $value): ?>
									<div class="col-lg-4 col-sm-6">
										<div class="product-item">
											<div class="pi-pic" style="border: 2px solid #F0F0F0;">
												<a href="detail-produk.php?id=<?= $value['id_produk'] ?>">
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
									if (($key+1)%3==0) {
										echo "<div class='clearfix'></div>";
									}
									?>
								<?php endforeach ?>
							<?php endif ?>



							<div class="text-center w-100 pt-3">
								<?php if (empty($dataproduk)): ?>
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
                	<li><a href="./?page=1">First</a></li>
                	<li><a href="./?page=<?php echo $link_prev; ?>"><i class="fa fa-angle-double-left"></i></a></li>
                	<?php
                }
                ?>
                <?php 
                $id_kategori = $_GET['id'];
                $banyakproduk=$produk->semuaproduk($id_kategori);
                $banyakpage=ceil($banyakproduk/$batas);
						 $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                $end_number = ($page < ($banyakpage - $jumlah_number))? $page + $jumlah_number : $banyakpage;
                for($i = $start_number; $i <= $end_number; $i++){
                	$link_active = ($page == $i)? ' class="active"' : '';
                	?>
                	<li<?php echo $link_active; ?>><a href="produk-kategori?id=<?= $id_kategori; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                	<li><a href="produk-kategori?id=<?= $id_kategori; ?>&page=<?php echo $link_next; ?>"><i class="fa fa-angle-double-right"></i></a></li>
                	<li><a href="produk-kategori?id=<?= $id_kategori; ?>&page=<?php echo $banyakpage; ?>">Last</a></li>
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
