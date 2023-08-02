<?php  
$data = $pembelian->tampil_pembelian();
?>
<section class="pcoded-main-container">
  <div class="pcoded-content">
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h5 class="m-b-10">Data Pembelian</h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#!">Data Pembelian</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ID TRANSAKSI</th>
                  <th>TGL. TRANSAKSI</th>
                  <th>PELANGGAN</th>
                  <th>STATUS</th>
                  <th>PROMO</th>
                  <th>TOTAL</th>
                  <th>TINDAKAN</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $key => $value): ?>
                  <tr>
                    <td width="7%"><?= $key+1 ?></td>
                    <td><?= $value['id_pengiriman'] ?></td>
                    <td width="15%"><?= format_hari_tanggal($value['tanggal_pembelian']) ?></td>
                    <td><?= $value['nama_pelanggan'] ?></td>
                    <td>
                      <?php if ($value['status_pembelian']=="Belum Bayar"): ?>
                        <span class="badge badge-danger"><?= $value['status_pembelian'] ?></span>
                        <?php elseif ($value['status_pembelian']=="Menunggu Konfirmasi"): ?>
                         <span class="badge badge-warning"><?= $value['status_pembelian'] ?></span>
                         <?php elseif ($value['status_pembelian']=="Dikemas"): ?>
                           <span class="badge badge-info"><?= $value['status_pembelian'] ?></span>
                           <?php elseif ($value['status_pembelian']=="Selesai"): ?>
                             <span class="badge badge-success"><?= $value['status_pembelian'] ?></span>
                             <?php elseif ($value['status_pembelian']=="Menunggu Konfirmasi Ulang"): ?>
                               <span class="badge badge-warning"><?= $value['status_pembelian'] ?></span>
                               <?php elseif ($value['status_pembelian']=="Dikirim"): ?>
                                 <span class="badge badge-info"><?= $value['status_pembelian'] ?></span>
                                 <?php elseif ($value['status_pembelian']=="Pembayaran Ditolak"): ?>
                                   <span class="badge badge-danger"><?= $value['status_pembelian'] ?></span>
                                    <?php elseif ($value['status_pembelian']=="Return Barang"): ?>
                                   <span class="badge badge-warning"><?= $value['status_pembelian'] ?></span>
                                   <?php elseif ($value['status_pembelian']=="Barang return disetujui"): ?>
                                   <span class="badge badge-success"><?= $value['status_pembelian'] ?></span>
                                    <?php elseif ($value['status_pembelian']=="Barang return ditolak"): ?>
                                   <span class="badge badge-danger"><?= $value['status_pembelian'] ?></span>
                                 <?php endif ?>
                               </td>
                               <td>Rp. <?= number_format($value['promo']) ?></td>
                               <td>Rp. <?= number_format($value['total_pembelian']) ?></td>
                               <td width="30%">
                                <a href="index.php?halaman=detailpembelian&id=<?= $value['id_pengiriman'] ?>" class="btn btn-info btn-sm"><i class="fa fa-share-square-o"></i> Detail</a>
                                <a href="index.php?halaman=pembayaran&id=<?= $value['id_pengiriman'] ?>" class="btn btn-success btn-sm"><i class="feather icon-dollar-sign"></i> Pembayaran</a>
                                <?php if ($value['status_pembelian']=="Dikemas"): ?>
                                 <a href="index.php?halaman=resi&id=<?= $value['id_pengiriman'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-truck"></i> Nomor Resi</a>
                               <?php endif ?>
                             </td>
                           </tr>
                         <?php endforeach ?>
                       </tbody>
                     </table>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </section>