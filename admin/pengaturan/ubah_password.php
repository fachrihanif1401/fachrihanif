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
                      <h5 class="m-b-10">Ubah Password</h5>
                    </div>
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#!">Ubah Password</a></li>
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
                        <a href="index.php?halaman=profil" class="btn btn-warning"><i class="feather icon-edit"></i> Ubah Profil</a>
                      </center>
                    </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-header">
                      <h5>Ubah Password</h5>
                    </div>
                    <div class="card-body">
                     <div class="alert alert-info"><i class="feather icon-info"></i> Mohon untuk tidak memberitakukan password Anda kepada siapa pun!</div>
                     <form method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="">Password Lama</label>
                          <input type="password" name="passlama" class="form-control" placeholder="Password Lama" required="">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="">Password Baru</label>
                          <input type="password" name="pass" class="form-control" placeholder="Password Baru" required="">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="">Konfirmasi Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Konfirmasi Password" required="">
                        </div>
                      </div>
                      <hr>
                      <button name="simpan" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                      <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
                    </form>
                    <?php  
                    if (isset($_POST['simpan'])) 
                    {
                     $pass = $_POST['pass'];
                     if (strlen($pass) >= 8) 
                     {
                      $passbaru = $_POST['pass'];
                      $konfirm = $_POST['password'];
                      if ($passbaru == $konfirm) 
                      {
                        $hasil=$user->ubahpassword($_POST['passlama'],$_POST['pass'],$_POST['password']);
                        if ($hasil=="sukses") 
                        {
                         echo "<script>alert('Password anda berhasil di perbaharui');</script>";
                         echo "<script>location='index.php?halaman=ubah_password';</script>";
                       }
                       else
                       {
                        echo "<script>alert('Password lama anda salah');</script>";
                        echo "<script>location='index.php?halaman=ubah_password';</script>";
                      }
                    }
                    else
                    {
                      echo "<script>alert('Ubah password gagal, Konfirmasi password tidak sama');</script>";
                      echo "<script>location='index.php?halaman=ubah_password';</script>";
                    }
                  }
                  else
                  {
                    echo "<script>alert('Ubah password gagal, Password kurang dari 8');</script>";
                    echo "<script>location='index.php?halaman=ubah_password';</script>";
                  }
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