<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tambah Bank</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Bank</a></li>
                            <li class="breadcrumb-item"><a href="#!">Tambah Bank</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php?halaman=kategori" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                        <hr>
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nama Pemilik</label>
                                    <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama Pemilik" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Bank</label>
                                    <input type="text" name="bank" class="form-control" placeholder="Contoh : BNI" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nomor Rekening</label>
                                    <input type="number" name="norek" class="form-control" placeholder="Nomor Rekening" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Logo Bank</label>
                                    <input type="file" name="logo" class="form-control" required="">
                                </div>
                            </div>
                            
                            <button name="tambah" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
                        </form>
                        <?php  
                        if (isset($_POST['tambah'])) 
                        {
                            $hasil = $bank->add($_POST['nama_pemilik'],$_POST['bank'],$_POST['norek'],$_FILES['logo']);
                            if ($hasil=="sukses") 
                            {
                               echo "<script>alert('Bank berhasil ditambahkan!');</script>";
                               echo "<script>location='index.php?halaman=bank';</script>";
                           }
                           else
                           {
                            echo "<div class='alert alert-danger'><i class='feather icon-info'></i> Bank gagal ditambahkan, nomor rekening sudah terdaftar pada sistem!</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>