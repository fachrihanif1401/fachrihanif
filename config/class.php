<?php  
if (!isset($_SESSION)) 
{
	session_start();
}
$mysqli = new mysqli("localhost","id21099352_fachrihanif","Airwalk#420","id21099352_petshop");

class user
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function detail($id_user)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_user WHERE id_user='$id_user'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function profil()
	{
		$id_user = $_SESSION['user']['id_user'];
		$ambil = $this->koneksi->query("SELECT * FROM tbl_user WHERE id_user='$id_user'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function login($username,$password)
	{
		$username = mysqli_real_escape_string($this->koneksi,$username);
		$password= mysqli_real_escape_string($this->koneksi,$password);
		$enpass=sha1($password);
		$ambil = $this->koneksi->query("SELECT * FROM tbl_user WHERE username='$username' AND password='$enpass'");
		$yangcocok=$ambil->num_rows;
		if ($yangcocok==1) 
		{
			$akun=$ambil->fetch_assoc();

			$_SESSION["user"]=$akun;
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}

	function show()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_user ORDER BY id_user DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function add($nama,$username,$password,$telepon,$jk,$foto,$alamat)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_user WHERE username='$username'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok==1) 
		{
			return "gagal";
		}
		else
		{
			$namagambar=$foto['name'];
			$lokasi=$foto['tmp_name'];
			$enpass = sha1($password);
			if (!empty($namagambar)) 
			{
				move_uploaded_file($lokasi, "../media/upload-pengguna/$namagambar");
				$this->koneksi->query("INSERT INTO tbl_user (nama,username,password,telepon,jk,foto,alamat) VALUES ('$nama','$username','$enpass','$telepon','$jk','$namagambar','$alamat')");
			}
			else
			{
				$this->koneksi->query("INSERT INTO tbl_user (nama,username,password,telepon,jk,alamat) VALUES ('$nama','$username','$enpass','$telepon','$jk','$alamat')");
			}
			return "sukses";
		}
	}

	function edit($nama,$username,$telepon,$jk,$foto,$alamat,$id_user)
	{
		$namagambar=$foto['name'];
		$lokasi=$foto['tmp_name'];
		if (!empty($namagambar)) 
		{
			$detail = $this->detail($id_user);
			if (!empty($detail['foto'])) 
			{
				unlink('../media/upload-pengguna/'.$detail['foto']);
			}
			move_uploaded_file($lokasi, "../media/upload-pengguna/$namagambar");
			$this->koneksi->query("UPDATE tbl_user SET nama='$nama',username='$username',telepon='$telepon',jk='$jk',foto='$namagambar',alamat='$alamat' WHERE id_user='$id_user' ");
		}
		else
		{
			$this->koneksi->query("UPDATE tbl_user SET nama='$nama',username='$username',telepon='$telepon',jk='$jk',alamat='$alamat' WHERE id_user='$id_user'");
		}
	}

	function ubah_profil($id_user,$nama,$username,$telepon,$jk,$foto,$alamat)
	{
		$namagambar=$foto['name'];
		$lokasi=$foto['tmp_name'];
		if (!empty($namagambar)) 
		{
			$detail = $this->detail($id_user);
			if (!empty($detail['foto'])) 
			{
				unlink('../media/upload-pengguna/'.$detail['foto']);
			}
			move_uploaded_file($lokasi, "../media/upload-user/$namagambar");
			$this->koneksi->query("UPDATE tbl_user SET nama='$nama',username='$username',telepon='$telepon',jk='$jk',foto='$namagambar',alamat='$alamat' WHERE id_user='$id_user' ");
		}
		else
		{
			$this->koneksi->query("UPDATE tbl_user SET nama='$nama',username='$username',telepon='$telepon',jk='$jk',alamat='$alamat' WHERE id_user='$id_user'");
		}
	}
	function ubahpassword($passlama,$pass,$password)
	{
		$passwordlama= mysqli_real_escape_string($this->koneksi,$passlama);
		$sip = sha1($passwordlama);
		$ambil = $this->koneksi->query("SELECT * FROM tbl_user WHERE password='$sip'");
		$yangcocok=$ambil->num_rows;
		if ($yangcocok > 0 && strlen($pass) >= 8 && $pass == $password) 
		{
			$pass = sha1($pass);
			$this->koneksi->query("UPDATE tbl_user SET password='$pass' ");
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}

	function totuser()
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_user");
		$pecah = $ambil->num_rows;
		return $pecah;
	}

	function delete($id_user)
	{
		$detail = $this->detail($id_user);
		if (!empty($detail['foto'])) 
		{
			unlink('../media/upload-user/'.$detail['foto']);
		}
		$this->koneksi->query("DELETE FROM tbl_user WHERE id_user='$id_user'");
	}
}

