<div class="card">
	<div class="card-body">
		<h5 class="text-center">Akun Saya</h5>
		<p class="text-center">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun.</p>
		<p></p>
		<hr>
		<table class="table table-striped">
			<tr>
				<th width="20%">Nama Lengkap</th>
				<td width="5%">:</td>
				<td><?= $data_pelanggan['nama_pelanggan'] ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td>:</td>
				<td><?= $data_pelanggan['email_pelanggan'] ?></td>
			</tr>
			<tr>
				<th>Telepon</th>
				<td>:</td>
				<td><?= $data_pelanggan['telepon_pelanggan'] ?></td>
			</tr>
			<tr>
				<th>Alamat Lengkap</th>
				<td>:</td>
				<td><?= $data_pelanggan['alamat_pelanggan'] ?></td>
			</tr>
		</table>
		<hr>
		<center>
			<a href="#" data-toggle="modal" class="btn btn-primary" data-target="#exampleModalCenter"><i class="fa fa-edit"></i> Ubah Profil</a>
			<a href="member.php?halaman=ubah_password" class="btn btn-info"><i class="fa fa-lock"></i> Ubah Password</a>
		</center>
	</div>
</div>