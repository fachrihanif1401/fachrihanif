<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Profil</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Profil</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                      <center>
                                        <?php if (empty($data_user['foto'])): ?>
                                          <img width="125" class="img-thumbnail" src="../media/upload-pengguna/no-img.jpg" alt="">
                                          <?php else: ?>
                                            <img width="125" class="img-thumbnail" src="../media/upload-pengguna/<?= $data_user['foto'] ?>" alt="">
                                        <?php endif ?>
                                        <br><br>
                                        <h5><?= $data_user['nama'] ?></h5>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Data Profil</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">Nama Lengkap</label>
                                                <input type="text" name="nama" class="form-control" value="<?= $data_user['nama'] ?>" placeholder="Nama Lengkap" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Username</label>
                                                <input type="text" name="username" class="form-control" value="<?= $data_user['username'] ?>" placeholder="Username" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Telepon</label>
                                                <input type="number" name="telepon" value="<?= $data_user['telepon'] ?>" class="form-control" placeholder="Telepon" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Jenis Kelamin</label> 
                                                <select name="jk" id="" class="form-control" required="">
                                                    <option value="Laki-Laki" <?php if ($data_user['jk']=="Laki-Laki") {echo "selected";} ?>>Laki-Laki</option>
                                                    <option value="Perempuan" <?php if ($data_user['jk']=="Perempuan") {echo "selected";} ?>>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">Foto</label>
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">Alamat</label>
                                                <textarea name="alamat" id="" class="form-control" required=""><?= $data_user['alamat'] ?></textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <button name="simpan" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                                        <a href="index.php?halaman=ubah_password" class="btn btn-info"><i class="feather icon-lock"></i> Ubah Password</a>
                                    </form>
                                    <?php  
                                    if (isset($_POST['simpan'])) 
                                    {
                                     $user->edit($_POST['nama'],$_POST['username'],$_POST['telepon'],$_POST['jk'],$_FILES['foto'],$_POST['alamat'],$id_user);
                                     echo "<script>alert('Profil berhasil diubah!');</script>";
                                     echo "<script>location='index.php?halaman=profil';</script>";
                                 }
                                 ?>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
</div>