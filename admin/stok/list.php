<?php  
$data = $stok->show();
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Stok Produk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Produk</a></li>
                            <li class="breadcrumb-item"><a href="#!">Stok Produk</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered">
                           <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Produk</th>
                                <th>Gambar Produk</th>
                                <th>Stok Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value): ?>
                                <tr>
                                    <td width="5%"><?= $key+1 ?></td>
                                    <td><?= $value['nama_produk'] ?></td>
                                    <td width="10%">
                                        <img width="100" class="img-thumbnail" src="../media/upload-produk/<?= $value['gambar_produk'] ?>" alt="">
                                    </td>
                                    <td>
                                        <?php if (empty($value['jumlah'])): ?>
                                            -
                                            <?php else: ?>
                                                <?= $value['jumlah'] ?>                                            
                                            <?php endif ?>
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