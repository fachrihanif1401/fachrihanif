<?php  
$produk = $produk->show();
$data = $pengadaan->show();
$kode = $pengadaan->kode();
$tampil_keranjang = $pengadaan->tampil_keranjang();
$supplier = $supplier->show();
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
                       <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#transaksiModal" data-whatever="@mdo"><i class="feather icon-plus"></i> Tambah</button>
                       <br><br>
                       <form method="post">
                        <div class="row">
                            
                           
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="date" class="form-control" name="tgl_masuk" value="<?= date('Y-m-d') ?>" required="">
                            </div>
                        </div>
                    </div>

                    <hr>
                    <table id="example" class="table table-striped table-bordered">
                     <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php $total=0 ?>
                     <?php $totalbelanja=0 ?>
                     <?php foreach ($tampil_keranjang as $key => $value): ?>
                        <?php 
                        $jumlah         = $value['transaksi']['jumlah']; 
                        $harga_beli     = $value['transaksi']['harga_beli']; 
                        $total          = $value['harga_produk']*$jumlah;
                        $totalbelanja   += $total;
                        ?>
                        <tr>
                            <td width="5%"><?= $key+1 ?></td>
                            <td width="15%"><?= $value['nama_kategori'] ?></td>
                            <td width="30%"><?= $value['nama_produk'] ?></td>
                            <td width="30%"><?= $value['transaksi']['jumlah'] ?></td>
                            <td width="">Rp. <?= number_format($value['harga_produk']) ?></td>
                            <td width="">Rp. <?= number_format($total) ?></td>
                            <td width="20%">
                                <a href="index.php?halaman=hapuskeranjang&id=<?= $value['id_produk'] ?>" class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <hr>
            <h5 style="float: right;">Total Belanja : <u>Rp. <?php echo number_format($totalbelanja) ?></u> </h5>
            <button name="simpann" class="btn btn-success" style="float: left; margin-right: 5px;"><i class="fa fa-shopping-cart"> Simpan</i></button>
            <a href="index.php?halaman=bataltransaksi" class="btn btn-danger" style="float: left;"><i class="fa fa-ban"> Batal</i></a>
            <br><br>
            <input type="hidden" name="total_belanja" value="<?php echo $totalbelanja ?>" >
        </form>
        <?php  
        if (isset($_POST['simpann'])) {
            $penjualan->transaksi_masuk($_POST['tgl_masuk'],$_POST['total_belanja']);
            echo "<script>alert('Transaksi Berhasil');</script>";
            echo "<script>location='index.php?halaman=penjualan';</script>";
        }
        ?>
    </div>
</div>
</div>
</div>
</div>
</section>
<div class="modal fade" id="transaksiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="">Produk</label>
                        <select name="id_produk" id="id_produk" class="form-control">
                            <option value="">- Pilih Produk -</option>
                            <?php foreach ($produk as $key => $value): ?>
                                <option value="<?= $value['id_produk'] ?>"><?= $value['nama_produk'] ?> - <?= $value['harga_produk'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="jumlah" required="">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="harga_beli" value="0" class="form-control" placeholder="Harga Beli" required>
                    </div>
                    <hr>
                    <button name="masukankeranjang" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
                </form>
                <?php  
                if (isset($_POST['masukankeranjang'])) 
                {
                    $penjualan->keranjangmasuk($_POST['id_produk'],$_POST['jumlah'],$_POST['harga_beli']);
                    echo "<script>alert('produk berhasil ditambahkan!')</script>";
                    echo "<script>location='index.php?halaman=transaksi_penjualan';</script>";
                }
                ?>
            </div>
        </div>
    </div>
</div>