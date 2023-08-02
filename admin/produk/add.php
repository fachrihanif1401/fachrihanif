<?php  
$kategori = $kategori->show();
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tambah Produk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Produk</a></li>
                            <li class="breadcrumb-item"><a href="#!">Tambah Produk</a></li>
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
                                            <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nama produk</label>
                                    <input type="text" name="nama_produk" class="form-control" placeholder="Nama produk" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Harga produk</label>
                                    <input type="number" name="harga_produk" class="form-control" placeholder="Harga produk" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Berat produk</label>
                                    <input type="text" name="berat_produk" class="form-control" placeholder="Berat produk" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Gambar produk</label>
                                    <input type="file" name="gambar_produk" class="form-control" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Stok produk</label>
                                    <input type="text" name="stok" class="form-control" placeholder="Stok produk" required="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Deskripsi produk</label>
                                    <textarea name="deskripsi_produk"  id="editor1" class="form-control" placeholder="Deskripsi Produk" required=""></textarea>
                                </div>
                                <hr>

                            </div>
                            <button name="simpan" class="btn btn-primary"><i class="feather icon-info"></i> Simpan</button>
                            <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Refresh</button>
                        </form>
                        <?php  
                        if (isset($_POST['simpan'])) 
                        {
                            $hasil = $produk->add($_POST['id_kategori'],$_POST['nama_produk'],$_POST['harga_produk'],$_POST['berat_produk'],$_FILES['gambar_produk'],$_POST['stok'],$_POST['deskripsi_produk']);
                            if ($hasil=="sukses") 
                            {
                                echo "<script>alert('Produk berhasil ditambahkan!');</script>";
                                echo "<script>location='index.php?halaman=produk';</script>";
                            }
                            else
                            {
                                echo "<script>alert('Produk gagal ditambahkan, produk sudah terdaftar pada sistem!');</script>";
                                echo "<script>location='index.php?halaman=tambahproduk';</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>