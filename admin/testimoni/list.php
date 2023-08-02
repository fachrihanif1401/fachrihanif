<?php  
$data = $testimoni->show();
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Testimoni</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Testimoni</a></li>
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
                                <th>Nama Pelanggan</th>
                                <th>Ulasan</th>
                                <th>Gambar Ulasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value): ?>
                                <tr>
                                    <td width="5%"><?= $key+1 ?></td>
                                    <td><?= $value['nama_pelanggan'] ?></td>
                                    <td width="50%"><?= $value['testimoni'] ?></td>
                                    <td>
                                        <?php if (empty($value['gambar'])): ?>
                                            <img width="80" src="../media/upload-pelanggan/no-img.jpg" alt="">
                                        <?php else: ?>
                                            <img width="80" src="../testimoni/<?= $value['gambar'] ?>" alt="">

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