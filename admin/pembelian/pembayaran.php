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
              <h5 class="m-b-10">Data Pembayaran</h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#!">Data Pembayaran</a></li>
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
            <?php if ($cek=="belumkirim"): ?>
              <div class="alert alert-danger">Pelanggan belum melakukan pembayaran!</div>
              <?php else: ?>
                <div class="row">
                  <?php foreach ($cek as $key => $value): ?>
                    <div class="col-md-8">
                      <table class="table table-striped">
                        <tr>
                          <th width="35%">ID Transaksi</th>
                          <td>:</td>
                          <td>#<?= $data_pembelian['id_pengiriman'] ?></td>
                        </tr>
                        <tr>
                          <th>Tgl. Transaksi</th>
                          <td>:</td>
                          <td><?= format_hari_tanggal($data_pembelian['tanggal_pembelian']) ?></td>
                        </tr>
                        <tr>
                          <th>Total Belanja</th>
                          <td>:</td>
                          <td>Rp. <?= number_format($data_pembelian['total_belanja']) ?></td>
                        </tr>
                        <tr>
                          <th>Total Ongkir</th>
                          <td>:</td>
                          <td>Rp. <?= number_format($data_pembelian['total_ongkir']) ?></td>
                        </tr>
                        <tr>
                          <th>Total Tagihan</th>
                          <td>:</td>
                          <td>Rp. <?= number_format($data_pembelian['total_pembelian']) ?></td>
                        </tr>
                        <tr>
                          <th>Status</th>
                          <td>:</td>
                          <td><?= $data_pembelian['status_pembelian'] ?></td>
                        </tr>
                        <tr>
                          <th>Tgl. Konfirmasi Pembayaran</th>
                          <td>:</td>
                          <td><?= format_hari_tanggal($value['tgl_konfirmasi']) ?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel panel-body">
                          <img width="265" src="../media/upload-bukti/<?= $value['bukti'] ?>" alt="">
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>
                </div>
                <?php if ($data_pembelian['status_pembelian']=="Menunggu Konfirmasi"): ?>
                  <a href="index.php?halaman=terima_pembayaran&id=<?= $id_pengiriman ?>" class="btn btn-success" onclick="return confirm('Apakah anda yakin pembayaran sudah sesuai dengan total!')"><i class="fa fa-check"></i> Terima Pembayaran</a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default"><i class="fa fa-times"></i>
                    Tolak Pembayaran
                  </button>
                  <?php elseif ($data_pembelian['status_pembelian']=="Menunggu Konfirmasi Ulang"): ?>
                    <a href="index.php?halaman=terima_pembayaran&id=<?= $id_pengiriman ?>" class="btn btn-success" onclick="return confirm('Apakah anda yakin pembayaran sudah sesuai dengan total!')"><i class="fa fa-check"></i> Terima Pembayaran</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default"><i class="fa fa-times"></i>
                      Tolak Pembayaran
                    </button>
                  <?php endif ?>
                <?php endif ?>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-titl text-center">Tolak Pembayaran</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form method="post">
                <div class="form-group">
                  <textarea name="alasan" class="form-control" placeholder="Mohon masukan alasan tolak pembayaran"></textarea>
                </div>
                <div class="modal-footer">
                  <center>
                    <button name="kirim" class="btn btn-primary" style='background: #40b149; border-color: #40b149;'> Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </center>
                </div>
              </form>
              <?php  

              if (isset($_POST['kirim'])) 
              {
                $pembelian->tolakpembayaran($_POST['alasan'],$id_pengiriman);
                echo "<script>alert('Pembayaran berhasil ditolak');</script>";
                echo "<script>location='index.php?halaman=pembelian';</script>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>