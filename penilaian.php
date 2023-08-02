<?php  
include 'config/class.php';
$id_pengiriman= $_POST['idx'];
$id_pelanggan = $_POST['idp'];
$data = $pembelian->cek_penilaian($id_pengiriman);
?>

<?php if ($data=="belumada"): ?>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="id_pengiriman" value="<?php echo $id_pengiriman; ?>" class="form-control">
        </div>
        <div class="form-group">
            <input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>" class="form-control">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="gambar">
        </div>
        <div class="form-group">
            <textarea name="penilaian" class="form-control" placeholder="Mohon masukan penilaian untuk produk yang anda beli :)"></textarea>
        </div><hr>
        <div class="text-center">
            <button class="btn btn-primary" name="kirimpenilaian" style="background: #40b149; border-color: #40b149;"><i class="fa fa-send"></i> Kirim</button>
            <button class="btn btn-danger" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Batal</button>
        </div>
    </form>
<?php else: ?>
    <p class="alert alert-success">Terima kasih sudah menilai menu yang Anda pesan :)</p>
<?php endif ?>



