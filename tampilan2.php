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
					<li class="active"><a href="tampilan2.php">Master Data</a></li>
				</ul>
            <a href ="logout.php" class="btn btn-primary pull-right" onclick="return confirm('Yakin Ingin Logout ?')">Log Out</a>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan</h2>
			<hr />
            
          <form class="form-inline" method="POST">
				<div class="form-group">
				  <p>Pencarian Berdasarkan
      			<select name="kategori">
        		<option value="nik">NIK</option>
        		<option value="nama">Nama</option>
      			</select>
    			<input name="tcari" type="text" id="txt_cari">
    			<input name="bcari" type="submit" value="Cari">
				</p>
			</div>
                
                <div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>Nik</th>
					<th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
					<th>No Telepon</th>
					<th>Jabatan</th>
					<th>Status</th>
                    <th>Tools</th>
                    
				</tr>
				<?php
		include('koneksi.php');
		
		if (isset($_POST['bcari'])) { 
		$tcari = $_POST['tcari'];
		$kategori=$_POST['kategori'];
		
		$query = mysqli_query($koneksi, "SELECT * from karyawan
				 where $kategori LIKE '%$tcari%'
				 ORDER BY nik");
		}else{		
		
		$query = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY nik ASC");
		}
		
		if(mysqli_num_rows($query) == 0){	
			
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
			
		}else{	
			
			$no = 1;
			while($data = mysqli_fetch_assoc($query)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['nik'].'</td>
							<td><a href="profil2.php?nik='.$data['nik'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$data['nama'].'</a></td>
                            <td>'.$data['tempat_lahir'].'</td>
                            <td>'.$data['tanggal_lahir'].'</td>
							<td>'.$data['no_telepon'].'</td>
                            <td>'.$data['jabatan'].'</td>
							<td>';
							if($data['status'] == 'Tetap'){
								echo '<span class="label label-success">Tetap</span>';
							}
                            else if ($data['status'] == 'Kontrak' ){
								echo '<span class="label label-info">Kontrak</span>';
							}
                            else if ($data['status'] == 'Outsourcing' ){
								echo '<span class="label label-warning">Outsourcing</span>';
							}
						echo '
							</td>
							<td>
								
								<a href="tampawal.php?aksi=delete&nik='.$data['nik'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$data['nama'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
            <form method="post" action="report_data.php">
  			<table>
  				<tr>
  				<td><input type="submit" name="Submit" value="Lihat Laporan" /></td>
  			</tr>
  	</table>
			</div>
                
		  </form>
			
			
			<br />
			
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>