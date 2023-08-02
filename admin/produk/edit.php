<?php  
$id_produk = $_GET['id'];
$detail = $produk->detail($id_produk);
$kategori = $kategori->show();
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Ubah Produk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Produk</a></li>
                            <li class="breadcrumb-item"><a href="#!">Ubah Produk</a></li>
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
                                    <label for="">Kategori</label>
                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                        <option value="">- Pilih Kategori -</option>
                                        <?php foreach ($kategori as $key => $value): ?>
                                            <option value="<?= $value['id_kategori'] ?>" <?php if ($detail['id_kategori']==$value['id_kategori']) {echo "selected";} ?>><?= $value['nama_kategori'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nama produk</label>
                                    <input type="text" name="nama_produk" value="<?= $detail['nama_produk'] ?>" class="form-control" placeholder="Nama produk" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Harga produk</label>
                                    <input type="number" name="harga_produk" value="<?= $detail['harga_produk'] ?>" class="form-control" placeholder="Harga produk" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Berat produk (gr)</label>
                                    <input type="number" name="berat_produk" value="<?= $detail['berat_produk'] ?>" class="form-control" placeholder="Berat produk" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img width="100" src="../media/upload-produk/<?= $detail['gambar_produk'] ?>" alt="">
                                        </div>
                                        <div class="col-md-9">
                                          <label for="">Gambar produk</label>
                                          <input type="file" name="gambar_produk" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="">Stok</label>
                                <input type="number" name="stok" value="<?= $detail['stok'] ?>" class="form-control" placeholder="Berat produk" required="">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Deskripsi produk</label>
                                <textarea name="deskripsi_produk"  id="editor1" class="form-control" placeholder="Deskripsi Produk" required=""><?= $detail['deskripsi_produk'] ?></textarea>
                            </div>
                            <hr>

                        </div>
                        <button name="ubah" class="btn btn-primary"><i class="feather icon-edit"></i> Ubah</button>
                    </form>
                    <?php  
                    if (isset($_POST['ubah'])) 
                    {
                        $produk->edit($_POST['id_kategori'],$_POST['nama_produk'],$_POST['harga_produk'],$_POST['berat_produk'],$_FILES['gambar_produk'],$_POST['stok'],$_POST['deskripsi_produk'],$id_produk);
                        echo "<script>alert('Produk berhasil diubah!');</script>";
                        echo "<script>location='index.php?halaman=produk';</script>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>