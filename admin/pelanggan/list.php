<?php  
$data = $pelanggan->show();
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Pelanggan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Pelanggan</a></li>
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Foto</th>
                                <th>Alamat</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value): ?>
                                <tr>
                                    <td width="5%"><?= $key+1 ?></td>
                                    <td><?= $value['nama_pelanggan'] ?></td>
                                    <td><?= $value['email_pelanggan'] ?></td>
                                    <td><?= $value['telepon_pelanggan'] ?></td>
                                    <td>
                                        <?php if (empty($value['foto_pelanggan'])): ?>
                                            <img width="80" class="img-thumbnail" src="../media/upload-pelanggan/no-img.jpg" alt="">
                                        <?php else: ?>
                                            <img width="80" class="img-thumbnail" src="../media/upload-pelanggan/<?= $value['foto_pelanggan'] ?>" alt="">
                                        <?php endif ?>
                                    </td>
                                    <td><?= $value['alamat_pelanggan'] ?></td>
                                    <td width="7%">
                                        <a href="index.php?halaman=hapuspelanggan&id=<?= $value['id_pelanggan'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="feather icon-trash"></i> Hapus</a>
                                      
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