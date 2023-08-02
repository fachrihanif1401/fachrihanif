<?php  
$totpelanggan = $pelanggan->totpelanggan();
$totpembelian = $pembelian->totpembelian();
$totuser = $user->totuser();
$totproduk = $produk->show();
$gpenjualan = $testimoni->penjualan();

$totterjual = 0;
foreach ($totproduk as $key => $value) 
{
    $totterjual += $value['terjual'];
}


$produk = $produk->show();
?>

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <!-- <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- order-card start -->
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-body">
                        <h6 class="text-white">Pesanan Diterima</h6>
                        <h2 class="text-right text-white"><i class="feather icon-shopping-cart float-left"></i><span><?= $totpembelian ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-body">
                        <h6 class="text-white">Total Penjualan</h6>
                        <h2 class="text-right text-white"><i class="feather icon-tag float-left"></i><span><?= $totterjual ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-body">
                        <h6 class="text-white">Pelanggan Bergabung</h6>
                        <h2 class="text-right text-white"><i class="feather icon-user float-left"></i><span><?= $totpelanggan ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-red order-card">
                    <div class="card-body">
                        <h6 class="text-white">Pengguna</h6>
                        <h2 class="text-right text-white"><i class="feather icon-users float-left"></i><span><?= $totuser ?></span></h2>     
                    </div>
                </div>
            </div>
            <!-- order-card end -->
            <!-- users visite start -->
            <div class="col-md-12 col-xl-12s">
                <div class="card">
                    <div class="card-header">
                        <h5>Selamat Datang <?= $data_user['nama'] ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-12s">
                <div class="card">
                    <div class="card-header">
                       <table class="table table-bordered" id="example" width="100%">  
                        <thead>
                        <tr>  
                          <th>No.</th>
                          <th>Gambar</th>
                          <th>Judul</th>
                          <th>Stok</th>
                        </tr> 
                        </thead>
                        <tbody> 
                        <?php foreach ($produk as $key => $value): ?>
  <tr>  
      <td width="5%"><?= $key+1 ?></td>
      <td width="10%"><img width="100" src="../media/upload-produk/<?= $value['gambar_produk'] ?>"></td>
      <td><?= $value['nama_produk'] ?></td>
      <td width="10%"><?= $value['stok'] ?></td>
  </tr>
                        <?php endforeach ?>
                        </tbody>
                       </table>
                    </div>
                </div>
            </div>

      <!-- users visite end -->


      <!-- social statustic start -->



      <!-- social statustic end -->
      <!-- account-section start -->

      <!-- account-section end -->
      <!-- Customer overview start -->

      <!-- Customer overview end -->
  </div>
  <!-- [ Main Content ] end -->
</div>
</div>

