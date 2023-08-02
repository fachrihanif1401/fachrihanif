<?php    
$penjualan = $testimoni->penjualan();
$pembelian = $testimoni->pembelian();
$pengeluaran = $testimoni->pengeluaran();
$pendapatan = $testimoni->pendapatan();
$produk = $testimoni->produk();
$terjual = $testimoni->terjual();
?>
<div class="pcoded-main-container">
  <div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
        <!-- <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
          </div> -->
          <!-- [ breadcrumb ] end -->
          <!-- [ Main Content ] start -->
          <div class="row">
            <!-- order-card start -->
            
            <div class="col-md-12 col-xl-12s">
              <div class="card">
                <div class="card-header">
                  <h3 class="text-center"><i class="feather icon-bar-chart"></i> Keuangan & Grafik</h3>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-xl-12s">
              <div class="card">
                <div class="card-header">
                  <a href="index.php?halaman=laba" class="btn btn-primary"> Laba Rugi + History Pendapatan</a>
                </div>
              </div>
            </div>
            
            <!-- order-card end -->
            <!-- users visite start -->
            
            <div class="col-md-6 col-xl-12s">
              <div class="card">
                <div class="card-body">

                  <div class="gambarpro">
                    <canvas id="myChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-12s">
              <div class="card">
                <div class="card-body">

                 <div class="gambarpro">
                  <canvas id="myChartp"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-12s">
            <div class="card">
              <div class="card-body">

               <div class="gambarpro">
                <canvas id="myCharta"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-12s">
          <div class="card">
            <div class="card-body">

             <div class="gambarpro">
              <canvas id="myChartb"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-xl-12s">
        <div class="card">
          <div class="card-body">

           <div class="gambarpro">
            <canvas id="myChartPt"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- users visite end -->


    <!-- social statustic start -->



    <!-- social statustic end -->
    <!-- account-section start -->

    <!-- account-section end -->
    <!-- Customer overview start -->

    <!-- Customer overview end -->
  </div>
  <!-- [ Main Content ] end -->
</div>
</div>

