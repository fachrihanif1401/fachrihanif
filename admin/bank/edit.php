<?php  
$id_bank = $_GET['id'];
$detail = $bank->detail($id_bank);
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Ubah Bank</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Bank</a></li>
                            <li class="breadcrumb-item"><a href="#!">Ubah Bank</a></li>
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
                                    <input type="text" name="nama_pemilik" value="<?= $detail['nama_pemilik_rekening'] ?>" class="form-control" placeholder="Nama Pemilik" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Bank</label>
                                    <input type="text" name="bank" value="<?= $detail['nama_bank'] ?>" class="form-control" placeholder="Contoh : BNI" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nomor Rekening</label>
                                    <input type="number" name="norek" value="<?= $detail['nomor_rekening'] ?>" class="form-control" placeholder="Nomor Rekening" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img width="100" class="img-thumbnail" src="../media/upload-bank/<?= $detail['logo_bank'] ?>" alt="">
                                        </div>
                                        <div class="col-md-9">
                                          <label for="">Logo Bank</label>
                                          <input type="file" name="logo" class="form-control">
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <button name="ubah" class="btn btn-primary"><i class="feather icon-edit"></i> Ubah</button>
                      </form>
                      <?php  
                      if (isset($_POST['ubah'])) 
                      {
                        $bank->edit($_POST['nama_pemilik'],$_POST['bank'],$_POST['norek'],$_FILES['logo'],$id_bank);
                        echo "<script>alert('Bank berhasil diubah!');</script>";
                        echo "<script>location='index.php?halaman=bank';</script>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>