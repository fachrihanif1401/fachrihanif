<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tambah Promo</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Promo</a></li>
                            <li class="breadcrumb-item"><a href="#!">Tambah Promo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php?halaman=promo" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                        <hr>
                        <?php  
                        if (isset($_POST['tambah'])) 
                        {
                            $hasil = $promo->add($_POST['kode'],$_POST['tgl'],$_POST['diskon'],$_FILES['foto'],$_POST['ket']);
                            if ($hasil=="sukses") 
                            {
                             echo "<script>alert('Promo berhasil disimpan!');</script>";
                             echo "<script>location='index.php?halaman=promo';</script>";
                         }
                         else
                         {
                            echo "<div class='alert alert-danger'><i class='feather icon-info'></i> Promo gagal disimpan, nama promo sudah terdaftar pada sistem!</div>";
                        }
                    }
                    ?>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Kode Promo</label>
                            <input type="text" name="kode" class="form-control" placeholder="Kode Promo" required="">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Promo</label>
                            <input type="date" name="tgl" class="form-control" placeholder="Tanggal Promo" required="">
                        </div>
                        <div class="form-group">
                            <label for="">Jummlah Diskon</label>
                            <input type="text" name="diskon" class="form-control" placeholder="Contoh : 20" required="">
                        </div>
                        <div class="form-group">
                            <label for="">Foto Promo</label>
                            <input type="file" name="foto" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan Promo</label>
                            <input type="text" name="ket" class="form-control" placeholder="Keterangan Promo" required="">
                        </div>
                        <button name="tambah" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</section>