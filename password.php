<?php
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--
Project      : Data Karyawan CRUD MySQLi (Create, read, Update, Delete) PHP, MySQLi dan Bootstrap
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Karyawan</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="http://www.hakkoblogs.com">Data Karyawan</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="http://www.hakkoblogs.com">Data Karyawan</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="tampawal.php">Master Data</a></li>
					<li><a href="add.php">Tambah Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan &raquo; Ganti Password</h2>
			<hr />
			
			<p>Ganti password karyawan dengan NIK <?php echo '<b>'.$_GET['nik'].'</b>'; ?></p>
			
			<?php
			if(isset($_POST['ganti'])){
				$nik		= $_GET['nik'];
				$password 	= md5($_POST['password']);
				$password1 	= $_POST['password1'];
				$password2 	= $_POST['password2'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik' AND password='$password'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password salah masukan password yang benar</div>';
				}else{
					if($password1 == $password2){
						if(strlen($password1) >= 6){
							$pass = md5($password1);
							$update = mysqli_query($koneksi, "UPDATE karyawan SET password='$pass' WHERE nik='$nik'");
							if($update){
								echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password berhasil dirubah.</div>';
							}else{
								echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password gagal dirubah.</div>';
							}
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Panjang karakter Password minimal 6 karakter.</div>';
						}
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Pasword tidak sama</div>';
					}
				}
			}
			?>
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Password Lama</label>
					<div class="col-sm-4">
						<input type="password" name="password" class="form-control" placeholder="Password Lama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password Baru</label>
					<div class="col-sm-4">
						<input type="password" name="password1" class="form-control" placeholder="Password Baru" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ulangi Password Baru</label>
					<div class="col-sm-4">
						<input type="password" name="password2" class="form-control" placeholder="Ulangi Password baru" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="ganti" class="btn btn-sm btn-info" value="Simpan">
						<a href="tampawal.php" class="btn btn-sm btn-danger"><b>Batal</b></a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>