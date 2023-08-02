<?php  
$id_user = $_GET['id'];
$data = $user->detail($id_user);
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Ubah Pengguna</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Pengguna</a></li>
                            <li class="breadcrumb-item"><a href="#!">Ubah Pengguna</a></li>
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
                        if (isset($_POST['ubah'])) 
                        {
                            $user->edit($_POST['nama'],$_POST['username'],$_POST['telepon'],$_POST['jk'],$_FILES['foto'],$_POST['alamat'],$id_user);
                            echo "<script>alert('Data user berhasil diubah!');</script>";
                            echo "<script>location='index.php?halaman=pengguna';</script>";
                        }
                        ?>
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" placeholder="Nama" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Username</label>
                                    <input type="text" name="username" value="<?= $data['username'] ?>" minlength="8" class="form-control" placeholder="Username" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Telepon</label>
                                    <input type="number" name="telepon" value="<?= $data['telepon'] ?>" class="form-control" placeholder="Telepon" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jk" class="form-control" required="">
                                        <option value="">- Pilih Jenis Kelamin -</option>
                                        <option value="Laki-Laki" <?php if ($data['jk']=="Laki-Laki") {echo "selected";} ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php if ($data['jk']=="Perempuan") {echo "selected";} ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php if (empty($data['foto'])): ?>
                                                <img width="100" class="img-thumbnail" src="../media/upload-pengguna/no-img.jpg" alt="">
                                                <?php else: ?>
                                                    <img width="100" class="img-thumbnail" src="../media/upload-pengguna/<?= $data['foto'] ?>" alt="">
                                                <?php endif ?>
                                            </div>
                                            <div class="col-md-9">
                                             <label for="">Foto</label>
                                             <input type="file" name="foto" class="form-control">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat"  class="form-control" placeholder="Alamat" required=""><?= $data['alamat'] ?></textarea>
                                </div>
                            </div>

                            <button name="ubah" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>