class promo
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function get_promo($kode)
	{

		$ambil = $this->koneksi->query("SELECT * FROM tbl_promo WHERE kode_promo='$kode'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function show()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_promo ORDER BY id_promo DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function add($kode,$tgl,$diskon,$foto,$ket)
	{
		
		$namagambar=$foto['name'];
		$lokasi=$foto['tmp_name'];
		move_uploaded_file($lokasi, "../promo/$namagambar");
		$this->koneksi->query("INSERT INTO tbl_promo (kode_promo,tgl_promo,diskon,foto_promo,keterangan) VALUES ('$kode','$tgl','$diskon','$namagambar','$ket')");
		return "sukses";
	}

	function delete($id_promo)
	{
		
		$this->koneksi->query("DELETE FROM tbl_promo WHERE id_promo='$id_promo'");
	}
}

class pelanggan
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function detail($id_pelanggan)
	{

		$ambil = $this->koneksi->query("SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$id_pelanggan'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function show()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_pelanggan ORDER BY id_pelanggan DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function login($email,$password)
	{
		$email = mysqli_real_escape_string($this->koneksi,$email);
		$password= mysqli_real_escape_string($this->koneksi,$password);
		$enpass=sha1($password);
		$ambil = $this->koneksi->query("SELECT * FROM tbl_pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$enpass'");
		$yangcocok=$ambil->num_rows;
		if ($yangcocok==1) 
		{
			$akun=$ambil->fetch_assoc();

			$_SESSION["pelanggan"]=$akun;
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}

	function daftar($nama,$email,$password,$telepon,$alamat)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_pelanggan WHERE email_pelanggan='$email'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok==1) 
		{
			return "gagal";
		}
		else
		{
			$enpass=sha1($password);
			$this->koneksi->query("INSERT INTO tbl_pelanggan (nama_pelanggan,email_pelanggan,password_pelanggan,telepon_pelanggan,alamat_pelanggan) VALUES ('$nama','$email','$enpass','$telepon','$alamat')");
			return "sukses";
		}
	}

	function delete($id_pelanggan)
	{
		$detail = $this->detail($id_pelanggan);
		if (!empty($detail['foto_pelanggan'])) 
		{
			unlink('../media/upload-pelanggan/'.$detail['foto_pelanggan']);
		}
		$this->koneksi->query("DELETE FROM tbl_pelanggan WHERE id_pelanggan='$id_pelanggan'");
	}

	function totpelanggan()
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_pelanggan");
		$pecah = $ambil->num_rows;
		return $pecah;
	}

	function ubah_profil($nama_pelanggan,$email_pelanggan,$telepon_pelanggan,$foto_pelanggan,$alamat_pelanggan,$id_pelanggan)
	{
		$namagambar=$foto_pelanggan['name'];
		$lokasi=$foto_pelanggan['tmp_name'];
		if (!empty($namagambar)) 
		{
			$detail = $this->detail($id_pelanggan);
			if (!empty($detail['foto_pelanggan'])) 
			{
				unlink('media/upload-pelanggan/'.$detail['foto_pelanggan']);
			}
			move_uploaded_file($lokasi, "media/upload-pelanggan/$namagambar");
			$this->koneksi->query("UPDATE tbl_pelanggan SET nama_pelanggan='$nama_pelanggan', email_pelanggan='$email_pelanggan', telepon_pelanggan='$telepon_pelanggan', foto_pelanggan='$namagambar', alamat_pelanggan='$alamat_pelanggan' WHERE id_pelanggan='$id_pelanggan'");
		}
		else
		{
			$this->koneksi->query("UPDATE tbl_pelanggan SET nama_pelanggan='$nama_pelanggan', email_pelanggan='$email_pelanggan', telepon_pelanggan='$telepon_pelanggan', alamat_pelanggan='$alamat_pelanggan' WHERE id_pelanggan='$id_pelanggan'");
		}
	}
	function ubahpassword($passlama,$pass,$password)
	{
		$passwordlama= mysqli_real_escape_string($this->koneksi,$passlama);
		$sip = sha1($passwordlama);
		$ambil = $this->koneksi->query("SELECT * FROM tbl_pelanggan WHERE password_pelanggan='$sip'");
		$yangcocok=$ambil->num_rows;
		if ($yangcocok > 0 && strlen($pass) >= 8 && $pass == $password) 
		{
			$pass = sha1($pass);
			$this->koneksi->query("UPDATE tbl_pelanggan SET password_pelanggan='$pass' ");
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}
	function lupa_password($email)
	{
		$ambil=$this->koneksi->query("SELECT*FROM tbl_pelanggan WHERE email_pelanggan='$email'");
		$yangcocok=$ambil->num_rows;
		if ($yangcocok<1) 
		{
			return "gagal";
		}
		else
		{
				// membuat password secara random
			$karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$pjg=strlen($karakter);
			$password = '';
			for ($i = 0; $i<8; $i++) {
				$password .= $karakter[rand(0, $pjg-1)];
			}
				// mengirim password ke email

			require_once('function.php');
			require_once('fungsi.php');
			$to       = $email;
			$subject  = 'Info Akun UD. Anak Tani';
			$message  = '
			<!doctype html>
			<html>
			<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

			<title>A simple, clean, and responsive HTML invoice template</title>

			<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, .15);
				font-size: 16px;
				line-height: 24px;
				font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}
			.invoice-box table tr.top table td.invoice {
				float: right;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}
			.invoice-box table tr.information table .informasi {
				float: right;
			}

			.invoice-box table tr.heading th {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item th{
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.rtl {
				direction: rtl;
				font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
			}

			.rtl table {
				text-align: right;
			}

			.rtl table tr td:nth-child(2) {
				text-align: left;
			}
			.table1 {
				font-family: sans-serif;
				color: #232323;
				border-collapse: collapse;
			}

			.table1, th, td {
				padding: 8px 20px;
			}
			</style>
			</head>

			<body>
			<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
			<tr class="top">
			<td colspan="2">
			<table>
			<tr>
			<td class="title" >
			<h5 style="margin-top: -7px;">UD. Tani Maju</h5>
			</td>

			<td class="invoice">
			Telp : +62 823-4959-1905 <br>
			Email : info@tanimajuyogyakarta.com<br>
			Alamat : Jl. Magelang KM.5,6 No.63, Kutu Tegal, <br> Sinduadi, Kec. Mlati, Kabupaten Sleman, <br> Daerah Istimewa Yogyakarta 55284
			</td>
			</tr>
			</table>
			</td>
			</tr>
			</table>
			<br><br>
			<h5 style="margin-top: -30px;">Selamat datang , Atas permintaan anda kami telah mereset password anda.
			Silahkan gunakan akun dibawah ini untuk login ke</h5>
			<table class="table1">
			<tr class="heading">
			<th>Email</th>
			<th>Password</th>
			</tr>
			<tr class="item">
			<th>'.$email.'</th>
			<th>'.$password.'</th>
			</tr>
			</table>
			</div>
			</body>
			</html>
			';
			smtp_mail($to, $subject, $message, '', '', 0, 0, true);
			$enpass=sha1($password);
			$this->koneksi->query("UPDATE tbl_pelanggan SET password_pelanggan='$enpass' WHERE email_pelanggan='$email'");
			return "sukses";
		}
	}
}

class pembelian
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function detail($id_pengiriman)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_data_pengiriman WHERE id_pengiriman='$id_pengiriman'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function detail_pembelian($id_pengiriman)
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_pembelian tpb LEFT JOIN tbl_produk tp ON tpb.id_produk=tp.id_produk  WHERE id_pengiriman='$id_pengiriman'");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function list_return()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_return tr LEFT JOIN tbl_data_pengiriman td ON tr.id_pengiriman=td.id_pengiriman LEFT JOIN tbl_pelanggan tp ON td.id_pelanggan=tp.id_pelanggan ");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function list_return_r($bulan,$tahun)
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_return tr LEFT JOIN tbl_data_pengiriman td ON tr.id_pengiriman=td.id_pengiriman LEFT JOIN tbl_pelanggan tp ON td.id_pelanggan=tp.id_pelanggan WHERE month(td.tanggal_pembelian)='$bulan' AND year(td.tanggal_pembelian)='$tahun'");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function return($jenis,$bukti,$alasan,$id_pengiriman)
	{
		$namagambar=$bukti['name'];
		$lokasi=$bukti['tmp_name'];
		$tglkonfirmasi = date('Y-m-d');
		$status = "Return Barang";
		move_uploaded_file($lokasi, "media/upload-return/$namagambar");
		$this->koneksi->query("INSERT INTO tbl_return (id_pengiriman,alasan,bukti,jenis_retur,status) VALUES ('$id_pengiriman','$alasan','$namagambar','$jenis','Pending')");
		$this->koneksi->query("UPDATE tbl_data_pengiriman SET status_pembelian='$status' WHERE id_pengiriman='$id_pengiriman'");
		$this->koneksi->query("UPDATE tbl_notifikasi SET status='0' WHERE id_pengiriman='$id_pengiriman'");
	}

	function setujui_return($id,$id_p)
	{
		$status = 'Barang return disetujui';
		$status_r = 'Disetujui';
		$this->koneksi->query("UPDATE tbl_return SET status='$status_r' WHERE id_retur='$id'");
		$this->koneksi->query("UPDATE tbl_data_pengiriman SET status_pembelian='$status' WHERE id_pengiriman='$id_p'");
		$this->koneksi->query("UPDATE tbl_notifikasi SET status='0' WHERE id_pengiriman='$id_p'");
	}

	function tolak_return($id,$id_p)
	{
		$status = 'Barang return ditolak';
		$status_r = 'Ditolak';
		$this->koneksi->query("UPDATE tbl_return SET status='$status_r' WHERE id_retur='$id'");
		$this->koneksi->query("UPDATE tbl_data_pengiriman SET status_pembelian='$status' WHERE id_pengiriman='$id_p'");
		$this->koneksi->query("UPDATE tbl_notifikasi SET status='0' WHERE id_pengiriman='$id_p'");
	}

	function masukankeranjang($jumlah,$id_produk)
	{
		if (isset($_SESSION["keranjang"][$id_produk])){
			$_SESSION["keranjang"][$id_produk]+=$jumlah;
		}
		else{
			$_SESSION["keranjang"][$id_produk]=$jumlah;
		}
	}
	function tampilkeranjang()
	{
		$semuadata=array();
		if (isset($_SESSION["keranjang"])) {
			$keranjang=$_SESSION["keranjang"];	
			foreach ($keranjang as $id_produk => $jumlah) {
				$ambil=$this->koneksi->query("SELECT * FROM tbl_produk WHERE id_produk='$id_produk'");
				$array=$ambil->fetch_assoc();
				$array["jumlah"]=$jumlah;
				$array["subharga"]=$array["harga_produk"]*$jumlah;
				$array["subberat"]=$array["berat_produk"]*$jumlah;
				$semuadata[]=$array;
			}
		}
		return $semuadata;
	}
	function totkeranjang()
	{
		if (isset($_SESSION["keranjang"])) {
			$keranjang=$_SESSION["keranjang"];
			$items_in_cart = count($keranjang);
			return $items_in_cart;
		}
	}

	function checkout($nama_penerima,$telepon_penerima,$alamat,$catatan,$total_belanja,$total_berat,$nama_provinsi,$nama_kota,$tipe,$kode_pos,$nama_ekspedisi,$nama_paket,$biaya_paket,$lama_paket,$total_bayar,$total_promo)
	{
		$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
		date_default_timezone_set('Asia/Jakarta');
		$tglbeli = date('Y-m-d H:i:s');
		$expires = strtotime('+1 days', strtotime($tglbeli));
		$deadline=date('Y-m-d H:i:s', $expires);
		$status_pembelian="Belum Bayar";
		$status_notifikasi='0';
		$total_pembelian=$total_belanja+$biaya_paket;

		$this->koneksi->query("INSERT INTO tbl_data_pengiriman
			(id_pelanggan,
			tanggal_pembelian,
			deadline_pembayaran,
			status_pembelian,
			promo,
			total_belanja,
			total_ongkir,
			total_pembelian,
			catatan,
			provinsi,
			distrik,
			tipe,
			kodepos_pengiriman,
			ekspedisi_pengiriman,
			paket_pengiriman,
			lama_pengiriman,
			nama_penerima,
			telepon_penerima,
			alamat_penerima) 
			VALUES (
			'$id_pelanggan',
			'$tglbeli',
			'$deadline',
			'$status_pembelian',
			'$total_promo',
			'$total_belanja',
			'$biaya_paket',
			'$total_bayar',
			'$catatan',
			'$nama_provinsi',
			'$nama_kota',
			'$tipe',
			'$kode_pos',
			'$nama_ekspedisi',
			'$nama_paket',
			'$lama_paket',
			'$nama_penerima',
			'$telepon_penerima',
			'$alamat')")or die(mysqli_error($this->koneksi));
		
		$id_pembelian_barusan = $this->koneksi->insert_id;
		$datakeranjang=$this->tampilkeranjang();
		foreach ($datakeranjang as $key => $perproduk) 
		{
			$id_produk = $perproduk["id_produk"];
			$nama      = $perproduk["nama_produk"];
			$harga     = $perproduk["harga_produk"];
			$berat     = $perproduk["berat_produk"];
			$jumlah    = $perproduk["jumlah"];
			$subberat  = $perproduk["subberat"];
			$subharga  = $perproduk["subharga"];
			$this->koneksi->query("INSERT INTO tbl_pembelian(id_pengiriman,id_produk,nama_produk,harga_produk,berat_produk,jumlah_produk,subberat_produk,subharga_produk) 
				VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$jumlah','$subberat','$subharga')")or die(mysqli_error($this->koneksi));
		}
		$this->koneksi->query("INSERT INTO tbl_notifikasi (id_pengiriman,id_pelanggan,status) 
			VALUES ('$id_pembelian_barusan','$id_pelanggan','$status_notifikasi')")or die(mysqli_error($this->koneksi));
		unset($_SESSION["keranjang"]);
		return $id_pembelian_barusan;
	}

	function tampil_pembelian()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_data_pengiriman JOIN tbl_pelanggan ON tbl_data_pengiriman.id_pelanggan=tbl_pelanggan.id_pelanggan ORDER BY tbl_data_pengiriman.id_pengiriman DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function tampil_laba()
	{
		$semuadata = array();
		date_default_timezone_set('Asia/Makassar');
		$now = date('m');
		$ambil = $this->koneksi->query("SELECT * FROM tbl_data_pengiriman JOIN tbl_pelanggan ON tbl_data_pengiriman.id_pelanggan=tbl_pelanggan.id_pelanggan WHERE month(tanggal_pembelian)='$now' ORDER BY tbl_data_pengiriman.id_pengiriman DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function tampil_pembelian_pelanggan($id_pelanggan)
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_data_pengiriman WHERE id_pelanggan='$id_pelanggan'");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function cek_status_pembayaran($id_pengiriman)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_pembayaran WHERE id_pengiriman='$id_pengiriman'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok > 0) 
		{
			$semuadata = array();
			while ($pecahdata=$ambil->fetch_assoc()) 
			{
				$semuadata[]=$pecahdata;
			}
			return $semuadata;
		}
		else
		{
			return "belumkirim";
		}
	}

	function unggahbukti($bukti,$id_pengiriman)
	{
		$namagambar=$bukti['name'];
		$lokasi=$bukti['tmp_name'];
		$tglkonfirmasi = date('Y-m-d');
		$status = "Menunggu Konfirmasi";
		move_uploaded_file($lokasi, "media/upload-bukti/$namagambar");
		$this->koneksi->query("INSERT INTO tbl_pembayaran (id_pengiriman,tgl_konfirmasi,bukti) VALUES ('$id_pengiriman','$tglkonfirmasi','$namagambar')");
		$this->koneksi->query("UPDATE tbl_data_pengiriman SET status_pembelian='$status' WHERE id_pengiriman='$id_pengiriman'");
		$this->koneksi->query("UPDATE tbl_notifikasi SET status='0' WHERE id_pengiriman='$id_pengiriman'");
	}

	function unggahbukti2($bukti,$id_pengiriman)
	{
		$namagambar=$bukti['name'];
		$lokasi=$bukti['tmp_name'];
		$tglkonfirmasi = date('Y-m-d');
		$status = "Menunggu Konfirmasi Ulang";
		move_uploaded_file($lokasi, "media/upload-bukti/$namagambar");
		$this->koneksi->query("INSERT INTO tbl_pembayaran (id_pengiriman,tgl_konfirmasi,bukti) VALUES ('$id_pengiriman','$tglkonfirmasi','$namagambar')");
		$this->koneksi->query("UPDATE tbl_data_pengiriman SET status_pembelian='$status' WHERE id_pengiriman='$id_pengiriman'");
		$this->koneksi->query("UPDATE tbl_notifikasi SET status='0' WHERE id_pengiriman='$id_pengiriman'");
	}

	function ambil_produk($id_produk)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_produk WHERE id_produk='$id_produk'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function terima_pembayaran($id_pengiriman)
	{
		$tgl_verifikasi = date('Y-m-d');
		$status = "Dikemas";
		$detail_pembelian = $this->detail_pembelian($id_pengiriman);
		foreach ($detail_pembelian as $key => $value) 
		{
			$id_produk = $value['id_produk'];
			$data_produk = $this->ambil_produk($id_produk);
			$stok_produk = $data_produk['stok'];
			$terjual = $data_produk['terjual'];
			$jumlah_produk = $value['jumlah_produk'];
			$terjual_baru  = $terjual+$jumlah_produk;
			$stok_baru = $stok_produk-$jumlah_produk;

			$this->koneksi->query("UPDATE tbl_produk SET stok='$stok_baru',terjual='$terjual_baru' WHERE id_produk='$id_produk'");
		}
		$this->koneksi->query("UPDATE tbl_data_pengiriman SET status_pembelian='$status' WHERE id_pengiriman='$id_pengiriman'");
		$this->koneksi->query("UPDATE tbl_pembayaran SET tgl_verifikasi='$tgl_verifikasi' WHERE id_pengiriman='$id_pengiriman'");
		$this->koneksi->query("UPDATE tbl_notifikasi SET status='0' WHERE id_pengiriman='$id_pengiriman'");
	}

	function nomor_resi($nomor_resi,$id_pengiriman)
	{
		$tgl_pengiriman = date('Y-m-d H:i:s');
		$status = "Dikirim";
		$this->koneksi->query("UPDATE tbl_data_pengiriman SET status_pembelian='$status', tanggal_pengiriman='$tgl_pengiriman',resi_pengiriman='$nomor_resi' WHERE id_pengiriman='$id_pengiriman'");
		$this->koneksi->query("UPDATE tbl_notifikasi SET status='0' WHERE id_pengiriman='$id_pengiriman'");
	}

	function cek_penilaian($id_pengiriman)
	{
		$ambil=$this->koneksi->query("SELECT * FROM tbl_testimoni WHERE id_pengiriman='$id_pengiriman'");
		$yangcocok=$ambil->num_rows;
		if ($yangcocok>0) 
		{
			$pecah=$ambil->fetch_assoc();
			return $pecah;
		}
		else
		{
			return "belumada";
		}
	}

	function penilaian($id_pengiriman,$id_pelanggan,$gambar,$penilaian)
	{
		$status = "Selesai";
		$tanggal_diterima = date('Y-m-d H:i:s');
		$namagambar=$gambar['name'];
		$lokasi=$gambar['tmp_name'];
		move_uploaded_file($lokasi, "./testimoni/$namagambar");
		$this->koneksi->query("INSERT INTO tbl_testimoni (id_pengiriman,id_pelanggan,testimoni,gambar) VALUES ('$id_pengiriman','$id_pelanggan','$penilaian','$namagambar')");
		$this->koneksi->query("UPDATE tbl_data_pengiriman SET status_pembelian='$status', tanggal_diterima='$tanggal_diterima' WHERE id_pengiriman='$id_pengiriman'");
		$this->koneksi->query("UPDATE tbl_notifikasi SET status='0' WHERE id_pengiriman='$id_pengiriman'");
	}

	function tolakpembayaran($alasan,$id_pengiriman)
	{
		$tgl_verifikasi = date('Y-m-d');
		$status = "Pembayaran Ditolak";
		$this->koneksi->query("UPDATE tbl_data_pengiriman SET status_pembelian='$status', alasan_ditolak='$alasan' WHERE id_pengiriman='$id_pengiriman'");
		$this->koneksi->query("UPDATE tbl_notifikasi SET status='0' WHERE id_pengiriman='$id_pengiriman'");
		$this->koneksi->query("UPDATE tbl_pembayaran SET tgl_verifikasi='$tgl_verifikasi' WHERE id_pengiriman='$id_pengiriman'");
	}

	function totpembelian()
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_data_pengiriman WHERE status_pembelian='Selesai'");
		$pecah = $ambil->num_rows;
		return $pecah;
	}

	function totsemuapembelian()
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_data_pengiriman");
		$pecah = $ambil->num_rows;
		return $pecah;
	}

	function tampilnotifikasi()
	{
		$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
		$ambil=$this->koneksi->query("SELECT * FROM tbl_notifikasi WHERE id_pelanggan='$id_pelanggan' ");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}

	function totalnotifikasi($id_pelanggan)
	{
		$ambil=$this->koneksi->query("SELECT*FROM tbl_notifikasi WHERE id_pelanggan='$id_pelanggan' AND status='0' ");
		$hitung=$ambil->num_rows;
		return $hitung;
	}
}

class kategori
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function detail($id_kategori)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_kategori WHERE id_kategori='$id_kategori'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function show()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function add($nama_kategori)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_kategori WHERE nama_kategori='$nama_kategori'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok==1) 
		{
			return "gagal";
		}
		else
		{
			$id_user = $_SESSION['user']['id_user'];
			$this->koneksi->query("INSERT INTO tbl_kategori (nama_kategori,id_user) VALUES ('$nama_kategori','$id_user')");
			return "sukses";
		}
	}

	function edit($nama_kategori,$id_kategori)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_kategori WHERE nama_kategori='$nama_kategori'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok==1) 
		{
			return "gagal";
		}
		else
		{
			$id_user = $_SESSION['user']['id_user'];
			$this->koneksi->query("UPDATE tbl_kategori SET nama_kategori='$nama_kategori', id_user='$id_user' WHERE id_kategori='$id_kategori' ");
			return "sukses";
		}
	}

	function delete($id_kategori)
	{
		$this->koneksi->query("DELETE FROM tbl_kategori WHERE id_kategori='$id_kategori'");
	}
}

