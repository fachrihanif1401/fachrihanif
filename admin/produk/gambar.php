<?php  
$id_produk = $_GET['id'];
$detail = $produk->detail($id_produk);
$data = $produk->gambarproduk($id_produk);
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Gambar Produk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Produk</a></li>
                            <li class="breadcrumb-item"><a href="#!">Gambar Produk</a></li>
                            <li class="breadcrumb-item"><a href="#!"><?= $detail['nama_produk'] ?></a></li>
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
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nama Produk</label>
                                    <input type="text" name="nama produk" class="form-control" placeholder="Nama produk" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Gambar Produk</label>
                                    <input type="file" name="gambar_produk" class="form-control" required="">
                                </div>
                            </div>
                            <button name="unggah" class="btn btn-primary"><i class="feather icon-upload"></i> Unggah</button>
                            <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
                        </form>
                        <?php  
                        if (isset($_POST['unggah'])) 
                        {
                            $produk->unggahgambar($_POST['nama produk'],$_FILES['gambar_produk'],$id_produk);
                            echo "<script>alert('Gambar produk berhasil diunggah!');</script>";
                            echo "<script>location='index.php?halaman=gambarproduk&id=$id_produk';</script>";
                        }
                        ?>
                        <hr>

                        <table id="example" class="table table-striped table-bordered">
                           <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Produk</th>
                                <th>Gambar</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                            <td width="5%">1</td>
                            <td width="15%"><?= $detail['nama_produk'] ?></td>
                            <td width="30%">
                                <img width="100" src="../media/upload-produk/<?= $detail['gambar_produk'] ?>" alt="">
                            </td>
                            <td width="10%">
                                <a href="#" class="btn btn-danger btn-sm disabled" onclick="return confirm('Apakah anda yakin?')"><i class="feather icon-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php foreach ($data as $key => $value): ?>
                         <?php  
                         $key = 1;
                         ?>
                         <tr>
                            <td width="5%"><?= $key+1 ?></td>
                            <td width="15%"><?= $value['nama produk'] ?></td>
                            <td width="30%">
                                <img width="100" src="../media/upload-gambar/<?= $value['gambar'] ?>" alt="">
                            </td>
                            <td width="10%">
                                <a href="index.php?halaman=hapusgambar&id=<?= $value['id_produk'] ?>&id_gambar=<?= $value['id_gambar'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')"><i class="feather icon-trash"></i> Hapus</a>
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