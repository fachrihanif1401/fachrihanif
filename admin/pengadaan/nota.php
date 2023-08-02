<?php  
include '../../config/class.php';
$id_pengadaan = $_GET['id'];
$detail = $pengadaan->detail($id_pengadaan);
$data = $pengadaan->show_detail($id_pengadaan);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Nota Pengadaan Barang</title>
  <link href="../styles/styles_cetak.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">
    window.print();
    window.onfocus=function(){ window.close();}
  </script>
  <style>
    .nota {
      margin-bottom: 20px;
      background-color: #fff;
      border: 1px solid transparent;
      -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
      box-shadow: 0 1px 1px rgba(0,0,0,.05);
      width: 800px;
    }
  </style>
</head>
<body onLoad="window.print()">
  <center>
    <div style="border-color:#202020;" class="nota"><br>
      <table class="table-list" width="90%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td height="87" colspan="3" align="center">
            <strong>UD. Tani Maju</strong><br />
            <strong>Jl. Magelang St KM.5,6 No.63, Kutu Tegal, Sinduadi, Mlati, Sleman Regency, Special Region of Yogyakarta 55284</strong>
            <hr>
          </td>
        </tr>
        <tr>
          <th width="20%">Nomor Transaksi</th>
          <th width="5%">:</th>
          <th width=""><?= $detail['nomor_transaksi'] ?></th>
        </tr>
        <tr>
          <th>Nama Supplier</th>
          <th>:</th>
          <th><?= $detail['nama_supplier'] ?></th>
        </tr>
        <tr>
          <th>Tanggal Transaksi</th>
          <th>:</th>
          <th><?= $detail['tanggal_transaksi'] ?></th>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
      </table>
      <table class="table-list" width="90%" border="1" cellspacing="0" cellpadding="2">
        <thead>
          <tr>
            <th>No.</th>
            <th>Kategori</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga Beli</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $key => $value): ?>
            <tr>
              <td width="5%"><?= $key+1 ?></td>
              <td width="15%"><?= $value['nama_kategori'] ?></td>
              <td width="30%"><?= $value['nama_produk'] ?></td>
              <td width="30%"><?= $value['jumlah'] ?></td>
              <td width="30%">Rp. <?= number_format($value['harga_beli']) ?></td>
              <td width="20%">
                Rp. <?= number_format($value['subtotal']) ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="5">TOTAL</th>
            <th>Rp. <?= number_format($detail['total']) ?></th>
          </tr>
        </tfoot>
      </table><br><br>
    </div>
  </center>
</body>
</html>