class produk
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function detail($id_produk)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori WHERE tbl_produk.id_produk='$id_produk'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function show()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori ORDER BY tbl_produk.id_produk DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function add($id_kategori,$nama_produk,$harga_produk,$berat_produk,$gambar_produk,$stok,$deskripsi_produk)
	{
		$id_user = $_SESSION['user']['id_user'];
		$namagambar=$gambar_produk['name'];
		$lokasi=$gambar_produk['tmp_name'];
		$ambil = $this->koneksi->query("SELECT * FROM tbl_produk WHERE nama_produk='$nama_produk'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok > 0) 
		{
			return "gagal";
		}
		else
		{
			move_uploaded_file($lokasi, "../media/upload-produk/$namagambar");
			$this->koneksi->query("INSERT INTO tbl_produk (id_kategori,nama_produk,harga_produk,berat_produk,deskripsi_produk,gambar_produk,stok,id_user) VALUES ('$id_kategori','$nama_produk','$harga_produk','$berat_produk','$deskripsi_produk','$namagambar','$stok','$id_user')")or die(mysqli_error($this->koneksi));
			return "sukses";
		}
		
	}

	function edit($id_kategori,$nama_produk,$harga_produk,$berat_produk,$gambar_produk,$stok,$deskripsi_produk,$id_produk)
	{
		$id_user = $_SESSION['user']['id_user'];
		$namagambar=$gambar_produk['name'];
		$lokasi=$gambar_produk['tmp_name'];
		if (!empty($namagambar)) 
		{
			$detail = $this->detail($id_produk);
			if (!empty($detail['gambar_produk'])) 
			{
				unlink('../media/upload-produk/'.$detail['gambar_produk']);
			}
			move_uploaded_file($lokasi, "../media/upload-produk/$namagambar");
			$this->koneksi->query("UPDATE tbl_produk SET id_kategori='$id_kategori', nama_produk='$nama_produk', harga_produk='$harga_produk', berat_produk='$berat_produk', deskripsi_produk='$deskripsi_produk', gambar_produk='$namagambar', stok='$stok', id_user='$id_user' WHERE id_produk='$id_produk'");
		}
		else
		{
			$this->koneksi->query("UPDATE tbl_produk SET id_kategori='$id_kategori', nama_produk='$nama_produk', harga_produk='$harga_produk', berat_produk='$berat_produk', deskripsi_produk='$deskripsi_produk', stok='$stok', id_user='$id_user' WHERE id_produk='$id_produk'");
		}
		
	}

	function delete($id_produk)
	{
		$this->koneksi->query("DELETE FROM tbl_produk WHERE id_produk='$id_produk'")or die(mysqli_error($this->koneksi));
	}

	function cariproduk($keyword,$posisi,$batas)
	{
		$keyword=mysqli_real_escape_string($this->koneksi,$keyword);
		$data=array();
		$ambil=$this->koneksi->query("SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori  WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '$$keyword' ORDER BY id_produk DESC LIMIT $posisi,$batas");
		while ($pecah=$ambil->fetch_assoc()) 
		{
			$data[]=$pecah;
		}
		return $data;
	}

	function semuaprodukcari($keyword){
		$data=$this->koneksi->query("SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori  WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '$$keyword'");
		$total=$data->num_rows;
		return $total;
	}

	function tampilprodukterbaru($posisi,$batas)
	{
		$semuadata = array();
	// menampilkan data dari database
		$ambildata=$this->koneksi->query("SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori  ORDER BY tbl_produk.id_produk DESC LIMIT $posisi,$batas")or die(mysqli_error($this->koneksi));
	// memecah array dan diperulangkan
		while($pecahdata=$ambildata->fetch_assoc())
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;	
	}
	function total_produk()
	{
		$ambil=$this->koneksi->query("SELECT * FROM tbl_produk");
		$hitung=$ambil->num_rows;
		return $hitung;
	}

	function produkkategori($id_kategori,$posisi,$batas){
		$semuadata=array();
		$ambildata=$this->koneksi->query("SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori WHERE tbl_produk.id_kategori='$id_kategori' ORDER BY id_produk DESC LIMIT $posisi,$batas ");
		while ($pecah=$ambildata->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}

	function semuaproduk($id_kategori){
		$data=$this->koneksi->query("SELECT * FROM tbl_produk WHERE id_kategori='$id_kategori'");
		$total=$data->num_rows;
		return $total;
	}

	function totproduk()
	{
		$data=$this->koneksi->query("SELECT * FROM tbl_produk");
		$total=$data->num_rows;
		return $total;
	}

	function gambarproduk($id_produk)
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_produk JOIN tbl_gambar ON tbl_produk.id_produk=tbl_gambar.id_produk WHERE tbl_gambar.id_produk='$id_produk'");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function unggahgambar($judul,$gambar_produk,$id_produk)
	{
		$namagambar=$gambar_produk['name'];
		$lokasi=$gambar_produk['tmp_name'];
		move_uploaded_file($lokasi, "../media/upload-gambar/$namagambar");
		$this->koneksi->query("INSERT INTO tbl_gambar (id_produk,judul,gambar) VALUES ('$id_produk','$judul','$namagambar')")or die(mysqli_error($this->koneksi));
	}

	function detailgambar($id_gambar)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_gambar WHERE id_gambar='$id_gambar'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function hapusgambar($id_gambar)
	{
		$detail = $this->detail($id_gambar);
		unlink('../media/upload-gambar/'.$detail['gambar']);
		$this->koneksi->query("DELETE FROM tbl_gambar WHERE id_gambar='$id_gambar'");
	}

}

class stok
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function show()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_produk LEFT JOIN tbl_stok ON tbl_produk.id_produk=tbl_stok.id_produk ORDER BY tbl_produk.id_produk DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

}

