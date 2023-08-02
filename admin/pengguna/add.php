<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tambah Pengguna</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Pengguna</a></li>
                            <li class="breadcrumb-item"><a href="#!">Tambah Pengguna</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php?halaman=pengguna" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                        <hr>
                        <?php  
                        if (isset($_POST['tambah'])) 
                        {
                            $hasil = $user->add($_POST['nama'],$_POST['username'],$_POST['password'],$_POST['telepon'],$_POST['jk'],$_FILES['foto'],$_POST['alamat']);
                            if ($hasil=="sukses") 
                            {
                             echo "<script>alert('Data useer berhasil ditambahkan!');</script>";
                             echo "<script>location='index.php?halaman=pengguna';</script>";
                         }
                         else
                         {
                            echo "<div class='alert alert-danger'><i class='feather icon-info'></i> Data user gagal ditambahkan, username tidak tersedia!</div>";
                        }
                    }
                    ?>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Username</label>
                                <input type="text" name="username" minlength="8" class="form-control" placeholder="Username" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Password</label>
                                <input type="Password" name="password" minlength="8" class="form-control" placeholder="Password" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Telepon</label>
                                <input type="number" name="telepon" class="form-control" placeholder="Telepon" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jenis Kelamin</label>
                                <select name="jk" class="form-control" required="">
                                    <option value="">- Pilih Jenis Kelamin -</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Foto</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Alamat</label>
                                <textarea name="alamat" class="form-control" placeholder="Alamat" required=""></textarea>
                            </div>
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