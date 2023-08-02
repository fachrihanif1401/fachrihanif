<?php  
$id_pengiriman = $_GET['id'];
$data_pembelian = $pembelian->detail($id_pengiriman);
$detail_pembelian = $pembelian->detail_pembelian($id_pengiriman);
$cek = $pembelian->cek_status_pembayaran($id_pengiriman);
?>
<section class="pcoded-main-container">
  <div class="pcoded-content">
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h5 class="m-b-10">Nomor Resi Pengiriman</h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#!">Nomor Resi Pengiriman</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <a href="index.php?halaman=pembelian" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
            <hr>
            <form method="post">
              <div class="form-group">
                <label for="">NOMOR RESI PENGIRIMAN</label>
                <input type="text" name="nomor_resi" class="form-control" placeholder="NOMOR RESI PENGIRIMAN" required="">
              </div>
              <button name="simpan" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
              <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
            </form>
            <?php  
            if (isset($_POST['simpan'])) 
            {
              $pembelian->nomor_resi($_POST['nomor_resi'],$id_pengiriman);
              echo "<script>Nomor resi berhasil disimpan!</script>";
              echo "<script>location='index.php?halaman=pembelian';</script>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>