class pengadaan
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function detail($id_pengadaan)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_pengadaan_produk WHERE id_pengadaan='$id_pengadaan'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function show_detail($id_pengadaan)
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_pengadaan_produk_detail WHERE id_pengadaan='$id_pengadaan'");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function show()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_pengadaan_produk ORDER BY tbl_pengadaan_produk.id_pengadaan DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function kode()
	{
		$ambil = $this->koneksi->query("SELECT * FROM max(nomor_transaksi) as maxKode FROM tbl_pengadaan_produk");
		$kodeBarang = $ambil['maxKode'];
		$noUrut = (int) substr($kodeBarang, 3, 3);
		$noUrut++;
		$char = "PBRG-";
		$kodeBarang = $char . sprintf("%03s", $noUrut);
		return $kodeBarang;
	}

	function keranjangmasuk($id_produk,$jumlah,$beli)
	{
		if (isset($_SESSION["keranjang"][$id_produk]))
		{
			$_SESSION["keranjang"][$id_produk]=array(
				'jumlah'	=> $jumlah,
				'harga_beli'=> $beli,
				'subharga'	=> $jumlah*$beli
			);
		}
		else{
			$_SESSION["keranjang"][$id_produk]=array(
				'jumlah'	=> $jumlah,
				'harga_beli'=> $beli,
				'subharga'	=> $jumlah*$beli
			);
		}
	}

	function tampil_keranjang(){
		$semuadata=array();
		if (isset($_SESSION["keranjang"])) {
			$keranjang=$_SESSION["keranjang"];
			foreach ($keranjang as $id_produk => $jumlah) {
				$ambil=$this->koneksi->query("SELECT * FROM tbl_produk 
					JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori
					WHERE tbl_produk.id_produk='$id_produk'");
				$array=$ambil->fetch_assoc();
				$array["transaksi"]=$jumlah;
				$semuadata[]=$array;
			}
		}
		return $semuadata;
	}

	function transaksi_masuk($nama_supplier,$kode,$tgl_masuk,$total_belanja){

		$this->koneksi->query("INSERT INTO tbl_pengadaan_produk (nomor_transaksi,nama_supplier,total,tanggal_transaksi)
			VALUES ('$kode','$nama_supplier','$total_belanja','$tgl_masuk')");

		$id_pengadaan_barusan=$this->koneksi->insert_id;
		$datakeranjang=$this->tampil_keranjang();
		foreach ($datakeranjang as $key => $value) {
			$id_produk 		= $value['id_produk'];
			$nama_produk	= $value['nama_produk'];
			$nama_kategori	= $value['nama_kategori'];
			$jumlah			= $value['transaksi']['jumlah'];
			$harga_beli		= $value['transaksi']['harga_beli'];
			$subtotal		= $jumlah*$harga_beli;
			$stok 			= $value['stok'];
			$stokbaru 		= $stok+$jumlah;
			$this->koneksi->query("INSERT INTO tbl_pengadaan_produk_detail (id_pengadaan,nama_produk,nama_kategori,jumlah,harga_beli,subtotal)
				VALUES ('$id_pengadaan_barusan','$nama_produk','$nama_kategori','$jumlah','$harga_beli','$subtotal')");
			$this->koneksi->query("UPDATE tbl_produk SET harga_produk='$harga_beli' ,stok='$stokbaru' WHERE id_produk='$id_produk'");
		}
		unset($_SESSION['keranjang']);
	}
}

class penjualan
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function detail($id_pengadaan)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_pengadaan_produk WHERE id_pengadaan='$id_pengadaan'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function show_detail($id_pengadaan)
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_pengadaan_produk_detail WHERE id_pengadaan='$id_pengadaan'");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function show()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_data_pengiriman WHERE id_pelanggan=''");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function kode()
	{
		$ambil = $this->koneksi->query("SELECT * FROM max(nomor_transaksi) as maxKode FROM tbl_pengadaan_produk");
		$kodeBarang = $ambil['maxKode'];
		$noUrut = (int) substr($kodeBarang, 3, 3);
		$noUrut++;
		$char = "PBRG";
		$kodeBarang = $char . sprintf("%03s", $noUrut);
		return $kodeBarang;
	}

	function keranjangmasuk($id_produk,$jumlah,$beli)
	{
		if (isset($_SESSION["keranjang"][$id_produk]))
		{
			$_SESSION["keranjang"][$id_produk]=array(
				'jumlah'	=> $jumlah,
				'harga_beli'=> $beli,
				'subharga'	=> $jumlah*$beli
			);
		}
		else{
			$_SESSION["keranjang"][$id_produk]=array(
				'jumlah'	=> $jumlah,
				'harga_beli'=> $beli,
				'subharga'	=> $jumlah*$beli
			);
		}
	}

	function tampil_keranjang(){
		$semuadata=array();
		if (isset($_SESSION["keranjang"])) {
			$keranjang=$_SESSION["keranjang"];
			foreach ($keranjang as $id_produk => $jumlah) {
				$ambil=$this->koneksi->query("SELECT * FROM tbl_produk 
					JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori
					WHERE tbl_produk.id_produk='$id_produk'");
				$array=$ambil->fetch_assoc();
				$array["transaksi"]=$jumlah;
				$semuadata[]=$array;
			}
		}
		return $semuadata;
	}

	function transaksi_masuk($tgl_masuk,$total_belanja){

		$this->koneksi->query("INSERT INTO tbl_data_pengiriman (tanggal_pembelian,status_pembelian,total_pembelian)
			VALUES ('$tgl_masuk','Selesai','$total_belanja')");

		$id_pengadaan_barusan=$this->koneksi->insert_id;
		$datakeranjang=$this->tampil_keranjang();
		foreach ($datakeranjang as $key => $value) {
			$id_produk 		= $value['id_produk'];
			$nama_produk	= $value['nama_produk'];
			$harga_produk	= $value['harga_produk'];
			$berat_produk	= $value['berat_produk'];
			$nama_kategori	= $value['nama_kategori'];
			$jumlah			= $value['transaksi']['jumlah'];
			$harga_beli		= $value['transaksi']['harga_beli'];
			$subtotal		= $value['harga_produk']*$harga_beli;
			$this->koneksi->query("INSERT INTO tbl_pembelian (id_pengiriman,id_produk,nama_produk,harga_produk,berat_produk,jumlah_produk,subberat_produk,subharga_produk)
				VALUES ('$id_pengadaan_barusan','$id_produk','$nama_produk','$harga_produk','$berat_produk','$jumlah','$berat_produk','$subtotal')");
			
		}
		unset($_SESSION['keranjang']);
	}
}

class bank
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function detail($id_bank)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_bank WHERE tbl_bank.id_bank='$id_bank'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function show()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_bank ORDER BY id_bank DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function add($nama_pemilik,$bank,$norek,$logo)
	{
		$id_user = $_SESSION['user']['id_user'];
		$ambil = $this->koneksi->query("SELECT * FROM tbl_bank WHERE nomor_rekening='$norek'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok==1) 
		{
			return "gagal";
		}
		else
		{
			$namagambar=$logo['name'];
			$lokasi=$logo['tmp_name'];
			move_uploaded_file($lokasi, "../media/upload-bank/$namagambar");
			$this->koneksi->query("INSERT INTO tbl_bank (nama_pemilik_rekening,nama_bank,nomor_rekening,logo_bank,id_user) VALUES ('$nama_pemilik','$bank','$norek','$namagambar','$id_user')");
			return "sukses";

		}
	}

	function edit($nama_pemilik,$bank,$norek,$logo,$id_bank)
	{
		$id_user = $_SESSION['user']['id_user'];
		$namagambar=$logo['name'];
		$lokasi=$logo['tmp_name'];
		if (!empty($namagambar)) 
		{
			$detail = $this->detail($id_bank);
			if (!empty($detail['logo_bank'])) 
			{
				unlink('../media/upload-bank/'.$detail['logo_bank']);
			}
			move_uploaded_file($lokasi, "../media/upload-bank/$namagambar");
			$this->koneksi->query("UPDATE tbl_bank SET nama_pemilik_rekening='$nama_pemilik', nama_bank='$bank', nomor_rekening='$norek', logo_bank='$namagambar', id_user='$id_user' WHERE id_bank='$id_bank'")or die(mysqli_error($this->koneksi));
		}
		else
		{
			$this->koneksi->query("UPDATE tbl_bank SET nama_pemilik_rekening='$nama_pemilik', nama_bank='$bank', nomor_rekening='$norek' , id_user='$id_user' WHERE id_bank='$id_bank'")or die(mysqli_error($this->koneksi));
		}
	}

	function delete($id_bank)
	{
		$detail = $this->detail($id_bank);
		if (!empty($detail['logo_bank'])) 
		{
			unlink('../media/upload-bank/'.$detail['logo_bank']);
		}
		$this->koneksi->query("DELETE FROM tbl_bank WHERE id_bank='$id_bank'");
	}
}

class instansi
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function detail()
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_instansi WHERE id_instansi='1' ");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function logo()
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_logo WHERE id='1' ");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function banner()
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_banner WHERE id='1' ");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function editlogo($id,$logo_instansi)
	{

		$namagambar=$logo_instansi['name'];
		$lokasi=$logo_instansi['tmp_name'];
		move_uploaded_file($lokasi, "../media/upload-instansi/$namagambar");
		$this->koneksi->query("UPDATE tbl_logo SET gambar='$namagambar' WHERE id='$id'");
	}

	function editbanner($id,$logo_instansi)
	{

		$namagambar=$logo_instansi['name'];
		$lokasi=$logo_instansi['tmp_name'];
		move_uploaded_file($lokasi, "../media/upload-instansi/$namagambar");
		$this->koneksi->query("UPDATE tbl_banner SET gambar='$namagambar' WHERE id='$id'");
	}

	function edit($id_instansi,$nama_instansi,$pimpinan_instansi,$email_instansi,$telepon_instansi,$facebook,$instagram,$website,$logo_instansi,$alamat_instansi,$maps,$tentang)
	{
		$id_user = $_SESSION['user']['id_user'];
		$namagambar=$logo_instansi['name'];
		$lokasi=$logo_instansi['tmp_name'];
		if (!empty($namagambar)) 
		{
			$detail = $this->detail();
			if (!empty($detail['logo_instansi'])) 
			{
				unlink('../media/upload-instansi/'.$detail['logo_instansi']);
			}
			move_uploaded_file($lokasi, "../media/upload-instansi/$namagambar");
			$this->koneksi->query("UPDATE tbl_instansi SET nama_instansi='$nama_instansi', pimpinan_instansi='$pimpinan_instansi', email_instansi='$email_instansi', telepon_instansi='$telepon_instansi', facebook='$facebook', instagram='$instagram', website='$website', logo_instansi='$namagambar', alamat_instansi='$alamat_instansi', maps='$maps', tentang='$tentang', id_user='$id_user' WHERE id_instansi='$id_instansi'");
		}
		else
		{
			$this->koneksi->query("UPDATE tbl_instansi SET nama_instansi='$nama_instansi', pimpinan_instansi='$pimpinan_instansi', email_instansi='$email_instansi', telepon_instansi='$telepon_instansi', facebook='$facebook', instagram='$instagram', website='$website', alamat_instansi='$alamat_instansi', maps='$maps', tentang='$tentang', id_user='$id_user' WHERE id_instansi='$id_instansi'");
		}
	}
}

class testimoni
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function show()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_testimoni JOIN tbl_pelanggan ON tbl_testimoni.id_pelanggan=tbl_pelanggan.id_pelanggan ORDER BY tbl_testimoni.id_testimoni DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	
	function penjualan()
	{
		$penjualan = array();
		for($bulan = 1;$bulan < 13;$bulan++)
		{
			$ambil = $this->koneksi->query("SELECT * FROM tbl_data_pengiriman WHERE month(tanggal_pembelian)='$bulan'");
			$pecahdata=$ambil->num_rows;
			$penjualan[] = $pecahdata;

		}

		return $penjualan;
	}

	function pembelian()
	{
		$penjualan = array();
		for($bulan = 1;$bulan < 13;$bulan++)
		{
			$ambil = $this->koneksi->query("SELECT * FROM tbl_pengadaan_produk WHERE month(tanggal_transaksi)='$bulan'");
			$pecahdata=$ambil->num_rows;
			$penjualan[] = $pecahdata;

		}

		return $penjualan;
	}

	function pengeluaran()
	{
		$penjualan = array();
		for($bulan = 1;$bulan < 13;$bulan++)
		{
			$ambil = $this->koneksi->query("SELECT SUM(total) AS tot  FROM tbl_pengadaan_produk WHERE month(tanggal_transaksi)='$bulan'");
			$pecahdata=$ambil->fetch_assoc();
			$penjualan[] = $pecahdata['tot'];

		}

		return $penjualan;
	}

	function pendapatan()
	{
		$penjualan = array();
		for($bulan = 1;$bulan < 13;$bulan++)
		{
			$ambil = $this->koneksi->query("SELECT SUM(total_pembelian) AS tot FROM tbl_data_pengiriman WHERE month(tanggal_pembelian)='$bulan'");
			$pecahdata=$ambil->fetch_assoc();
			$penjualan[] = $pecahdata['tot'];

		}

		return $penjualan;
	}

	function produk()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori ORDER BY tbl_produk.id_produk DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata['nama_produk'];
		}

		return $semuadata;
	}

	function terjual()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori ORDER BY tbl_produk.id_produk DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata['terjual'];
		}

		return $semuadata;
	}
}

