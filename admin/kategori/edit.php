<?php  
$id_kategori = $_GET['id'];
$data = $kategori->detail($id_kategori);
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Ubah Kategori</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Kategori</a></li>
                            <li class="breadcrumb-item"><a href="#!">Ubah Kategori</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php?halaman=kategori" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                        <hr>
                        <?php  
                        if (isset($_POST['ubah'])) 
                        {
                            $hasil = $kategori->edit($_POST['nama_kategori'],$id_kategori);
                            if ($hasil=="sukses") 
                            {
                                echo "<script>alert('Kategori berhasil diubah!');</script>";
                                echo "<script>location='index.php?halaman=kategori';</script>";
                            }
                            else
                            {
                                echo "<div class='alert alert-danger alert-slide-up'><i class='feather icon-info'></i> Kategori gagal diubah, nama kategori tidak boleh sama dengan yang sudah ada!</div>";
                            }
                        }
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="">Nama Kategori</label>
                                <input type="text" name="nama_kategori" value="<?= $data['nama_kategori'] ?>" class="form-control" placeholder="Nama Kategori" required="">
                            </div>
                            <button name="ubah" class="btn btn-primary"><i class="feather icon-edit"></i> Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>