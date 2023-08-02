<?php  
$id_pengiriman = $_GET['id'];
$data_pembelian = $pembelian->detail($id_pengiriman);
$detail_pembelian = $pembelian->detail_pembelian($id_pengiriman);
?>
<section class="pcoded-main-container">
  <div class="pcoded-content">
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h5 class="m-b-10">Detail Pembelian</h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#!">Detail Pembelian</a></li>
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
            <table class="table table-striped">
              <tr>
                <th>ID Pembelian</th>
                <td>:</td>
                <td><?= $data_pembelian['id_pengiriman'] ?></td>
              </tr>
              <tr>
                <th>Tanggal Transaksi</th>
                <td>:</td>
                <td><?= format_hari_tanggal($data_pembelian['tanggal_pembelian']) ?></td>
              </tr>
              <tr>
                <th>Status Pembelian</th>
                <td>:</td>
                <td>
                  <?php if ($data_pembelian['status_pembelian']=='Belum Bayar'): ?>
                    <span class="badge badge-danger"><?= $data_pembelian['status_pembelian'] ?></span>
                    <?php elseif ($data_pembelian['status_pembelian']=='Menunggu Konfirmasi'): ?>
                      <span class="badge badge-warning"><?= $data_pembelian['status_pembelian'] ?></span>
                      <?php elseif ($data_pembelian['status_pembelian']=='Dikemas'): ?>
                        <span class="badge badge-info"><?= $data_pembelian['status_pembelian'] ?></span>
                        <?php elseif ($data_pembelian['status_pembelian']=='Menunggu Konfirmasi Ulang'): ?>
                          <span class="badge badge-warning"><?= $data_pembelian['status_pembelian'] ?></span>
                          <?php elseif ($data_pembelian['status_pembelian']=='Selesai'): ?>
                            <span class="badge badge-success"><?= $data_pembelian['status_pembelian'] ?></span>
                            <?php elseif ($data_pembelian['status_pembelian']=='Pembayaran Ditolak'): ?>
                              <span class="badge badge-danger"><?= $data_pembelian['status_pembelian'] ?></span>
                            <?php endif ?>
                          </td>
                        </tr>
                        <tr>
                          <th>Nama Penerima</th>
                          <td>:</td>
                          <td><?= $data_pembelian['nama_penerima'] ?></td>
                        </tr>
                        <tr>
                          <th>Telepon Penerima</th>
                          <td>:</td>
                          <td><?= $data_pembelian['telepon_penerima'] ?></td>
                        </tr>
                        <tr>
                          <th>Alamat Penerima</th>
                          <td>:</td>
                          <td><?= $data_pembelian['alamat_penerima'] ?></td>
                        </tr>
                        <tr>
                          <th>Tujuan Pengiriman</th>
                          <td>:</td>
                          <td><?= $data_pembelian['tipe'] ?> <?= $data_pembelian['distrik'] ?> <?= $data_pembelian['provinsi'] ?> <?= $data_pembelian['kodepos_pengiriman'] ?></td>
                        </tr>
                        <tr>
                          <th>Ekspedisi Pengiriman</th>
                          <td>:</td>
                          <td><?= $data_pembelian['ekspedisi_pengiriman'] ?> <?= $data_pembelian['paket_pengiriman'] ?> / <?= $data_pembelian['lama_pengiriman'] ?> Hari</td>
                        </tr>
                        <tr>
                          <th>Catatan Pelanggan</th>
                          <td>:</td>
                          <td>
                            <?php if (empty($data_pembelian['catatan'])): ?>
                              -
                              <?php else: ?>
                                <?= $data_pembelian['catatan'] ?>
                              <?php endif ?>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>