<?php  
$data = $instansi->banner();
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
                      <h5 class="m-b-10">Banner</h5>
                    </div>
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#!">Pengaturan</a></li>
                      <li class="breadcrumb-item"><a href="#!">Banner</a></li>
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
                        <input type="hidden" name="id" value="<?= $data['id'] ?>" >
                        
                        
                        
                        

                        <div class="form-group col-md-12">
                          <div class="row">
                            <div class="col-md-9">
                              <?php if (empty($data['gambar'])): ?>
                                <img width="100%" class="img-thumbnail" src="../media/upload-instansi/no-img.jpg" alt="">
                              <?php else: ?>
                                <img width="100%" class="img-thumbnail" src="../media/upload-instansi/<?= $data['gambar'] ?>" alt="">
                              <?php endif ?>
                            </div>
                            <div class="col-md-3">
                              <label for="">Banner</label>
                              <input type="file" name="logo_instansi" class="form-control">
                            </div>
                          </div>
                        </div>



                      </div>
                      <hr>
                      <button name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                  </form>
                  <?php  
                  if (isset($_POST['simpan'])) 
                  {
                    $instansi->editbanner($_POST['id'],$_FILES['logo_instansi']);
                    echo "<script>alert('Berhasil diperbaharui!');</script>";
                    echo "<script>location='index.php?halaman=banner';</script>";
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