class apiongkir
{

	function update_provinsi()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: af4ff3b9eb0ef2b51c5adf77b18dcff2"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} 
		else 
		{
            // echo $response;
            // membuat $response menjadi array
			$dataprovinsi=json_decode($response,TRUE);      
			$dataprovinsi=$dataprovinsi['rajaongkir']['results'];
			return $dataprovinsi;

		}
	}
	function update_kota($id_provinsi)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=&province=$id_provinsi",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: af4ff3b9eb0ef2b51c5adf77b18dcff2"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) 
		{
			echo "cURL Error #:" . $err;
		} 
		else 
		{
            // echo $response;
            // konvert data array
			$datakota=json_decode($response,TRUE);
            // hanya data kota
			$datakota=$datakota['rajaongkir']['results'];
			return $datakota;
		}
	}
	function update_ongkir($id_kota_asal,$id_kota_tujuan,$berat,$ekspedisi)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$id_kota_asal&destination=$id_kota_tujuan&weight=$berat&courier=$ekspedisi",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: af4ff3b9eb0ef2b51c5adf77b18dcff2"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) 
		{
			echo "cURL Error #:" . $err;
		} 
		else 
		{
            // echo $response;
            // konvert data ke array
			$dataongkir=json_decode($response,TRUE);
            // echo "<pre>";
                // print_r($dataongkir);
            // echo "</pre>";
			$dataongkir = $dataongkir['rajaongkir']['results']['0']['costs'];
			return $dataongkir;
		}
	}
}

