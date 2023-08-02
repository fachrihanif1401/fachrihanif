<?php  
$data = $pembelian->tampil_laba();
$penjualan = 0;
?>

<?php foreach ($data as $key => $value): ?>
    <?php  
    $penjualan += $value['total_pembelian'];
    ?>
<?php endforeach ?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Laba Rugi & Pendapatan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Keuangan & Grafik</a></li>
                            <li class="breadcrumb-item"><a href="#!">Laba Rugi & Pendapatan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php?halaman=grafik" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                        <hr>

                        <form  action="laporan/laba.php" method="get">
                            <h4>Pendapatan</h4>
                            <hr>
                            <div class="form-group">
                                <label for="">Penjualan</label>
                                <input type="text" name="penjualan" class="form-control" placeholder="Penjualan" value="<?= $penjualan ?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="">HPP (harga pokok penjualan)</label>
                                <input type="text" name="pokok" class="form-control" placeholder="Harga Pokok Penjualan" required="">
                            </div>
                            <h4>Pengeluaran</h4>
                            <hr>
                            <div class="form-group">
                                <label for="">Gaji Pegawai</label>
                                <input type="text" name="gaji" class="form-control" placeholder="Gaji Pegawai" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Listrik</label>
                                <input type="text" name="listrik" class="form-control" placeholder="Listrik" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Telpon</label>
                                <input type="text" name="telpon" class="form-control" placeholder="Telpon" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Internet</label>
                                <input type="text" name="internet" class="form-control" placeholder="Internet" required="">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i> Submit</button>
                            <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>