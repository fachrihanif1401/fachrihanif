<?php  
include '../../config/class.php';
include '../../config/fungsi.php';
date_default_timezone_set("Asia/Jakarta");
$konfigurasi = $instansi->detail();
$tgl= date("Y-m-d");
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>.:: Laporan Transaksi Perbulan ::.</title>
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
      <font size="+2"><u>PERHITUNGAN LABA & PENDAPATAN BERDASARKAN BULAN HARI INI</u></font><br /><br />
      <?= $konfigurasi['alamat_instansi'] ?>

      <hr color="#eee" />   </div>
      <div class="container">
        <a href="#" class="no-print" onclick="window.print();"><button class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Cetak/Print</button></a> <br><br>
        PENDAPATAN
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
              <th><i class='icon-terminal'></i>Penjualan</th>
              <th><i class='icon-signal'></i> <?= $_GET['penjualan'] ?></th>
            </tr>
            <tr>
              <th><i class='icon-terminal'></i>HPP (Harga Pokok Penjualan)</th>
              <th><i class='icon-signal'></i> <?= $_GET['pokok'] ?></th>
            </tr>
            <tr>
              <th><i class='icon-terminal'></i>Laba/Rugi Kotor</th>
              <th><i class='icon-signal'></i> <?= $_GET['penjualan']-$_GET['pokok'] ?></th>
            </tr>
          </thead>


          
        </table>
        PENGELUARAN
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
              <th><i class='icon-terminal'></i>Gaji Pegawai</th>
              <th><i class='icon-signal'></i> <?= $_GET['gaji'] ?></th>
            </tr>
            <tr>
              <th><i class='icon-terminal'></i>Listrik</th>
              <th><i class='icon-signal'></i> <?= $_GET['listrik'] ?></th>
            </tr>
            <tr>
              <th><i class='icon-terminal'></i>Telpon</th>
              <th><i class='icon-signal'></i> <?= $_GET['telpon'] ?></th>
            </tr>
            <tr>
              <th><i class='icon-terminal'></i>Internet</th>
              <th><i class='icon-signal'></i> <?= $_GET['internet'] ?></th>
            </tr>
            
          </thead>

          
          
        </table>
        LABA BERSIH
        <table class="table table-striped table-bordered">
          <colgroup>
            <col class='con0' style='width: 4%' />
            <col class='con1' />
            <col class='con0' />
            <col class='con1' />
            <col class='con0' />
          </colgroup>

          <?php  
          $pendapatan = $_GET['penjualan']-$_GET['pokok'];
          $pengeluaran = $_GET['gaji']+$_GET['listrik']+$_GET['telpon']+$_GET['internet'];
          ?>
          
          <thead>
            <tr>
              <th><i class='icon-terminal'></i>Pendapatan</th>
              <th><i class='icon-signal'></i> <?= $pendapatan ?></th>
            </tr>
            <tr>
              <th><i class='icon-terminal'></i>Pengeluaran</th>
              <th><i class='icon-signal'></i> <?= $pengeluaran ?></th>
            </tr>
            <tr>
              <th><i class='icon-terminal'></i>Laba Bersih</th>
              <th><i class='icon-signal'></i> <?= $pendapatan-$pengeluaran; ?></th>
            </tr>
            
            
          </thead>

          
          
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

