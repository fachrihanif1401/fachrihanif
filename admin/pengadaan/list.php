<?php  
$data = $pengadaan->show();
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Pengadaan Produk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Produk</a></li>
                            <li class="breadcrumb-item"><a href="#!">Pengadaan Produk</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php?halaman=transaksi" class="btn btn-primary"><i class="feather icon-plus"></i> Transaksi Baru</a>
                        <hr>
                        <table id="example" class="table table-striped table-bordered">
                         <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Transaksi</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal Masuk</th>
                                <th>Total Belanja</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value): ?>
                                <tr>
                                    <td width="5%"><?= $key+1 ?></td>
                                    <td width="15%"><?= $value['nomor_transaksi'] ?></td>
                                    <td width="30%"><?= $value['nama_supplier'] ?></td>
                                    <td width="30%"><?= $value['tanggal_transaksi'] ?></td>
                                    <td width="30%">Rp. <?= number_format($value['total']) ?></td>
                                    <td width="20%">
                                        <a href="index.php?halaman=detailpengadaan&id=<?= $value['id_pengadaan'] ?>" class="btn btn-success btn-sm"><i class="feather icon-eye"></i> Detail</a>
                                        <a href="pengadaan/nota.php?id=<?= $value['id_pengadaan'] ?>" class="btn btn-warning btn-sm" target='_blank'><i class="feather icon-file"></i> Nota</a>
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