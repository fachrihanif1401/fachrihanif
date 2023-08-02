<?php  
$data = $produk->show();
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Produk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Produk</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php?halaman=tambahproduk" class="btn btn-primary"><i class="feather icon-plus"></i> Tambah</a>
                        <hr>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                               <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value): ?>
                                    <tr>
                                        <td width="5%"><?= $key+1 ?></td>
                                        <td width="10%"><?= $value['nama_kategori'] ?></td>
                                        <td width="30%"><?= $value['nama_produk'] ?></td>
                                        <td width="10%">
                                            <img width="70" class="img-thumbnail" src="../media/upload-produk/<?= $value['gambar_produk'] ?>" alt="">
                                        </td>
                                        <td width="20%">
                                            <a href="index.php?halaman=gambarproduk&id=<?= $value['id_produk'] ?>" class="btn btn-info btn-sm"><i class="feather icon-image"></i> Gambar</a>
                                            <a href="index.php?halaman=detailproduk&id=<?= $value['id_produk'] ?>" class="btn btn-success btn-sm"><i class="feather icon-image"></i> Detail</a>
                                            <a href="index.php?halaman=ubahproduk&id=<?= $value['id_produk'] ?>" class="btn btn-warning btn-sm"><i class="feather icon-edit"></i> Ubah</a>
                                            <a href="index.php?halaman=hapusproduk&id=<?= $value['id_produk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')"><i class="feather icon-trash"></i> Hapus</a>
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
</div>
</section>