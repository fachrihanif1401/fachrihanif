<?php  
$data = $supplier->show();
?>
<section class="pcoded-main-container">
  <div class="pcoded-content">
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h5 class="m-b-10">Data Laporan</h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#!">Data Laporan</a></li>
              <li class="breadcrumb-item"><a href="#!">Laporan Transaksi & Produk Terlaris</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-6">
        <div class="card">
          <div class="card-body">
           <h5 class="text-center">Laporan Transaksi Pelanggan </h5>
           <hr>
           <form method="GET" action="laporan/perbulan.php" target="blank">
            <div class="row">
              <div class="col-md-12">
                <label for="">Perbulan</label>
              </div>
              <div class="form-group col-md-6">
               <select name="bulan" id="" class="form-control" required="">
                <option value="">- Pilih Bulan -</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">april</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
            <div class="col-md-6">
             <select name="tahun" class="form-control" required="">
              <option value="">- Pilih Tahun -</option>
              <?php  
              $y = date('Y');
              for ($i=2019; $i <=$y+15; $i++) { 
                echo "<option value='$i'>$i</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-12">
            <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
          </div>
        </div>
      </form>
      <form method="GET" action="laporan/pertahun.php" target="blank">
        <div class="row">
          <div class="col-md-12">
            <label for="">Pertahun</label>
          </div>
          <div class="form-group col-md-6">
           <select name="tahun" class="form-control" required="">
            <option value="">- Pilih Tahun -</option>
            <?php  
            $y = date('Y');
            for ($i=2019; $i <=$y+15; $i++) { 
              echo "<option value='$i'>$i</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-12">
          <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
        </div>
      </div>
    </form>
  </div>
</div>


</div>

<div class="col-xl-6">
  <div class="card">
    <div class="card-body">
      <h5 class="text-center">Laporan Transaksi Supplier</h5>
     <hr>
     <form method="GET" action="laporan/perbulan_sup.php" target="blank">
      <div class="row">
        <div class="col-md-12">
          <label for="">Perbulan</label>
        </div>
        <div class="form-group col-md-6">
         <select name="bulan" id="" class="form-control" required="">
          <option value="">- Pilih Bulan -</option>
          <option value="01">Januari</option>
          <option value="02">Februari</option>
          <option value="03">Maret</option>
          <option value="04">april</option>
          <option value="05">Mei</option>
          <option value="06">Juni</option>
          <option value="07">Juli</option>
          <option value="08">Agustus</option>
          <option value="09">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>
      </div>
      <div class="col-md-6">
       <select name="tahun" class="form-control" required="">
        <option value="">- Pilih Tahun -</option>
        <?php  
        $y = date('Y');
        for ($i=2019; $i <=$y+15; $i++) { 
          echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group col-md-12">
      <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
    </div>
  </div>
</form>
<form method="GET" action="laporan/pertahun_sup.php" target="blank">
  <div class="row">
    <div class="col-md-12">
      <label for="">Pertahun</label>
    </div>
    <div class="form-group col-md-6">
     <select name="tahun" class="form-control" required="">
      <option value="">- Pilih Tahun -</option>
      <?php  
      $y = date('Y');
      for ($i=2019; $i <=$y+15; $i++) { 
        echo "<option value='$i'>$i</option>";
      }
      ?>
    </select>
  </div>
  <div class="form-group col-md-12">
    <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
  </div>
</div>
</form>
</div>
</div>


</div>

<div class="col-xl-6">
  <div class="card">
    <div class="card-body">
     <h5 class="text-center">Laporan Data Pengeluaran</h5>
     <hr>
     <form method="GET" action="laporan/pengeluaran.php" target="blank">
      <div class="row">
        <div class="col-md-12">
          <label for="">Perbulan</label>
        </div>
        <div class="form-group col-md-6">
         <select name="bulan" id="" class="form-control" required="">
          <option value="">- Pilih Bulan -</option>
          <option value="01">Januari</option>
          <option value="02">Februari</option>
          <option value="03">Maret</option>
          <option value="04">april</option>
          <option value="05">Mei</option>
          <option value="06">Juni</option>
          <option value="07">Juli</option>
          <option value="08">Agustus</option>
          <option value="09">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>
      </div>
      <div class="col-md-6">
       <select name="tahun" class="form-control" required="">
        <option value="">- Pilih Tahun -</option>
        <?php  
        $y = date('Y');
        for ($i=2019; $i <=$y+15; $i++) { 
          echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group col-md-12">
      <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
    </div>
  </div>
</form>

</div>
</div>


</div>
<div class="col-xl-6">
  <div class="card">
    <div class="card-body">
     <h5 class="text-center">Laporan Data Pendapatan</h5>
     <hr>
     <form method="GET" action="laporan/pendapatan.php" target="blank">
      <div class="row">
        <div class="col-md-12">
          <label for="">Perbulan</label>
        </div>
        <div class="form-group col-md-6">
         <select name="bulan" id="" class="form-control" required="">
          <option value="">- Pilih Bulan -</option>
          <option value="01">Januari</option>
          <option value="02">Februari</option>
          <option value="03">Maret</option>
          <option value="04">april</option>
          <option value="05">Mei</option>
          <option value="06">Juni</option>
          <option value="07">Juli</option>
          <option value="08">Agustus</option>
          <option value="09">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>
      </div>
      <div class="col-md-6">
       <select name="tahun" class="form-control" required="">
        <option value="">- Pilih Tahun -</option>
        <?php  
        $y = date('Y');
        for ($i=2019; $i <=$y+15; $i++) { 
          echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group col-md-12">
      <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
    </div>
  </div>
</form>

</div>
</div>


</div>
<div class="col-xl-6">
  <div class="card">
    <div class="card-body">
      <h5 class="text-center">Laporan Produk Terlaris</h5>
      <hr>
      <form action="laporan/produk_terlaris.php" target="_blank">
        <button class="btn btn-primary btn-block"><i class="fa fa-print"></i> CETAK</button>
      </form>
    </div>
  </div>
  
</div>
<div class="col-xl-6">
  <div class="card">
    <div class="card-body">
      <h5 class="text-center">Laporan Stok Produk</h5>
      <hr>
      <form method="GET" action="laporan/stok.php" target="blank">
        <div class="row">
          <div class="col-md-12">
            <label for="">Perbulan</label>
          </div>
          <div class="form-group col-md-6">
           <select name="bulan" id="" class="form-control" required="">
            <option value="">- Pilih Bulan -</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">april</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
        <div class="col-md-6">
         <select name="tahun" class="form-control" required="">
          <option value="">- Pilih Tahun -</option>
          <?php  
          $y = date('Y');
          for ($i=2019; $i <=$y+15; $i++) { 
            echo "<option value='$i'>$i</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-12">
        <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
<div class="col-xl-6">
  <div class="card">
    <div class="card-body">
      <h5 class="text-center">Laporan Data Admin</h5>
      <hr>
      <form action="laporan/admin.php" target="_blank">
        <button class="btn btn-primary btn-block"><i class="fa fa-print"></i> CETAK</button>
      </form>
    </div>
  </div>
</div>
<div class="col-xl-6">
  <div class="card">
    <div class="card-body">
      <h5 class="text-center">Laporan Data Promo</h5>
      <hr>
      <form action="laporan/promo.php" target="_blank">
        <button class="btn btn-primary btn-block"><i class="fa fa-print"></i> CETAK</button>
      </form>
    </div>
  </div>
</div>
<div class="col-xl-6">
  <div class="card">
    <div class="card-body">
      <h5 class="text-center">Laporan Data Return Produk</h5>
      <hr>
      <form method="GET" action="laporan/return.php" target="blank">
        <div class="row">
          <div class="col-md-12">
            <label for="">Perbulan</label>
          </div>
          <div class="form-group col-md-6">
           <select name="bulan" id="" class="form-control" required="">
            <option value="">- Pilih Bulan -</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">april</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
        <div class="col-md-6">
         <select name="tahun" class="form-control" required="">
          <option value="">- Pilih Tahun -</option>
          <?php  
          $y = date('Y');
          for ($i=2019; $i <=$y+15; $i++) { 
            echo "<option value='$i'>$i</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-12">
        <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
<div class="col-xl-6">
  <div class="card">
    <div class="card-body">
      <h5 class="text-center">Laporan Data Pengiriman Return</h5>
      <hr>
      <form method="GET" action="laporan/p-return.php" target="blank">
        <div class="row">
          <div class="col-md-12">
            <label for="">Perbulan</label>
          </div>
          <div class="form-group col-md-6">
           <select name="bulan" id="" class="form-control" required="">
            <option value="">- Pilih Bulan -</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">april</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
        <div class="col-md-6">
         <select name="tahun" class="form-control" required="">
          <option value="">- Pilih Tahun -</option>
          <?php  
          $y = date('Y');
          for ($i=2019; $i <=$y+15; $i++) { 
            echo "<option value='$i'>$i</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-12">
        <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</div>
</div>
</section>