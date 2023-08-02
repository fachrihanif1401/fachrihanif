<?php  
$id_supplier = $_GET['id'];
$detail = $supplier->detail($id_supplier);
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Ubah Data Supplier</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Supplier</a></li>
                            <li class="breadcrumb-item"><a href="#!">Ubah Data Supplier</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php?halaman=supplier" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                        <hr>
                        <form method="post">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nama Supplier</label>
                                    <input type="text" name="nama" value="<?= $detail['nama_supplier'] ?>" class="form-control" placeholder="Nama Supplier" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Telepon Supplier</label>
                                    <input type="number" name="telp" value="<?= $detail['telepon_supplier'] ?>" class="form-control" placeholder="Telepon Supplier" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Alamat Supplier</label>
                                    <input type="text" name="alamat" value="<?= $detail['alamat_supplier'] ?>" class="form-control" placeholder="Alamat Supplier" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Keterangan</label>
                                    <input type="text" name="keterangan" value="<?= $detail['keterangan'] ?>" class="form-control" placeholder="Contoh : Supplier Pupuk " required="">
                                </div>
                            </div>
                            <button name="ubah" class="btn btn-primary"><i class="feather icon-edit"></i> Ubah</button>
                        </form> 
                        <?php  
                        if (isset($_POST['ubah'])) 
                        {
                            $supplier->edit($_POST['nama'],$_POST['telp'],$_POST['alamat'],$_POST['keterangan'],$id_supplier);
                            echo "<script>alert('Data supplier berhasil diubah!!');</script>";
                            echo "<script>location='index.php?halaman=supplier';</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>