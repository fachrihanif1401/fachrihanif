<?php  
include '../../config/class.php';
include '../../config/fungsi.php';
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];
$data=$pembelian->list_return_r($bulan,$tahun);
$konfigurasi = $instansi->detail();
date_default_timezone_set("Asia/Jakarta");
$tgl= date("Y-m-d");
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>.:: Laporan Data Stok Produk ::.</title>
  <style type="text/css">

    #judul {
     width:100%;
     margin-bottom:20px;
     text-align:center;
   }
   @media print{
    .no-print
    {
      display: none;
    }
  }

</style>
<link href="../css/style.default.css" rel="stylesheet" type="text/css" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
  <div id='contentwrapper' class='contentwrapper'>
    <div id="judul">
      <br />
      <br />
      <font size="+2"><?= $konfigurasi['nama_instansi'] ?></font><br />
      <?= $konfigurasi['alamat_instansi'] ?>

      <hr color="#eee" />   </div>
      <div class="container">
        <a href="#" class="no-print" onclick="window.print();"><button class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Cetak/Print</button></a> <br><br>
        <h3 class="text-center"><u>LAPORAN DATA RETURN PRODUK</u></h3><br>
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
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $key => $value): ?>
              <tr>
                <td width="7%"><?= $key+1 ?></td>
                <td><?= $value['nama_pelanggan'] ?></td>
                <td><?= date('d F Y', strtotime($value['tanggal_pembelian'])) ?></td>
                <td><?= $value['jenis_retur'] ?></td>
                <td><img width="200" src="../../media/upload-return/<?= $value['bukti'] ?>"></td>
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
                    
                    
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>

            
            <table width="100%" >
              <tr>
                <td></td>
                <td width="200px">
                  <p>Bogor, <?php echo tanggal_indo(date("Y-m-d")); ?><br>
                  Pemilik,</p>
                  <br>
                  <br>
                  <br>
                  <p><u><?= $konfigurasi['pimpinan_instansi'] ?></u></p>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>   


    </body>
    </html>

