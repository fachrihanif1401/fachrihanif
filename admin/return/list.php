<?php  
$data = $pembelian->list_return();
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
                  <th>PELANGGAN</th>
                  <th>TGL. TRANSAKSI</th>
                  <th>JENIS</th>
                  <th>BUKTI</th>
                  <th>ALASAN</th>
                  <th>STATUS</th>
                  <th>TINDAKAN</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $key => $value): ?>
                  <tr>
                    <td width="7%"><?= $key+1 ?></td>
                    <td><?= $value['nama_pelanggan'] ?></td>
                    <td><?= date('d F Y', strtotime($value['tanggal_pembelian'])) ?></td>
                    <td><?= $value['jenis_retur'] ?></td>
                    <td><img width="200" src="../media/upload-return/<?= $value['bukti'] ?>"></td>
                    <td><?= $value['alasan'] ?></td>
                    <td>
                      <?php if ($value['status']=="Pending"): ?>
                        <span class="badge badge-warning"><?= $value['status'] ?></span>
                        <?php elseif ($value['status']=="Ditolak"): ?>
                        <span class="badge badge-danger"><?= $value['status'] ?></span>
                        <?php else: ?>
                        <span class="badge badge-success"><?= $value['status'] ?></span>
                      <?php endif ?>
                    </td>
                    <td>
                     <?php if ($value['status']=="Pending"): ?>
                        <a href="index.php?halaman=setujui_return&id=<?= $value['id_retur'] ?>&id_p=<?= $value['id_pengiriman'] ?>" class="btn btn-success" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-check"></i> Setujui</a>
                        <a href="index.php?halaman=tolak_return&id=<?= $value['id_retur'] ?>&id_p=<?= $value['id_pengiriman'] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger"><i class="fa fa-times"></i> Tolak</a>
                        <?php elseif ($value['status']=="Ditolak"): ?>
                        <span class="badge badge-danger"><i class="fa fa-times"></i></span>
                        <?php else: ?>
                        <span class="badge badge-success"><i class="fa fa-check"></i></span>
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