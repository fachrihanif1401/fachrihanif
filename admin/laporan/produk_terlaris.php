<?php  
include '../../config/class.php';
include '../../config/fungsi.php';
$data=$laporan->laporanterlaris();
$konfigurasi = $instansi->detail();
date_default_timezone_set("Asia/Jakarta");
$tgl= date("Y-m-d");
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>.:: Laporan Produk Terlaris ::.</title>
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
        <h3 class="text-center"><u>LAPORAN PRODUK TERLARIS</u></h3><br>
        <table class="table table-striped table-bordered">
          <colgroup>
            <col class='con0' style='width: 4%' />
            <col class='con1' />
            <col class='con0' />
            <col class='con1' />
            <col class='con0' />
          </colgroup>
          <thead>
            <tr>
              <th><i class='icon-terminal'></i>No</th>
              <th><i class='icon-signal'></i> Kategori</th>
              <th><i class='icon-signal'></i> Produk</th>
              <th><i class='icon-signal'></i> Harga</th>
              <th><i class='icon-signal'></i> Gambar</th>
              <th><i class='icon-signal'></i> Terjual</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $key => $value): ?>
              <tr class='gradeX'>
                <td><?= $key+1 ?></td>
                <td><?= $value['nama_kategori'] ?></td>
                <td><?= $value['nama_produk'] ?></td>
                <td>Rp. <?= number_format($value['harga_produk']) ?></td>
                <td>
                  <img width="80" src="../../media/upload-produk/<?= $value['gambar_produk'] ?>" alt="" />
                </td>
                <td> <?= $value['terjual'] ?></td>
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

