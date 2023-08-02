<?php  
$data = $instansi->detail();
?>
<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="main-body">
          <div class="page-wrapper">
            <div class="page-header">
              <div class="page-block">
                <div class="row align-items-center">
                  <div class="col-md-12">
                    <div class="page-header-title">
                      <h5 class="m-b-10">Instansi</h5>
                    </div>
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#!">Pengaturan</a></li>
                      <li class="breadcrumb-item"><a href="#!">Instansi</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                      <div class="row">
                        <input type="hidden" name="id_instansi" value="<?= $data['id_instansi'] ?>" >
                        <div class="form-group col-md-6">
                          <label for="">Nama Instansi</label>
                          <input type="text" name="nama_instansi" value="<?= $data['nama_instansi'] ?>" class="form-control" placeholder="Nama Instansi" required="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="">Pimpinan Instansi</label>
                          <input type="text" name="pimpinan_instansi" value="<?= $data['pimpinan_instansi'] ?>" class="form-control" placeholder="Nama Instansi" required="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="">Telepon Instansi</label>
                          <input type="text" name="telepon_instansi" value="<?= $data['telepon_instansi'] ?>" class="form-control" placeholder="Nama Instansi" required="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="">Email Instansi</label>
                          <input type="text" name="email_instansi" value="<?= $data['email_instansi'] ?>" class="form-control" placeholder="Nama Instansi" required="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="">Website Instansi</label>
                          <input type="text" name="website" value="<?= $data['website'] ?>" class="form-control" placeholder="Nama Instansi" required="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="">Instagram Instansi</label>
                          <input type="text" name="instagram" value="<?= $data['instagram'] ?>" class="form-control" placeholder="Nama Instansi" required="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="">Facebook Instansi</label>
                          <input type="text" name="facebook" value="<?= $data['facebook'] ?>" class="form-control" placeholder="Nama Instansi" required="">
                        </div>
                        <div class="form-group col-md-6">
                          <div class="row">
                            <div class="col-md-3">
                              <?php if (empty($data['logo_instansi'])): ?>
                                <img width="100" class="img-thumbnail" src="../media/upload-instansi/no-img.jpg" alt="">
                                <?php else: ?>
                                  <img width="100" class="img-thumbnail" src="../media/upload-instansi/<?= $data['logo_instansi'] ?>" alt="">
                                <?php endif ?>
                              </div>
                              <div class="col-md-9">
                                <label for="">Favicon</label>
                                <input type="file" name="logo_instansi" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="">Alamat Instansi</label>
                            <textarea name="alamat_instansi" class="form-control" placeholder="Alamat" required=""><?= $data['alamat_instansi'] ?></textarea>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="">Maps</label>
                            <textarea name="maps" class="form-control" placeholder="Maps" required=""><?= $data['maps'] ?></textarea>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="">Tentang Instansi</label>
                            <textarea name="tentang" class="form-control" placeholder="Tentang" required=""><?= $data['tentang'] ?></textarea>
                          </div>
                        </div>
                        <hr>
                        <button name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                    </form>
                    <?php  
                    if (isset($_POST['simpan'])) 
                    {
                      $instansi->edit($_POST['id_instansi'],$_POST['nama_instansi'],$_POST['pimpinan_instansi'],$_POST['email_instansi'],$_POST['telepon_instansi'],$_POST['facebook'],$_POST['instagram'],$_POST['website'],$_FILES['logo_instansi'],$_POST['alamat_instansi'],$_POST['maps'],$_POST['tentang']);
                      echo "<script>alert('Berhasil diperbaharui!');</script>";
                      echo "<script>location='index.php?halaman=instansi';</script>";
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