class laporan
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function laporanterlaris()
	{
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori WHERE terjual!=0 ORDER BY terjual DESC");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}

	function laporantransaksi($bulan,$tahun){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM tbl_data_pengiriman JOIN tbl_pelanggan ON tbl_data_pengiriman.id_pelanggan=tbl_pelanggan.id_pelanggan
			WHERE status_pembelian='Selesai' AND month(tanggal_pembelian)='$bulan' AND year(tanggal_pembelian)='$tahun'");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}

	function laporanpreturn($bulan,$tahun){

		$status = 'Barang return disetujui';

		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM tbl_data_pengiriman JOIN tbl_pelanggan ON tbl_data_pengiriman.id_pelanggan=tbl_pelanggan.id_pelanggan
			WHERE status_pembelian='$status' AND month(tanggal_pembelian)='$bulan' AND year(tanggal_pembelian)='$tahun'");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}

	function laporansuppbln($bulan,$tahun){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM tbl_pengadaan_produk WHERE month(tanggal_transaksi)='$bulan' AND year(tanggal_transaksi)='$tahun'");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}

	function laporansupppertahun($tahun){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM tbl_pengadaan_produk
			WHERE year(tanggal_transaksi)='$tahun'");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}

	function laporanpertahun($tahun){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM tbl_data_pengiriman JOIN tbl_pelanggan ON tbl_data_pengiriman.id_pelanggan=tbl_pelanggan.id_pelanggan
			WHERE status_pembelian='Selesai' AND year(tanggal_pembelian)='$tahun'");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}

	function pengeluaran($bulan,$tahun)
	{
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM tbl_pengadaan_produk WHERE month(tanggal_transaksi)='$bulan' AND year(tanggal_transaksi)='$tahun'");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}

	function pendapatan($bulan,$tahun)
	{
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM tbl_data_pengiriman JOIN tbl_pelanggan ON tbl_data_pengiriman.id_pelanggan=tbl_pelanggan.id_pelanggan
			WHERE status_pembelian='Selesai' AND month(tanggal_pembelian)='$bulan' AND year(tanggal_pembelian)='$tahun'");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
}

class supplier
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function detail($id_supplier)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_supplier WHERE id_supplier='$id_supplier'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}


	function show()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_supplier ORDER BY id_supplier DESC");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function add($nama,$telp,$alamat,$keterangan)
	{
		$id_user = $_SESSION['user']['id_user'];
		$this->koneksi->query("INSERT INTO tbl_supplier (nama_supplier,telepon_supplier,alamat_supplier,keterangan,id_user) VALUES ('$nama','$telp','$alamat','$keterangan','$id_user')");
		return "sukses";
	}

	function edit($nama,$telp,$alamat,$keterangan,$id_supplier)
	{
		$id_user = $_SESSION['user']['id_user'];
		$this->koneksi->query("UPDATE tbl_supplier SET nama_supplier='$nama', telepon_supplier='$telp', alamat_supplier='$alamat', keterangan='$keterangan', id_user='$id_user' WHERE id_supplier='$id_supplier'");
		return "sukses";
	}

	function delete($id_supplier)
	{
		$this->koneksi->query("DELETE FROM tbl_supplier WHERE id_supplier='$id_supplier'");
		return "sukses";
	}
}

$pembelian     = new pembelian($mysqli);
$pelanggan     = new pelanggan($mysqli);
$user 	       = new user($mysqli);
$bank 	   	   = new bank($mysqli);
$kategori 	   = new kategori($mysqli);
$produk 	   = new produk($mysqli);
$stok 	   	   = new stok($mysqli);
$instansi 	   = new instansi($mysqli);
$testimoni 	   = new testimoni($mysqli);
$apiongkir     = new apiongkir();
$laporan 	   = new laporan($mysqli);
$supplier 	   = new supplier($mysqli);
$pengadaan 	   = new pengadaan($mysqli);
$promo 	   = new promo($mysqli);
$penjualan 	   = new penjualan($mysqli);
?>