<?php  
$id_produk = $_GET['id'];
$detail = $produk->detail($id_produk);
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Detail Produk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Produk</a></li>
                            <li class="breadcrumb-item"><a href="#!">Detail Produk</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php?halaman=produk" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <img width="270" class="img-thumbnail" src="../media/upload-produk/<?= $detail['gambar_produk'] ?>" alt="">
                            </div>
                            <div class="col-md-8">
                                <table class="table table-striped table-responsive">
                                    <tr>
                                        <th>Kategori</th>
                                        <th>:</th>
                                        <td><?= $detail['nama_kategori'] ?></td>
                                    </tr>
                                     <tr>
                                        <th>Nama Produk</th>
                                        <th>:</th>
                                        <td><?= $detail['nama_produk'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Harga Produk</th>
                                        <th>:</th>
                                        <td><?= $detail['harga_produk'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Berat Produk</th>
                                        <th>:</th>
                                        <td><?= $detail['berat_produk'] ?>gr</td>
                                    </tr>
                                    <tr>
                                        <th>Stok</th>
                                        <th>:</th>
                                        <td><?= $detail['stok'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Terjual</th>
                                        <th>:</th>
                                        <td><?= $detail['terjual'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <th>:</th>
                                        <td><?= $detail['deskripsi_produk'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>