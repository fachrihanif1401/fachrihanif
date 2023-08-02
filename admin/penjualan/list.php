<?php  
$data = $penjualan->show();
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Penjualan Produk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Produk</a></li>
                            <li class="breadcrumb-item"><a href="#!">Penjualan Produk</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php?halaman=transaksi_penjualan" class="btn btn-primary"><i class="feather icon-plus"></i> Transaksi Baru</a>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>NO</th>
                              <th>TGL. TRANSAKSI</th>
                              <th>TOTAL</th>
                              <th>TINDAKAN</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value): ?>
                          <tr>
                            <td width="7%"><?= $key+1 ?></td>
                            
                            <td><?= $value['tanggal_pembelian'] ?></td>
                            <td>Rp. <?= number_format($value['total_pembelian']) ?></td>
                            <td width="30%">
                                <a href="index.php?halaman=detailpembelian&id=<?= $value['id_pengiriman'] ?>" class="btn btn-info btn-sm"><i class="fa fa-share-square-o"></i> Detail</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</section>